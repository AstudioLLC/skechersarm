<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PaymentInterface
{
    public function __invoke(Request $request);
}
