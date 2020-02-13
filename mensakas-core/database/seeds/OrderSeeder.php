<?php

use App\OrderStatus;
use App\Status;
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
        $this->orderStatus();
        $this->order();
    }

    public function status()
    {
        Status::create(['status' => 'Confiramdo']);
        Status::create(['status' => 'En Restaurante']);
        Status::create(['status' => 'En Envio']);
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
            'payment_id' => 1
        ]);
    }
}
