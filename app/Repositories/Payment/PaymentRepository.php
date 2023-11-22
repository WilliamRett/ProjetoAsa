<?php

namespace App\Repositories\Payment;

use App\Models\Payment;
use App\Repositories\Payment\Contract\PaymentRepositoryContract;

class PaymentRepository implements PaymentRepositoryContract
{

    /**
     * Model
     *
     * @var Payment
     */
    protected Payment $payment;

    /**
     * PaymentRepository Contructor
     *
     * @param Payment $payment
     *
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Create Payment in Database
     * @param mixed $array
     *
     * @return mixed
     */
    public function createPayment($array): mixed
    {
        $model = $this->payment;
        $model->customer = $array->customer;
        $model->value = $array->value;
        $model->dueDate = $array->dueDate;
        $model->payment_id = $array->id;
        $model->url_payment = $array->bankSlipUrl ?? $array->invoiceUrl;
        $model->billing_type = $array->billingType;
        $model->status_payment = $array->status;
        return $model->save();
    }
}
