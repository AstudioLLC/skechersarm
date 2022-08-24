<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AuthorizesRoleOrPermission,WithFileUploads, LivewireAlert;

    public $name ;
    public $image ;
    public $description ;
    public $url ;
    public $active ;
    public $ordering ;
    public $parent_category ;
    public $thumbnail ;
    public $sale_percent ;
    public $price ;
    public $quantity ;
    public $is_new ;
    public $top_seller ;
    public $collection ;
    public $label ;
    public $brand_id;
    public $rating;
    public $other;
    public $sale_price;
    public $article_1c;
    public $barcode;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $can_add_sale_percent = false;

    public function mount()
    {
        $this->authorizeRoleOrPermission('product-create');

    }

    public function generateSlug()
    {
        $this->url = Str::slug($this->name['hy'],'-');
    }

    public function canAddSalePercent()
    {
        $this->can_add_sale_percent = true;
    }

    public function generateSalePrice()
    {
        if ($this->sale_percent){
            $this->sale_price = $this->price - ($this->price * $this->sale_percent / 100);
        }
        else{
            $this->sale_price = null;
            $this->sale_percent = null;
        }


//        $this->sale_price = $this->price - ($this->price * $this->sale_percent / 100);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'url' => 'required|unique:pages,url|unique:categories,slug|unique:products,slug',
            'description' => 'nullable',
            'parent_category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png',
            'thumbnail' => 'nullable|image|mimes:jpeg,png',
            'sale_percent' => 'nullable',
            'price' => 'required',
            'quantity' => 'required',
            'is_new' => 'nullable',
            'top_seller' => 'nullable',
            'collection' => 'nullable',
            'other' => 'nullable',
            'label' => 'nullable',
            'brand_id' => 'nullable',
            'rating' => 'nullable',
            'sale_price' => 'nullable',
            'article_1c' => 'required',
            'barcode' => 'required',
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'

        ]);

    }

    public function store()
    {
        $this->validate(
            [
                'name.en' => 'required',
                'url' => 'required|unique:pages,url|unique:categories,slug|unique:products,slug',
                'description' => 'nullable',
                'parent_category' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png',
                'thumbnail' => 'nullable|image|mimes:jpeg,png',
                'sale_percent' => 'nullable',
                'price' => 'required',
                'quantity' => 'required',
                'is_new' => 'nullable',
                'top_seller' => 'nullable',
                'collection' => 'nullable',
                'other' => 'nullable',
                'label' => 'nullable',
                'brand_id' => 'nullable',
                'rating' => 'nullable',
                'sale_price' => 'nullable',
                'article_1c' => 'required',
                'barcode' => 'required|unique:products,barcode',
                'seo_title'=> 'nullable',
                'seo_description'=> 'nullable',
                'seo_keywords' => 'nullable'
            ],
            [
                'url.required' =>'Url required',
                'name.en.required'=>'Name required',
                'price.required'=>'You must specify a price',
                'parent_category.required'=>'You must select a section',
                'quantity.required'=>'Enter Quantity',
                'article_1c.required'=>'Enter 1C article',
                'barcode.required'=>'Enter barcode',
            ]
        );



        $item = new Product();
        $item->slug = $this->url;
        $item->name = $this->name;
        $item->description = $this->description;
        $item->sale_percent = $this->sale_percent;
        $item->price = $this->price;
        $item->quantity = $this->quantity;
        $item->is_new = $this->is_new;
        $item->top_seller = $this->top_seller;
        $item->is_collection = $this->collection;
        $item->other = $this->other;
        $item->label = $this->label;
        $item->brand_id = $this->brand_id;
        $item->rating = $this->rating;
        $item->sale_price = $this->sale_price;
        $item->percent_label = $this->sale_price;
        $item->article_1c = $this->article_1c;
        $item->seo_title = $this->seo_title;
        $item->seo_description = $this->seo_description;
        $item->seo_keywords = $this->seo_keywords;
        $item->barcode = $this->barcode;

        $item->image = $this->image;
//        $item->thumbnail = $this->thumbnail;

        if($this->image)
        {
            $thumb   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $thumbPath = public_path('images/products/thumbnail');
            $thumbName  = time(). '.jpg';
            $item->thumbnail = $thumbName;
            $thumb->fit(400,400)->save($thumbPath.'/'.$thumbName);
            $item->thumbnail = $thumbName;




            $img   = \Intervention\Image\Facades\Image::make($this->image)->encode('jpg');
            $destinationPath = public_path('images/products');
            $name  = time(). '.jpg';
            $item->thumbnail = $name;
            $img->fit(800,800)->save($destinationPath.'/'.$name);
            $item->image = $name;
        }



        $item->save();

        $item->categories()->attach($this->parent_category);

        $this->alert('success', 'Product has been created Successfully');
        return redirect()->route('admin.products');

    }
    public function render()
    {
        $categories = Category::doesnthave('childCategories')->with('parentCategory.parentCategory')->get();
        $brands = Brand::whereActive(true)->get();
        return view('livewire.admin.products.create',compact('categories','brands'))->extends('layouts.admin');
    }
}
