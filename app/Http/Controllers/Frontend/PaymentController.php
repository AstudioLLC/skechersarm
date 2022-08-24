<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Interfaces\PaymentInterface;
use App\Models\Order;
use App\Models\OrderItem;
use App\Traits\Arca;
use App\Traits\Idram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Cart;

class   PaymentController extends Controller implements PaymentInterface
{
    use Arca, Idram;

    public function  __invoke(Request $request)
    {

        $request->validate([
            'district' => 'nullable',
            'city' => 'nullable',
            'address' => 'nullable',
            'home' => 'nullable',
            'apartment' => 'nullable',
            'notes' => 'nullable',
            'subtotal' => 'nullable',
            'payment_type' => 'nullable',
            'discount_card' => 'nullable',
            'online_payment_type' => 'nullable'
        ]);

        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->district = $request->district;
        $order->city = $request->city;
        $order->address = $request->address;
//        $order->home = $request->home;
//        $order->apartment = $request->apartment;
        $order->notes = $request->notes;
        $order->stores = $request->stores;
        $order->subtotal = $request->subtotal;
        $order->total = str_replace(',', '',Cart::instance('cart')->subtotal);
        $order->order_id = time();
        $order->delivery = $request->delivery??null;
        $order->payment_type = $request->payment_type == 0 ? 'cash' : 'online';
        $order->online_payment_type = $request->online_payment_type;
        $order->status = 'sent';

        $order->save();

        foreach (Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id =  Str::of($item->id)->before('-');
            $orderItem->order_id = $order->id;
            $orderItem->name = $item->name;
            $orderItem->article_1c = $item->options->article_1c;
            $orderItem->price = str_replace(',', '',$item->price);
            $orderItem->quantity = $item->qty;
            $orderItem->size = $item->options->size;
            $orderItem->save();
        }

        $resultUrl = route('cabinet.ongoing.purchases');
        $request->session()->put(['resultUrl' => $resultUrl]);

        if ($order->payment_type == 'cash'){
            Cart::instance('cart')->destroy();
            return redirect()->route('cabinet.ongoing.purchases');

        }elseif ($order->online_payment_type == 'idram'){

            $this->createIdram($order->order_id);
            Cart::instance('cart')->destroy();

        } elseif($order->online_payment_type == 'arca'){
            //logic of arca
            $this->createArca($order->order_id);
            Cart::instance('cart')->destroy();
        }

    }

}
