<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads, LivewireAlert;

    public $title ; public $position;
    public $image ;
    public $selectedParent;
    public $content ;
    public $url ;
    public $active ;
    public $ordering ;
    public $dinamic_page;
    public $parents;
    public $seo_title,$seo_description,$seo_keywords;



    public function mount($position)
    {
          $this->authorizeRoleOrPermission('product-create');
          $this->position = $position;
          $this->dinamic_page = Page::where('static')->get();
          $this->parents = Page::availables();
    }

    public function generateSlug()
    {
        $this->url = Str::slug($this->title['en'],'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'nullable',
            'url' => 'required|unique:pages,url|unique:categories,slug|unique:products,slug',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'
        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'nullable',
                'url' => 'required|unique:pages,url|unique:categories,slug|unique:products,slug',
                'content' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png',
                'seo_title'=> 'nullable',
                'seo_description'=> 'nullable',
                'seo_keywords' => 'nullable'
            ],
        );
        $last_id = Page::orderBy('id', 'DESC')->first('id');
        $item = new Page();
        $item->url = $this->url;
        $item->title = $this->title;
        $item->content = $this->content;
        $item->image = $this->image;
        $item->ordering = $last_id->id;
        $item->parent_id = $this->selectedParent ?? null;
        $this->position == 'about' ? $item->about = true : $item->buyers = true;
        $item->seo_title = $this->seo_title;
        $item->seo_description = $this->seo_description;
        $item->seo_keywords = $this->seo_keywords;

        if($this->image)
        {

            $img   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/pages');
            $title  = time(). '.jpg';
            $img->fit(800,800)->save($destinationPath.'/'.$title);
            $item->image = $title;
        }

        $item->save();

        $this->alert('success', 'Page has been created Successfully');
        return redirect()->route('admin.pages');

    }
    public function render()
    {

        return view('livewire.admin.pages.create')->extends('layouts.admin');
    }
}
