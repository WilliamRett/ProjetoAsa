<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomersRequest;
use App\Http\Requests\PaymentCreditCardRequest;
use App\Services\Asas\Contract\AsasServiceContract;
use App\Services\Customer\Contract\CustomerServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * @var CustomerServiceContract $customerService
     */
    private CustomerServiceContract $customerService;
    private AsasServiceContract $assasService;


    /**
     * [CustomerController for __construct]
     *
     * @param PaymentServiceContract $paymentServiceContract
     * @param AsasServiceContract $AssasService
     *
     */
    public function __construct(CustomerServiceContract $customerService, AsasServiceContract $assasService)
    {
        $this->customerService = $customerService;
        $this->assasService = $assasService;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return view('customers');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer/new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomersRequest $request): mixed
    {
        $result = $this->assasService->createCustomer($request);
        $validate = $result->getData();
        if (isset($validate->error) || isset($validate->errors)) {
            Session::flash('customer', [$validate->error ?? $validate->errors]);
            return redirect()->route('customer/index');
        }
        Session::flash('customer', $result);
        return redirect()->route('customer/index');
    }

}
