<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->status();
    }

    public function status()
    {
        DB::table('status')->insert([
            'id' => 1,
            'status' => "ok"
        ]);
        DB::table('status')->insert([
            'id' => 2,
            'status' => "error"
        ]);
    }

    public function orderStatus()
    {
        DB::table('order_status')->insert([
            'id' => 1,
            'status_id' => "1",
            'message' => "ok"
        ]);
    }

    public function order()
    {
        DB::table('order_status')->insert([
            'id' => 1,
            'order_status_id' => 1,
            'payment_id' => 1,
            'comanda_id' => 1,
        ]);
    }
}
