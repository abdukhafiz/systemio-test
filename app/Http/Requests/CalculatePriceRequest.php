<?php

namespace App\Http\Requests;

use App\Rules\CountryWithTaxExistsRule;
use App\Rules\CouponExistsRule;
use App\Rules\ProductExistsRule;
use Illuminate\Foundation\Http\FormRequest;

class CalculatePriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product' => ['required', new ProductExistsRule()],
            'taxNumber' => ['required', new CountryWithTaxExistsRule()],
            'coupon' => [new CouponExistsRule()]
        ];
    }
}
