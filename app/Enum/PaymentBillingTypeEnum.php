<?php

namespace App\Enum;

enum PaymentBillingTypeEnum:string {
    case boleto = "BOLETO";
    case pix = "PIX";
    case creditCard = "CREDIT_CARD";
}
