<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\Arca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArcaController extends Controller
{
    use Arca;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $url = Session::get('resultUrl');
        if(isset($url)){
            if($this->resultArca($request)){
                return redirect()->to(url($url));
            }
        }

        return redirect()->to(url($url));

    }
}
