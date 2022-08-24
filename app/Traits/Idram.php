<?php

namespace App\Traits;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Omnipay\Omnipay;
use App\Constants\Idram as IdramConstants;

trait Idram
{
    public function createIdram(int $orderId)
    {
        $order = Order::where('order_id',$orderId)->first();

        $gateway = Omnipay::create('Idram');
        $gateway->setAccountId(IdramConstants::EDP_REC_ACCOUNT);
        $gateway->setSecretKey(IdramConstants::SECRET_KEY);
        $purchaseData = $gateway->purchase();
        $purchaseData->setLanguage(app()->getLocale());
        $purchaseData->setAmount($order->subtotal);
        $purchaseData->setTransactionId($orderId);
        $purchaseData->setEmail('armangalstyan666@gmail.com');
        $purchase = $purchaseData->send();
        $purchase->redirect();
    }

    public function resultIdram(Request $request)
    {

        $gateway = Omnipay::create('Idram');
        $gateway->setAccountId(IdramConstants::EDP_REC_ACCOUNT);
        $gateway->setSecretKey(IdramConstants::SECRET_KEY);
        $gateway->setParameter('transactionId', $request->get('orderId'));


        $purchase = $gateway->completePurchase()->send();

//        Order::where('order_id', $purchase->getOrderNumberReference())->first();

        if ($purchase->isSuccessful()) {
            /*Purchasing comes successfully*/
        }

        echo 'OK';


    }

}
