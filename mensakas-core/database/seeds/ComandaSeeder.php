<?php

use Illuminate\Database\Seeder;

class ComandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->comanda();
    }

    public function comanda()
    {
        DB::table('comanda')->insert([
            'id' => 1,
            'address_id' => 1,
            'ticket_json' => '{
                "products": [
                    {
                        "product": {
                            "name": "hamburguesa",
                            "price": "10",
                            "extras": [
                                {
                                    "product": {
                                        "name": "queso",
                                        "price": "1"
                                    }
                                },
                                {
                                    "product": {
                                        "name": "tomate",
                                        "price": "1"
                                    }
                                }
                            ]
                        }
                    },
                    {
                        "product": {
                            "name": "agua",
                            "price": "1"
                        }
                    }
                ],
                "business": {
                    "name": "restaurante1",
                    "address": "c/123"
                },
                "customer": {
                    "mail": "test@test.com",
                    "address": "C/324"
                }
            }',

        ]);

        DB::table('comanda_product')->insert([
            'id' => 2,
            'comanda_id' => 1,
            'product_id' => 101,
            'quantity' => 1
        ]);

        DB::table('comanda_product')->insert([
            'id' => 3,
            'comanda_id' => 1,
            'product_id' => 102,
            'quantity' => 1
        ]);

        DB::table('comanda_product')->insert([
            'id' => 1,
            'comanda_id' => 1,
            'product_id' => 103,
            'quantity' => 1
        ]);
    }
}
