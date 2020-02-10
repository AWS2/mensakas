<?php

use App\Customer;
use App\CustomerAddress;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 20)->create()->each(function ($customer) {
            $customer->customerAddresses()->save(factory(CustomerAddress::class)->make());
        });
    }
}
