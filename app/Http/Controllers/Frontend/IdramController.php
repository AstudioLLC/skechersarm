<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\Idram;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Omnipay\Omnipay;
use App\Constants\Idram as IdramConstants;

class IdramController extends Controller
{
    use Idram;

    public function result(Request $request)
    {

        $this->resultIdram($request);

    }
    public function success()
    {
        Order::whereOrderId($_REQUEST['EDP_BILL_NO'])->update(['status' => 'pending','payment_result' => 'Success IDram','is_paid' => true]);
        return redirect()->route('cabinet.ongoing.purchases')->with('successIdram','Payment come successfully');
    }

    public function failed()
    {

        Order::whereOrderId($_REQUEST['EDP_BILL_NO'])->update(['status' => 'canceled','payment_result' => 'Failed IDram']);
        return redirect()->route('cabinet.purchasing.archive')->with('errorIdram','Something come false');
    }


}




