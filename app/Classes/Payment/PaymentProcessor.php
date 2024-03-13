<?php

namespace App\Classes\Payment;

interface PaymentProcessor
{

    public function processPayment($price);

}
