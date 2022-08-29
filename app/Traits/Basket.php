<?php

namespace App\Traits;

use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

trait Basket
{
    use LivewireAlert;

    /* Start Basket Logic */

    public $size;
    public $qty;
    public function mount()
    {
//        dd($this->size);
        $this->qty = 1;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'size' => 'nullable',
        ]);

    }
    public function store($product_id,$product_name,$product_price)
    {

        $hasSize = Product::hasSizes($product_id);
        $this->validate(
            [
                'size' => $hasSize ? 'required' : 'nullable',
            ],
        );
        Cart::instance('cart')->add($product_id . '-' . $this->size,$product_name,$this->qty,$product_price,['size' => $this->size])->associate(Product::class);
        $this->alert('success', 'Cart added !! ', [
            'position' => 'bottom-end',
            'timer' => '3000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->emitTo('frontend.includes.header-component','refreshComponent');
        $this->emitTo('frontend.blocks.home.header-basket-modal','refreshComponent');

//        dd(Cart::instance('cart')->content());
        if(Auth::check()){
            return redirect()->route('cabinet.cart');
        }
        return true;
    }


    public function increaseQuantity()
    {
        $this->qty++;
    }
    public function decreaseQuantity()
    {
        if ($this->qty > 1)
        {
            $this->qty--;
        }
    }

    public function increaseQuantityCart($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('frontend.includes.header-component','refreshComponent');

    }

    public function decreaseQuantityCart($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('frontend.includes.header-component','refreshComponent');

    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('frontend.includes.header-component','refreshComponent');

        $this->alert('error', 'Item Deleted Successfully !! ', [
            'position' => 'bottom-end',
            'timer' => '3000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');

        $this->alert('error', 'Cart empty  !! ', [
            'position' => 'bottom-end',
            'timer' => '3000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    /* End Basket Logic */


    /* Start Favorite Products Logic */

    public function addToWishList($product_id,$product_name,$product_price)
    {

        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate(Product::class);
        $this->alert('success', 'Product Added to Wishlist successfully !! ', [
            'position' => 'bottom-end',
            'timer' => '3000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->emitTo('frontend.shop.product-details-component','refreshComponent');

//        return redirect()->route('compare.product');
    }
    public function removeFromWishList($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $item)
            if ($item->id == $product_id)
            {
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('frontend.shop.product-details-component','refreshComponent');

                $this->alert('error', 'Item Deleted Successfully !! ', [
                    'position' => 'bottom-end',
                    'timer' => '3000',
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
            }
    }
    /* End Favorite Products Logic */

    /* Start Compare Product Logic */

    public function compare($product_id,$product_name,$product_price)
    {

        Cart::instance('compare')->add($product_id,$product_name,1,$product_price)->associate(Product::class);
        $this->alert('success', 'Compare Added successfully !! ', [
            'position' => 'bottom-end',
            'timer' => '3000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->emitTo('frontend.shop.product-details-component','refreshComponent');

//        return redirect()->route('compare.product');
    }
    public function removeFromCompare($product_id)
    {
        foreach (Cart::instance('compare')->content() as $item)
            if ($item->id == $product_id)
            {
                Cart::instance('compare')->remove($item->rowId);
                $this->emitTo('frontend.shop.product-details-component','refreshComponent');

                $this->alert('error', 'Item Deleted Successfully !! ', [
                    'position' => 'bottom-end',
                    'timer' => '3000',
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
            }
    }
    /* End Compare Product Logic */


}
