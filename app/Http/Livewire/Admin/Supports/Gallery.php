<?php

namespace App\Http\Livewire\Admin\Supports;

use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Gallery extends Component
{
    use WithFileUploads,LivewireAlert,AuthorizesRoleOrPermission;
    public $images = [];
    public $uniqueId;
    public $model;
    public $key;
    public $itmes;

    public function mount($model,$key)
    {
        $this->authorizeRoleOrPermission('gallery-list');
        $this->model = $model;
        $this->key = $key;
        $this->items = \App\Models\Gallery::where(['model' => $model, 'key' => $key])->get();
    }



    public function addGallery()
    {
        $this->validate([
            'images.*' => 'image|max:1024', // 1MB Max
        ]);

        foreach ($this->images as $key => $image) {
            $imageName = mt_rand(100, 999).$image->getClientOriginalName();
            $image   = \Intervention\Image\Facades\Image::make($image)->encode('jpg');
            $destinationPath = public_path('images/gallery');

            $this->images[$key] = $image->fit(800,800)->save($destinationPath.'/'.$imageName);

            \App\Models\Gallery::create(['image' => $imageName, 'model'=> $this->model, 'key'=> $this->key ]);

        }
        $this->images = false;

        $this->alert('success', 'Gallery has been uploaded successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
        return redirect()->route('admin.gallery',['model'=>$this->model,'key' =>$this->key]);

    }
    public function deleteGallery($id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);
        $path = public_path().'/images/gallery/'.$gallery->image;
        unlink($path);
        $gallery->delete();

        $this->alert('error', 'Gallery Deleted Successfully',[ 'toast' => true,
            'timerProgressBar' => true,]);
        return redirect()->route('admin.gallery',['model'=>$this->model,'key' =>$this->key]);
    }
    public function render()
    {

        return view('livewire.admin.supports.gallery')->extends('layouts.admin');
    }
}
