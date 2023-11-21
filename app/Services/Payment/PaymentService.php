<?php

namespace App\Services\Payment;

use App\Repositories\Payment\Contract\PaymentRepositoryContract;
use App\Services\Payment\Contract\PaymentServiceContract;

class PaymentService implements PaymentServiceContract
{
    /**
     * @var PaymentRepositoryContract $paymentRepository
     */

    protected PaymentRepositoryContract $paymentRepository;

    /**
     * PaymentRepository Contructor
     *
     * @param PaymentRepositoryContract $PaymentRepositoryContract
     */

    public function __construct(PaymentRepositoryContract $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function createPayment($array):mixed
    {
        return $this->paymentRepository->createPayment($array);
    }

}
