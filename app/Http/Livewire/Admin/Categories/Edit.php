<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
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

    public $name;
    public $description;
    public $slug;
    public $image;
    public $newimage;
    public $image_second;
    public $newimage2;
    public $image_second_url;
    public $image_url;
    public $parent_id;
    public $to_footer;
    public $to_catalog;
    public $active;
    public $ordering;
    public $category_id;

    public function mount($id)
    {
        $this->authorizeRoleOrPermission('category-edit');

        $this->item = Category::whereId($id)->first();
        $category = Category::whereId($id)->first();
        $this->name = $category->getTranslations('name');
        $this->slug = $category->slug;
        $this->description = $category->getTranslations('description');
        $this->image = $category->image;
        $this->image_second = $category->image_second;
        $this->image_url = $category->image_url;
        $this->image_second_url = $category->image_second_url;
        $this->parent_id = $category->category_id;
        $this->active = $category->active;
//        $this->to_footer = $category->to_footer;
//        $this->to_catalog = $category->to_catalog;
        $this->category_id = $category->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name['hy'],'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:pages,url|unique:products,slug|unique:categories,slug,'.$this->category_id,
//            'description' => 'nullable',
            'newimage' => 'nullable|mimes:jpeg,png',
            'parent_id' => 'nullable'
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'nullable',
            'slug' => 'required|unique:pages,url|unique:products,slug|unique:categories,slug,'.$this->category_id,
//            'description' => 'required',
            'newimage' => 'nullable|mimes:jpeg,png',
            'parent_id' => 'nullable'
        ]);
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->image_url = $this->image_url;
        $category->image_second_url = $this->image_second_url;
        $category->description = $this->description;
        $category->category_id = $this->parent_id;
//        $category->to_footer = $this->to_footer;
//        $category->to_catalog = $this->catalog;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->getClientOriginalName();
            $this->newimage->storeAs('images/category',$imageName);
            $category->image = $imageName;
        }
        if($this->newimage2)
        {
            $imageName2 = Carbon::now()->timestamp. '.' . $this->newimage2->getClientOriginalName();
            $this->newimage2->storeAs('images/category',$imageName2);
            $category->image_second = $imageName2;
        }
        $category->save();
        Artisan::call('cache:clear');
        $this->alert('success', 'Category has been changed successfully');
        return redirect()->route('admin.categories');
    }

    public function render()
    {
        $parents = Category::availables();
        $selectedCategory = Category::whereId($this->parent_id)->with('parentCategory')->first();

        return view('livewire.admin.categories.edit',compact('parents','selectedCategory'))->extends('layouts.admin');
    }
}
