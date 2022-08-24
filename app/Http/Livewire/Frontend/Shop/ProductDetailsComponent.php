<?php

namespace App\Http\Livewire\Frontend\Shop;

use App\Models\Comment;
use App\Models\Product;
use App\Traits\Basket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetailsComponent extends Component
{
    use Basket;

    protected $listeners = ['refreshComponent'=>'$refresh'];

    public $item;
    public $commentBody;

    private function resetComment()
    {
        $this->commentBody = '';
    }
    public function updated($comment)
    {
        $this->validateOnly($comment,[
            'commentBody' => 'required'
        ]);
    }
    public function storeComment()
    {
        $this->validate([
            'commentBody' => 'required'
        ]);
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->product_id = $this->item->id;
        $comment->body = $this->commentBody;
        $comment->save();
        $this->resetComment();
        $this->alert('success', 'Thank you!! Your comment will be released after moderation !! ', [
            'position' => 'center',
            'timer' => '8000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
    public function render()
    {
        $product = Product::whereid($this->item->id)->with('categories.parentCategory.parentCategory','comments.user','brand','criteries.filter')->first();
        $allProgucts = Product::where('article_1c', $product->article_1c)->get();

        $session_products_ids = DB::table('sessions')->whereSession(Session::getId())->pluck('product_id')->toArray();
        if (!in_array($this->item->id,$session_products_ids)){
            DB::table('sessions')->insert([
                'user_id' => Auth::id() ?? null,
                'ip_address' => request()->ip(),
                'session' => Session::getId(),
                'product_id' => $this->item->id,
                'created_at' => Carbon::now(),
            ]);
        }

        $session_products = Product::whereIn('id',$session_products_ids)->limit(5)->get();
        $criterie_ids = $product->criteries->pluck('id');
        $similar_products = Product::whereHas('criteries',function ($check) use ($criterie_ids){
            $check->whereIn('id',$criterie_ids);
        })->with('criteries')->get();
        $sizes = Product::sizeCriteries($product->id);
        return view('livewire.frontend.shop.product-details-component',compact('product', 'allProgucts','session_products','similar_products','sizes'));
    }
}
