<?php

use App\Status;
use Illuminate\Database\Seeder;
use Faker\Provider\DateTime as FakerTime;

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
        Status::create(['status' => 'Sin Pagar']);
        Status::create(['status' => 'Confiramdo']);
        Status::create(['status' => 'Preparando']);
        Status::create(['status' => 'Reparto']);
        Status::create(['status' => 'Entregado']);
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
        DB::table('order')->insert([
            'id' => 1,
            'order_status_id' => 1,
            'comanda_id' => 1,
            'payment_id' => 1,
            'estimate_time' => FakerTime::time($format = 'H:i:s')
        ]);
    }
}
