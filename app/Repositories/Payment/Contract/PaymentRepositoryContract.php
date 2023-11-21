<?php

namespace App\Repositories\Payment\Contract;

use App\Http\Requests\PaymentCustomerRequest;

interface PaymentRepositoryContract
{
    public function createPayment($array):mixed;
}
