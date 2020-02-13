<?php

use App\Rider;
use App\Location;
use App\Delivery;
use Illuminate\Database\Seeder;

class RiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Rider::class, 20)->create()->each(function ($rider) {
            $rider->locations()->save(factory(Location::class)->make());
            $rider->deliveries()->save(factory(Delivery::class)->make());
        });
    }
}
