<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalculatePriceRequest;
use App\Services\Price\Calculate;
use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function calculate(CalculatePriceRequest $request)
    {
        $calculate = new Calculate($request->product, $request->taxNumber, $request->coupon);
        return response(['message' => 'Price calculated successfully', 'price' => $calculate->price()], 200);
    }

}
