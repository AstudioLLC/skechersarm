<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Http\Livewire\Admin\Supports\CategoryFilter;
use App\Models\Category;
use App\Models\Criteria;
use App\Models\Filter;
use App\Models\FilterSession;
use App\Models\Product;
use App\Traits\Basket;
use App\Traits\frontCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use Basket,WithPagination;

    public $products;
    public $selectedCategories;
    public $perPage = 12;
    public $filter = [];


    public function loadMore()
    {
        $this->perPage = $this->perPage + 12;
    }

    public function deleteFromDB($id)
    {
        FilterSession::whereSession(Session::getId())->where('criteria_id',$id)->delete();
    }
    public function render()
    {

        $category  = Category::whereIn('id',$this->selectedCategories)->with('childCategories.childCategories.childCategories','filters.criteries')->first();
        $selCategories  = Category::whereIn('id',$this->selectedCategories)->with('childCategories.childCategories.childCategories')->get();

        if(count($this->filter)>0){
            foreach ($this->filter as $value){
                if (request()->post()){
                    $check = FilterSession::whereSession(Session::getId())->pluck('criteria_id')->toArray();
                    if (!in_array($value,$check))
                    {
                        DB::table('filter_sessions')
                            ->insert(['user_id' => auth()->user()->id ?? null,'criteria_id' => $value,'session'=>Session::getId(),'created_at'=>Carbon::now()]);

                    }
                }
            }
            $ids = FilterSession::whereSession(Session::getId())->pluck('criteria_id');

            $prods_ids = DB::table('product_criteria')->whereIn('criteria_id',$ids)->pluck('product_id')->toArray();

            $items = Product::whereActive(true)->whereIn('id',$this->products)->whereIn('id',$prods_ids)->with('categories')->paginate($this->perPage);


        }else{

            $items = Product::whereActive(true)->whereIn('id',$this->products)->paginate($this->perPage);
        }

//        dd($this->selectedCategories);
        return view('livewire.frontend.shop.shop-component',compact('category','selCategories','items'));
    }
}
