<?php

namespace App\Classes\Payment;

use App\Classes\Payment\PaymentAdapter\PaypalPaymentProcessorAdapter;
use App\Classes\Payment\PaymentAdapter\StripePaymentProcessorAdapter;
use App\Classes\Payment\PaymentProcessor\PaypalPaymentProcessor;
use App\Classes\Payment\PaymentProcessor\StripePaymentProcessor;

class PaymentProcessorFactory
{

    public static function create(string $type): PaymentProcessor
    {
        switch ($type) {
            case 'stripe':
                return new StripePaymentProcessorAdapter(new StripePaymentProcessor());
            case 'paypal':
                return new PaypalPaymentProcessorAdapter(new PaypalPaymentProcessor());
            default:
                throw new \Exception('Unknown payment type');
        }
    }

}
