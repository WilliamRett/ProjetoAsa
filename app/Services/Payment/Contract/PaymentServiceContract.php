<?php

namespace App\Services\Payment\Contract;

use Illuminate\Http\Request;

interface PaymentServiceContract
{
    public function createPayment($array):mixed;
}
