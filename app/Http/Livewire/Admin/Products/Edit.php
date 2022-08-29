<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads,LivewireAlert, AuthorizesRoleOrPermission;

    public $item;
    public $product_id;


    public $name ;
    public $image ;
    public $newimage;
    public $description ;
    public $slug ;
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
    public $other ;
    public $label ;
    public $brand_id;
    public $rating;
    public $sale_price;
    public $article_1c;
    public $barcode;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $offered;
    public $can_add_sale_percent = false;

    public function mount($id)
    {
        $this->authorizeRoleOrPermission('product-edit');
        $productCategory = DB::table('category_product')->where('product_id', $id)->first();
        $this->item = Product::whereId($id)->first();
        $product = Product::whereId($id)->first();
        $this->slug = $product->slug;
        $this->name = $product->getTranslations('name');
        $this->description = $product->getTranslations('description');
        $this->image = $product->image;
        $this->parent_category = $productCategory->category_id;
        $this->thumbnail = $product->thumbnail;
        $this->sale_percent = $product->sale_percent;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->is_new = $product->is_new;
        $this->top_seller = $product->top_seller;
        $this->offered = $product->offered;
        $this->collection = $product->collection;
        $this->other = $product->other;
        $this->label = $product->label;
        $this->brand_id= $product->brand_id;
        $this->rating= $product->rating;
        $this->sale_price= $product->sale_price;
        $this->article_1c= $product->article_1c;
        $this->barcode= $product->barcode;
        $this->active = $product->active;
        $this->product_id = $product->id;
        $this->seo_title = $product->getTranslations('seo_title');
        $this->seo_description = $product->getTranslations('seo_description');
        $this->seo_keywords = $product->getTranslations('seo_keywords');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name['hy'],'-');
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
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[

            'slug' => 'required|unique:pages,url|unique:categories,slug|unique:products,slug,'.$this->product_id,
            'newimage' => 'nullable|mimes:jpeg,png',
            'name' => 'required',
            'description' => 'nullable',
            'parent_category' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png',
//            'thumbnail' => 'nullable|image|mimes:jpeg,png',
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
            'barcode' => 'required|unique:products,barcode,'.$this->product_id,
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'


        ]);
    }

    public function updateProduct()
    {
        $this->validate([
            'slug' => 'required|unique:pages,url|unique:categories,slug|unique:products,slug,'.$this->product_id,
            'newimage' => 'nullable|mimes:jpeg,png',
            'name.en' => 'required',
            'description' => 'nullable',
            'parent_category' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png',
//            'thumbnail' => 'nullable|image|mimes:jpeg,png',
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
            'barcode' => 'required|unique:products,barcode,'.$this->product_id,
            'seo_title'=> 'nullable',
            'seo_description'=> 'nullable',
            'seo_keywords' => 'nullable'

        ],
            [
                'slug.required' =>'Url required',
                'name.en.required'=>'Name required',
                'price.required'=>'You must specify a price',
                'parent_category.required'=>'You must select a section',
                'quantity.required'=>'Enter Quantity',
                'article_1c.required'=>'Enter 1C article',
                'barcode.required'=>'Enter barcode',
            ]


        );

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->sale_percent = $this->sale_percent ?? null;
        $product->price = $this->price ;
        $product->quantity = $this->quantity ;
        $product->is_new = $this->is_new ;
        $product->top_seller = $this->top_seller ;
        $product->offered = $this->offered;
        $product->is_collection = $this->collection ;
        $product->other = $this->other ;
        $product->label = $this->label ;
        $product->brand_id = $this->brand_id;
        $product->rating = $this->rating;
        $product->sale_price = $this->sale_price ?? null;
        $product->article_1c = $this->article_1c;
        $product->barcode = $this->barcode;
        $product->active = $this->active ;
        $product->id = $this->product_id ;
        $product->seo_title = $this->seo_title;
        $product->seo_description = $this->seo_description;
        $product->seo_keywords = $this->seo_keywords;
        if($this->newimage)
        {
            $thumb   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('jpg');
            $thumbPath = public_path('images/products/thumbnail');
            $thumbName  = time(). '.jpg';
            $product->thumbnail = $thumbName;
            $thumb->fit(400,400)->save($thumbPath.'/'.$thumbName);
            $product->thumbnail = $thumbName;




            $img   = \Intervention\Image\Facades\Image::make($this->newimage)->encode('jpg');
            $destinationPath = public_path('images/products');
            $name  = time(). '.jpg';
            $product->thumbnail = $name;
            $img->fit(800,800)->save($destinationPath.'/'.$name);
            $product->image = $name;
        }

        $product->save();
//        $product->categories()->attach($this->parent_category);
        $product->categories()->sync($this->parent_category);

        Artisan::call('cache:clear');
        $this->alert('success', 'Product has been changed successfully');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $productCategory = DB::table('category_product')->where('product_id', $this->product_id)->first();

        $categories = Category::doesnthave('childCategories')->with('parentCategory.parentCategory')->get();
        $brands = Brand::whereActive(true)->get();

        return view('livewire.admin.products.edit',compact('categories','brands'))->extends('layouts.admin');
    }
}
