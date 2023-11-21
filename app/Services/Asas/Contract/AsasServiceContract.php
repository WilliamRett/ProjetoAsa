<?php

namespace App\Services\Asas\Contract;

use App\Http\Requests\CustomersRequest;
use App\Http\Requests\PaymentCreditCardRequest;
use App\Http\Requests\PaymentCustomerRequest;
use Illuminate\Http\Request;

interface AsasServiceContract
{
    public function createCustomer(CustomersRequest $request):mixed;
    public function createPayment(PaymentCustomerRequest $request):mixed;
    public function createPaymentCredit(PaymentCreditCardRequest $request):mixed;
}
