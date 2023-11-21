<?php

namespace App\Repositories\Customer\Contract;

use App\Http\Requests\CustomersRequest;
use App\Http\Resources\AssasCustomerResource;

interface CustomerRepositoryContract
{
    public function createCustomer($array);
    public function validateCustomer(CustomersRequest $request);
    public function getListCustomer():mixed;
}
