<?php

namespace App\Classes\Payment\PaymentAdapter;

use App\Classes\Payment\PaymentProcessor;
use App\Classes\Payment\PaymentProcessor\PaypalPaymentProcessor;

class PaypalPaymentProcessorAdapter implements PaymentProcessor
{

    private $paypalProcessor;

    public function __construct(PaypalPaymentProcessor $paypalProcessor)
    {
        $this->paypalProcessor = $paypalProcessor;
    }

    public function processPayment($price)
    {
        try {
            $this->paypalProcessor->pay($price);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

}
