<?php

namespace App\Services\Customer;

use App\Repositories\Customer\Contract\CustomerRepositoryContract;
use App\Services\Customer\Contract\CustomerServiceContract;
use Illuminate\Http\Request;

class CustomerService implements CustomerServiceContract
{
    /**
     * @var CustomerRepositoryContract $customerRepository
     */

    protected CustomerRepositoryContract $customerRepository;

    /**
     * CustomerRepository Contructor
     *
     * @param CustomerRepositoryContract $customerRepositoryContract
     */

    public function __construct(CustomerRepositoryContract $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function customer(Request $request):mixed
    {
        return $this->customerRepository->createCustomer($request);
    }

    public function getListCustomer():mixed{
        return $this->customerRepository->getListCustomer();
    }

}
