<?php

namespace App\Http\Livewire\Frontend\Blocks\Home;

use App\Models\FastOrder;
use App\Models\OrderItem;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Cart;

class FastOrderModal extends Component
{
    use LivewireAlert;

    public $name;
    public $surname;
    public $email;
    public $phone;
    public $region;
    public $city;
    public $street;
    public $home;
    public $apartment;
    public $discount_card;
    public $notes;
    public $cash;
    public $pos_terminal;
    public $stores;
    public $privacy = false;

    public $thankyou;


    private function resetFastOrderForm()
    {
        $this->name = '';
        $this->surname = '';
        $this->email = '';
        $this->phone = '';
        $this->region = '';
        $this->city = '';
        $this->street = '';
        $this->home = '';
        $this->apartment = '';
        $this->discount_card = '';
        $this->notes = '';
        $this->cash = '';
        $this->pos_terminal = '';
        $this->stores = '';
        $this->privacy = false;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
//            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
//            'region' => 'required',
//            'city' => 'required',
//            'street' => 'required',
//            'home' => 'required',
//            'apartment' => 'required',
            'notes' => 'required',
//            'stores' => 'required',
            'discount_card' => 'nullable'

        ]);
    }

    public function placeFastOrder()
    {
        $this->validate([
            'name' => 'required',
//            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
//            'region' => 'required',
//            'city' => 'required',
//            'street' => 'required',
//            'home' => 'required',
//            'apartment' => 'required',
            'notes' => 'required',
//            'stores' => 'required',
            'discount_card' => 'nullable'

        ]);

        $order = new FastOrder();
        $order->user_id = Auth::user()->id ?? null;
        $order->name = $this->name;
//        $order->last_name = $this->surname;
        $order->email = $this->email;
        $order->phone = $this->phone;
//        $order->district = $this->region;
//        $order->city = $this->city;
//        $order->address = $this->street;
//        $order->home = $this->home;
//        $order->apartment = $this->apartment;
        $order->notes = $this->notes;
//        $order->stores = $this->stores;
        $order->subtotal = str_replace(',', '', Cart::instance('cart')->subtotal);
        $order->total = str_replace(',', '', Cart::instance('cart')->subtotal);

        $order->save();

        foreach (Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id =  Str::of($item->id)->before('-');
            $orderItem->fast_order_id = $order->id;
            $orderItem->name = $item->name;
            $orderItem->article_1c = $item->options->article_1c;
            $orderItem->price = str_replace(',', '',$item->price);
            $orderItem->quantity = $item->qty;
            $orderItem->size = $item->options->size;
            $orderItem->save();
        }

        $this->thankyou = 1;
        $this->resetFastOrderForm();
        Cart::instance('cart')->destroy();
        $this->alert('success', 'Thank you!! Your Fast Order is Created Successfully !! ', [
            'position' => 'center',
            'timer' => '3000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
    public function render()
    {
        $storeAddresses = Store::select('location')->get();
        return view('livewire.frontend.blocks.home.fast-order-modal',compact('storeAddresses'));
    }
}
