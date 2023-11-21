<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentCreditCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'billingType' => "required",
            'customer' => 'string|required',
            'value' => 'numeric|required',
            'dueDate' => 'date|required',
            'creditCard.holderName'=>'string|required',
            'creditCard.number'=>'string|required',
            'creditCard.expiryMonth'=>'string|required',
            'creditCard.expiryYear'=>'string|required',
            'creditCard.ccv'=>'string|required',
            'creditCardHolderInfo.name'=>'string|required',
            'creditCardHolderInfo.email'=>'string|required',
            'creditCardHolderInfo.cpfCnpj'=>'string|required',
            'creditCardHolderInfo.postalCode'=>'string|required',
            'creditCardHolderInfo.addressNumber'=>'string|required',
            'creditCardHolderInfo.phone'=>'string|required'
        ];
    }
}
