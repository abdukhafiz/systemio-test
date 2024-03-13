<?php

namespace App\Classes\Payment\PaymentAdapter;

use App\Classes\Payment\PaymentProcessor;
use App\Classes\Payment\PaymentProcessor\StripePaymentProcessor;

class StripePaymentProcessorAdapter implements PaymentProcessor
{

    private $stripeProcessor;

    public function __construct(StripePaymentProcessor $stripeProcessor)
    {
        $this->stripeProcessor = $stripeProcessor;
    }

    public function processPayment($price)
    {
        return $this->stripeProcessor->processPayment($price);
    }

}
