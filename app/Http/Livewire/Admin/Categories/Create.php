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

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads,LivewireAlert;

    public $cat_id,$name, $image, $to_footer, $to_catalog, $image_second, $image_url,$image_second_url, $description,$url, $active, $ordering,$parent,$lastChild,$child;
    public $parents;
    public $childrens;
    public $lastChildrens;
    public $selectedParent = NULL;
    public $selectedChild = NULL;

    public function mount()
    {
        $this->authorizeRoleOrPermission('category-create');
        $this->parents = Category::whereNull('category_id')->get();
        $this->childrens = collect();
        $this->lastChildrens = collect();
    }

    public function updatedSelectedParent($parent)
    {
        if (!is_null($parent)) {

            $this->childrens = Category::where('category_id',$parent)->get();
        }
    }

    public function updatedParent($lastChild)
    {
        if (!is_null($lastChild)) {

            $this->lastChildrens = Category::where('category_id',$this->parent)->get();
        }
    }

    public function generateSlug()
    {
        $this->url = Str::slug($this->name['hy'],'-');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'nullable',
            'url' => 'nullable|unique:pages,url|unique:categories,slug|unique:products,slug',
            'description' => 'nullable',
            'parent' => 'nullable',
            'selectedParent' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png',
            'image_second' => 'nullable|image|mimes:jpeg,png',

        ]);
    }

    public function store()
    {
        $this->validate(
            [
                'name' => 'nullable',
                'url' => 'nullable|unique:pages,url|unique:categories,slug|unique:products,slug',
                'description' => 'nullable',
                'parent' => 'nullable',
                'selectedParent' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png',
                'image_second' => 'nullable|image|mimes:jpeg,png',

            ],
        );
        $item = new Category();
        $item->slug = $this->url;
        $item->name = $this->name;
        $item->description = $this->description;
        $item->category_id = $this->lastChild ?? $this->parent ?? $this->selectedParent ?? null;
        $item->image = $this->image;
        $item->image_second = $this->image_second;
        $item->image_second_url = $this->image_second_url;
        $item->image_url = $this->image_url;
        $item->to_footer = $this->to_footer??0;
        $item->to_catalog = $this->to_catalog??0;

        if($this->image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->image->getClientOriginalName();
            $this->image->storeAs('images/category',$imageName);
            $item->image = $imageName;
        }
        if($this->image_second)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->image_second->getClientOriginalName();
            $this->image_second->storeAs('images/category',$imageName);
            $item->image_second = $imageName;
        }
        $item->save();
        Artisan::call('cache:clear');
        $this->alert('success', 'Category has been created Successfully');
        return redirect()->route('admin.categories');

    }

    public function render()
    {

        return view('livewire.admin.categories.create')->extends('layouts.admin');
    }
}
