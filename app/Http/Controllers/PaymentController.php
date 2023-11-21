<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCreditCardRequest;
use App\Http\Requests\PaymentCustomerRequest;
use App\Services\Asas\Contract\AsasServiceContract;
use App\Services\Customer\Contract\CustomerServiceContract;
use App\Services\Payment\Contract\PaymentServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

    /**
     * @var PaymentServiceContract $paymentService
     */
    private AsasServiceContract $assasService;
    private CustomerServiceContract $customerService;


    /**
     * [PaymentController for __construct]
     *
     * @param PaymentServiceContract $paymentServiceContract
     * @param AsasServiceContract $AssasService
     *
     */
    public function __construct(
        AsasServiceContract $assasService,
        CustomerServiceContract $customerServiceContract
    ) {
        $this->customerService = $customerServiceContract;
        $this->assasService = $assasService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this->customerService->getListCustomer();
        return view('payment')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function credit(Request $request)
    {
        $clientIp = $request->ip();
        $customers = $this->customerService->getListCustomer();
        return view('paymentCredit')->with('customers', $customers)->with('ipCliente',$clientIp);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentCustomerRequest $request): mixed
    {
        $type = $request->billingType;
        $data =  $this->assasService->createPayment($request);

        if (method_exists($data, 'getData')) {
            $validate = $data->getData();
            if (isset($validate->error) || isset($validate->errors)) {
                Session::flash('payment', [$validate->error ?? $validate->errors]);
                return redirect()->route('payment/index');
            }
        }
        return view('thanks', ['type' => $type, 'data' => $data]);
    }


    /**
     * paymentCredit
     */
    public function paymentCredit(PaymentCreditCardRequest $request): mixed
    {
        // dd($request->all());
        $validated = $request->validated();

        if (!$validated) {
            return $validated->errors();
        }

        $type = $request->billingType;
        $data =  $this->assasService->createPaymentCredit($request);
        if (method_exists($data, 'getData')) {
            $validate = $data->getData();
            if (isset($validate->error) || isset($validate->errors)) {
                Session::flash('payment', [$validate->error ?? $validate->errors]);
                return redirect()->route('paymentCredit');
            }
        }
        return view('thanks', ['type' => $type, 'data' => $data]);
    }
}
