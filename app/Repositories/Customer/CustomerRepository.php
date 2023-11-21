<?php

namespace App\Repositories\Customer;

use App\Http\Requests\CustomersRequest;
use App\Http\Resources\AssasCustomerResource;
use App\Repositories\Customer\Contract\CustomerRepositoryContract;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryContract
{
    /**
     * Model
     *
     * @var Customer
     */
    protected Customer $customer;

    /**
     * CustomerRepository Contructor
     *
     * @param Customer $customer
     *
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function createCustomer($customer)
    {

        $model = $this->customer;
        $model->name = $customer->name;
        $model->cpfCnpj = $customer->cpfCnpj;
        $model->email = $customer->email;
        $model->id_customer = $customer->id;
        return $model->save();
    }

    /**
     * Validates whether the customer registration already exists
     * @param CustomersRequest $request
     *
     * @return bool
     */
    public function validateCustomer(CustomersRequest $request): bool
    {
        $doc = str_replace(['.', '/', '-'], '', $request->cpfCnpj);
        if ($this->customer->where('cpfCnpj', $doc)->exists()) {
            return false;
        }
        return true;
    }

    /**
     * function return list customer
     *
     * @return mixed
     */
    public function getListCustomer():mixed
    {
        return $this->customer->select(['name','id_customer'])->get();
    }

}
