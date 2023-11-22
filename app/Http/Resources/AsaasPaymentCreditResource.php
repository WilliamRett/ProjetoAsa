<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AsaasPaymentCreditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'object' => $this->object,
            'id' => $this->id,
            'dateCreated' => $this->dateCreated,
            'customer' => $this->customer,
            'paymentLink' => $this->paymentLink,
            'value' => $this->value,
            'netValue' => $this->netValue,
            'originalValue' => $this->originalValue,
            'interestValue' => $this->interestValue,
            'description' => $this->description,
            'billingType' => $this->billingType,
            'confirmedDate' => $this->confirmedDate,
            'creditCard' => [
                'creditCardNumber' => $this->creditCard->creditCardNumber,
                'creditCardBrand' => $this->creditCard->creditCardBrand,
                'creditCardToken' => $this->creditCard->creditCardToken,
            ],
            'pixTransaction' => $this->pixTransaction,
            'status' => $this->status,
            'dueDate' => $this->dueDate,
            'originalDueDate' => $this->originalDueDate,
            'invoiceUrl' => $this->invoiceUrl,
            'invoiceNumber' => $this->invoiceNumber,
            'externalReference' => $this->externalReference,
            'deleted' => $this->deleted,
            'anticipated' => $this->anticipated,
            'anticipable' => $this->anticipable,
            'creditDate' => $this->creditDate,
            'estimatedCreditDate' => $this->estimatedCreditDate,
            'transactionReceiptUrl' => $this->transactionReceiptUrl,
            'nossoNumero' => $this->nossoNumero,
            'bankSlipUrl' => $this->bankSlipUrl,
            'lastInvoiceViewedDate' => $this->lastInvoiceViewedDate,
            'lastBankSlipViewedDate' => $this->lastBankSlipViewedDate,
            'postalService' => $this->postalService,
            'custody' => $this->custody,
            'refunds' => $this->refunds,
        ];
    }
}
