<?php

namespace App\Http\Controllers\API\v1;

use App\Classes\Payment\PaymentProcessorFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseProductRequest;
use App\Services\Price\Calculate;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function purchase(PurchaseProductRequest $request)
    {

        $price = new Calculate($request->product, $request->taxNumber, $request->coupon);

        try {
            $paymentProcessor = PaymentProcessorFactory::create($request->paymentProcessor);
            $paymentResult = $paymentProcessor->processPayment($price);

            if ($paymentResult) {
                return response()->json(['message' => 'Payment successful'], 200);
            } else {
                return response()->json(['message' => 'Payment failed'], 400);
            }
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

}
