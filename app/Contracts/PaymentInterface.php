<?php

declare(strict_types=1);

namespace App\Contracts;

interface PaymentInterface
{
    public function process();
}