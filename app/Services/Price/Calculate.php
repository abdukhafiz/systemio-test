<?php

namespace App\Services\Price;

use App\Models\Country;
use App\Models\Coupon;
use App\Models\Product;
use App\Services\Country\Tax;

class Calculate
{

    private $taxNumber;

    private $product;
    private $coupon = null;

    public function __construct($productId, $taxNumber, $couponCode = null)
    {
        $this->getProduct($productId);
        $this->taxNumber = $taxNumber;
        $this->getCoupon($couponCode);
    }

    /**
     * Calculate price of the product
     *
     * @return float|int
     */
    public function price()
    {
        $tax = $this->calcTax();
        $price = $this->product->price;

        if (!empty($this->coupon)) {
            $_coupon = $this->coupon;
            if ($_coupon->type == 0) {                  // 0-fixed; 1-percent
                $price = $price - $_coupon->amount;
            } else {
                $price = $price - ($price * ($_coupon->amount / 100));
            }
        }

        return round($price + ($price * $tax), 2);
    }

    /**
     * Calculate the country tax
     *
     * @return float|int
     */
    private function calcTax()
    {
        $countryTax = new Tax($this->taxNumber);
        return $countryTax->getTax();
    }

    /**
     * Get product
     *
     * @param $productId
     * @return void
     */
    private function getProduct($productId)
    {
        $this->product = Product::find($productId);
    }

    /**
     * Get coupon
     *
     * @param $code
     * @return void
     */
    private function getCoupon($code)
    {
        if (!empty($code)) {
            $this->coupon = Coupon::where('code', $code)->first();
        }
    }

}
