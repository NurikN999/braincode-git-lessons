<?php

namespace App\Services\PaymentProcessors;

use App\Contracts\PaymentInterface;

class KaspiBankProcessor implements PaymentInterface
{
    public function process()
    {
        return 'Payed With KaspiBank';
    }
}