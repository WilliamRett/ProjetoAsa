<?php

namespace App\Services\Customer\Contract;

use Illuminate\Http\Request;

interface CustomerServiceContract
{
    public function customer(Request $request):mixed;
    public function getListCustomer():mixed;
}
