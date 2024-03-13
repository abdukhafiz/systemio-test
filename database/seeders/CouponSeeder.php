<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupons = [
            [
                'name' => 'Coupon 1',
                'type' => 1,                // percent
                'code' => 'COUPON1',
                'amount' => '10'
            ],
            [
                'name' => 'Coupon 2',
                'type' => 0,                // fixed
                'code' => 'COUPON2',
                'amount' => '25'
            ],
            [
                'name' => 'Coupon 3',
                'type' => 0,                // fixed
                'code' => 'COUPON3',
                'amount' => '50'
            ],
        ];

        resolve(Coupon::class)->insert($coupons);
    }
}
