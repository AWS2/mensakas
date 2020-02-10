<?php

use App\Business;
use App\BusinessAddress;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Business::class, 10)->create()->each(function ($business) {
            $business->businessAddresses()->save(factory(BusinessAddress::class)->make());
        });
    }
}
