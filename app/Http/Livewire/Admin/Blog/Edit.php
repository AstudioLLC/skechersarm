<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads,LivewireAlert,AuthorizesRoleOrPermission;


    public $title;
    public $url;
    public $short;
    public $description;
    public $image;
    public $sec_image;
    public $newimage;
    public $newsecimage;
    public $active;
    public $to_home;
    public $ordering;
    public $blog_id;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $saved = false;

    public function mount($url)
    {
        $this->authorizeRoleOrPermission('blog-edit');
        $blog = Blog::where('url',$url)->first();
        $this->title = $blog->getTranslations('title');
        $this->url = $blog->url;
//        $this->short = $blog->getTranslations('short');
        $this->description = $blog->getTranslations('description');
        $this->image = $blog->image;
        $this->sec_image = $blog->sec_image;
        $this->active = $blog->active;
        $this->to_home = $blog->to_home;
        $this->blog_id = $blog->id;
        $this->seo_title = $blog->getTranslations('seo_title');
        $this->seo_description = $blog->getTranslations('seo_description');
        $this->seo_keywords = $blog->getTranslations('seo_keywords');
    }

    public function generateSlug()
    {
        $this->url = Str::slug($this->title['hy'],'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'url' => 'required|unique:blogs,url,'.$this->blog_id,
//            'short' => 'nullable',
            'description' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png',
            'newsecimage' => 'nullable|mimes:jpeg,png',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
    }

    public function updateBlog()
    {
        $this->validate([
            'title' => 'required',
            'url' => 'required|unique:blogs,url,'.$this->blog_id,
//            'short' => 'nullable',
            'description' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png',
           // 'newsecimage' => 'nullable|mimes:jpeg,png',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
        $blog = Blog::find($this->blog_id);
        $blog->title = $this->title;
        $blog->url = $this->url;
//        $blog->short = $this->short;
        $blog->description = $this->description;
        $blog->to_home = $this->to_home;
        $blog->seo_title = $this->seo_title;
        $blog->seo_description = $this->seo_description;
        $blog->seo_keywords = $this->seo_keywords;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->getClientOriginalName();
            $this->newimage->storeAs('images/blogs',$imageName);
            $blog->image = $imageName;
        }
        if($this->newsecimage)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->newsecimage->getClientOriginalName();
            $this->newsecimage->storeAs('images/blogs',$imageName);
            $blog->sec_image = $imageName;
        }
        $blog->save();
        $this->alert('success', 'Blog been changed successfully');
        $this->saved = true;
    }

    public function render()
    {
        return view('livewire.admin.blog.edit')->extends('layouts.admin');
    }
}
