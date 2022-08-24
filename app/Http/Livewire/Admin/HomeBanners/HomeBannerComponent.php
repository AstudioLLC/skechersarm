<?php

namespace App\Http\Livewire\Admin\HomeBanners;

use App\Models\HomeBanner;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeBannerComponent extends Component
{
    use LivewireAlert,WithFileUploads,AuthorizesRoleOrPermission;
    public $title,$button,$image,$section,$url;

    public function mount()
    {
        $this->authorizeRoleOrPermission('homeBanner-list');

    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->button = '';
        $this->image = '';
        $this->section = '';
        $this->url = '';

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'button' => 'nullable',
            'url' => 'nullable',
            'section' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png',

        ]);
    }

    public function store()
    {
        $this->validate([
            'title' => 'nullable',
            'button' => 'nullable',
            'url' => 'nullable',
            'section' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png',
        ]);

        $item = new HomeBanner();
        $item->title = $this->title;
        $item->button = $this->button;
        $item->url = $this->url;
        $item->section = $this->section;
        if($this->image && $this->section == 'discounts')
        {
            $collection_img   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/homeBanners');
            $name  = time(). '.jpg';
            $item->image = $name;
            $collection_img->fit(1440,351)->save($destinationPath.'/'.$name);
            $item->image = $name;

        }elseif($this->image && $this->section == 'slide1'){
            $sale_section_image   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/homeBanners');
            $name  = time(). '.jpg';
            $item->image = $name;
            $sale_section_image->fit(406,306)->save($destinationPath.'/'.$name);
            $item->image = $name;
        }elseif($this->image && $this->section == 'slide2'){
            $sale_section_image   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/homeBanners');
            $name  = time(). '.jpg';
            $item->image = $name;
            $sale_section_image->fit(406,306)->save($destinationPath.'/'.$name);
            $item->image = $name;
        }elseif($this->image && $this->section == 'news2'){
            $sale_section_image   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/homeBanners');
            $name  = time(). '.jpg';
            $item->image = $name;
            $sale_section_image->fit(690,318)->save($destinationPath.'/'.$name);
            $item->image = $name;
        }elseif($this->image && $this->section == 'news'){
            $sale_section_image   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/homeBanners');
            $name  = time(). '.jpg';
            $item->image = $name;
            $sale_section_image->fit(690,318)->save($destinationPath.'/'.$name);
            $item->image = $name;
        } else{
        $sale_section_image   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
        $destinationPath = public_path('images/homeBanners');
        $name  = time(). '.jpg';
        $item->image = $name;
        $sale_section_image->fit(1440,240)->save($destinationPath.'/'.$name);
        $item->image = $name;
    }
        $item->save();
        $this->resetInputFields();
        $this->alert('success', 'Banner has been created successfully');
    }
    public function delete($id)
    {
        HomeBanner::find($id)->delete();
        $this->alert('warning', 'Banner Deleted Successfully');

    }
    public function render()
    {
        $items = HomeBanner::get();
        return view('livewire.admin.home-banners.home-banner-component',compact('items'))->extends('layouts.admin');
    }
}
