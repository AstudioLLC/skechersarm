<?php

namespace App\Traits;


use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Omnipay\Omnipay;
use App\Constants\Arca as ArcaConstants;

trait Arca
{
    public function createArca(int $orderId)
    {
//        dd('bank');
        $order = Order::where('order_id',$orderId)->first();
        abort_if(!$order, 404);

        $gateway = Omnipay::create('Arca');

        $gateway->setUsername(ArcaConstants::ARCA_TEST_USERNAME);
        $gateway->setPassword(ArcaConstants::ARCA_TEST_PASSWORD);
        $gateway->setTestMode(true);
        $gateway->setParameter('returnUrl', route('arca.result'));
        $gateway->setParameter('amount', $order->subtotal);
        $gateway->setParameter('TransactionId', $orderId);
        $gateway->setParameter('jsonParams',json_encode(['FORCE_3DS2' => true]));

        $purchase = $gateway->purchase()->send();

        if ($purchase->isRedirect()) {
            return $purchase->redirect();
        }

        $this->failedArca($order,$purchase->getCode(),$purchase->getMessage());
    }


    public function resultArca(Request $request)
    {
        $gateway = Omnipay::create('Arca');
        $gateway->setUsername(ArcaConstants::ARCA_TEST_USERNAME);
        $gateway->setPassword(ArcaConstants::ARCA_TEST_PASSWORD);
        $gateway->setTestMode(true);
        $gateway->setParameter('transactionId', $request->get('orderId'));
        $purchase = $gateway->completePurchase()->send();

        $order = Order::where('order_id', $purchase->getOrderNumberReference())->first();

        if ($purchase->isSuccessful()) {

            return $this->successArca($order);
        }
        return $this->failedArca($order, $purchase->getCode(), $purchase->getMessage());




    }

    public function failedArca($order,$errorCode,$message)
    {

        return $order->update(['status' => 'canceled','payment_result' => 'Failed | Bank result - '.$errorCode .' - '. $message ]);
    }

    public  function successArca($order)
    {

        return Order::where('id', $order->id)->update(['status' => 'pending','payment_result' => 'Success Arca Payment','is_paid' => true]);

    }

}
