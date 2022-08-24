<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads,LivewireAlert,AuthorizesRoleOrPermission;

    public $item;
    public $title ;
    public $image ;
    public $newimage;
    public $content ;
    public $url ;
    public $active ;
    public $ordering;
    public $page_id;
    public $dinamic_page;
    public $selectedParent;
    public $forSellerPages;
    public $searchTerm1;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;

    public function mount($id)
    {
//        $query = '%'.$this->searchTerm1.'%';
//        $this->forSellerPages = Page::where('parent_id')->with('childpages')->orderBy('ordering','asc')->where(function($sub_query1){
//            $sub_query1->where('title', 'like', '%'.$this->searchTerm1.'%');
//        })->get();
        $this->authorizeRoleOrPermission('page-edit');

        $this->dinamic_page = Page::where('static')->get();
        $this->item = Page::whereId($id)->first();
        $page = Page::whereId($id)->first();
        $this->title = $page->getTranslations('title');
        $this->url = $page->url;
        $this->content = $page->getTranslations('content');
        $this->image = $page->image;
        $this->active = $page->active;
        $this->page_id = $page->id;
        $this->parent_id = $page->parent_id;
        $this->seo_title = $page->getTranslations('seo_title');
        $this->seo_description = $page->getTranslations('seo_description');
        $this->seo_keywords = $page->getTranslations('seo_keywords');
    }

    public function generateSlug()
    {
        $this->url = Str::slug($this->title['en'],'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'url' => 'required|unique:products,slug|unique:categories,slug|unique:pages,url,'.$this->page_id,
            'content' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
    }

    public function updatePage()
    {
        $this->validate([
            'title' => 'nullable',
            'url' => 'required|unique:products,slug|unique:categories,slug|unique:pages,url,'.$this->page_id,
            'content' => 'required',
            'newimage' => 'nullable|mimes:jpeg,png',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
        $page = Page::find($this->page_id);
        $page->title = $this->title;
        $page->url = $this->url;
        $page->content = $this->content;
        $page->seo_title = $this->seo_title;
        $page->seo_description = $this->seo_description;
        $page->seo_keywords = $this->seo_keywords;
//        $page->parent_id = $this->selectedParent ?? null;
        $page->parent_id = ($this->selectedParent == $page->id)? null : $this->selectedParent  ?? null;
        if($this->newimage)
        {
            $img   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('jpg');
            $destinationPath = public_path('images/pages');
            $title  = time(). '.jpg';
            $img->fit(800,800)->save($destinationPath.'/'.$title);
            $page->image = $title;
        }

        $page->save();
        Artisan::call('cache:clear');
        $this->alert('success', 'Page has been changed successfully');
        return redirect()->route('admin.pages');
    }

    public function render()
    {
        $parents = Page::availables();
        $selectedPage = Page::whereId($this->page_id)->with('parentPages')->first();

        return view('livewire.admin.pages.edit',compact('selectedPage','parents'))->extends('layouts.admin');
    }
}
