<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->payment();
        $this->invoice();
    }

    public function payment()
    {
        DB::table('payment')->insert([
            'id' => 1,
            'amount' => 20.25,

        ]);
    }

    public function invoice()
    {
        DB::table('invoice')->insert([
            'id' => 1,
            'payment_id' => 1,
        ]);
    }
}
