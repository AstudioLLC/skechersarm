<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class
Create extends Component
{
    use WithFileUploads,LivewireAlert,AuthorizesRoleOrPermission;

    public $title;
    public $url;
    public $short;
    public $description;
    public $image;
    public $sec_image;
    public $active;
    public $to_home;
    public $ordering;
    public $seo_title,$seo_description,$seo_keywords;


    public function mount()
    {
        $this->authorizeRoleOrPermission('blog-create');
    }

    public function generateSlug()
    {
        $this->url = Str::slug($this->title['hy'],'-');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'url' => 'required|unique:blogs,url',
            'short' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png',
            //'sec_image' => 'required|mimes:jpeg,png',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
    }

    public function updateBlog()
    {
        $this->validate([
            'title' => 'required',
            'url' => 'required|unique:blogs,url',
            'short' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png',
            // 'sec_image' => 'required|mimes:jpeg,png',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
        $blog = new Blog();
        $blog->title = $this->title;
        $blog->url = $this->url;
        $blog->short = $this->short;
        $blog->description = $this->description;
        $blog->to_home = $this->to_home;
        $blog->seo_title = $this->seo_title;
        $blog->seo_description = $this->seo_description;
        $blog->seo_keywords = $this->seo_keywords;
        if($this->image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->image->getClientOriginalName();
            $this->image->storeAs('images/blogs',$imageName);
            $blog->image = $imageName;
        }
        if($this->sec_image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->sec_image->getClientOriginalName();
            $this->sec_image->storeAs('images/blogs',$imageName);
            $blog->sec_image = $imageName;
        }
        $blog->save();
        $this->alert('success', 'Blog been changed successfully');
        $this->saved = true;
    }
    public function render()
    {
        return view('livewire.admin.blog.create')->extends('layouts.admin');
    }
}
