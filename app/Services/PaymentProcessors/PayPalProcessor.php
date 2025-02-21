<?php

namespace App\Services\PaymentProcessors;

use App\Contracts\PaymentInterface;

class PayPalProcessor implements PaymentInterface
{
    public function process()
    {
        return 'Payed With PayPal';
    }
}