<?php

namespace App\Services\Country;

use App\Models\Country;

class Tax
{

    private $country;
    private $taxNumber;

    public function __construct($taxNumber)
    {
        $this->taxNumber = $taxNumber;
        $this->getCountry();
    }

    /**
     * Get tax of the country
     *
     * @return float
     */
    public function getTax()
    {
        if (!empty($this->country)) {
            return $this->country->tax_percent / 100;
        }
        return 0.0;
    }

    /**
     * @return void
     */
    private function getCountry()
    {
        $this->country = Country::where('tax_format', $this->taxNumber)->first();
    }

}
