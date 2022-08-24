<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use App\Traits\AuthorizesRoleOrPermission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandComponent extends Component
{
    use LivewireAlert,WithFileUploads,AuthorizesRoleOrPermission;
    public $title,$content,$image,$url;

    public function mount()
    {
        $this->authorizeRoleOrPermission('brand-list');

    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->image = '';
        $this->url = '';

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'content' => 'nullable',
            'url' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png',

        ]);
    }

    public function store()
    {
        $this->validate([
            'title' => 'nullable',
            'content' => 'nullable',
            'url' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png',
        ]);
        $item = new Brand;
        $item->title = $this->title;
        $item->content = $this->content;
        $item->url = $this->url;
        if($this->image)
        {
            $img   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/brands');
            $name  = time(). '.jpg';
            $item->image = $name;
            $img->fit(175,75)->save($destinationPath.'/'.$name);
            $item->image = $name;

        }
        $item->save();
        $this->resetInputFields();
        $this->alert('success', 'Brand has been created successfully');
    }
    public function delete($id)
    {
        Brand::find($id)->delete();
        $this->alert('warning', 'Brand Deleted Successfully');

    }
    public function render()
    {

        $items = Brand::get();
        return view('livewire.admin.brands.brand-component',compact('items'))->extends('layouts.admin');
    }
}
