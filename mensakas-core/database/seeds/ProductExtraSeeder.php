<?php

use Illuminate\Database\Seeder;

class ProductExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->productMenu();
        $this->productWithExtras();
    }

    public function productMenu()
    {
        //main product
        DB::table('product')->insert([
            'id' => 100,
            'business_id' => rand(1, 10),
            'price'  => rand(990, 3999) / 10,
            'avalible' => 1,
        ]);

        DB::table('product_description')->insert([
            'id' => 100,
            'product_id' => 100
        ]);

        DB::table('description_translation')->insert([
            'id' => 100,
            'product_description_id' => 100,
            'language_id' => 1,
            'name' => 'Menu1',
            'description' => "Pollo y patatas"
        ]);
    }

    public function productWithExtras()
    {
        //main product
        DB::table('product')->insert([
            'id' => 101,
            'business_id' => 1,
            'price'  => rand(110, 3999) / 10,
            'avalible' => 1,
        ]);

        DB::table('product_description')->insert([
            'id' => 101,
            'product_id' => 101
        ]);

        DB::table('description_translation')->insert([
            'id' => 101,
            'product_description_id' => 101,
            'language_id' => 1,
            'name' => 'Pizza',
            'description' => "Puedes ponerme extras"
        ]);

        //Extras
        DB::table('product')->insert([
            'id' => 102,
            'business_id' => 1,
            'price'  => rand(50, 599) / 10,
            'avalible' => 1,
            'main_product_id' => 101
        ]);

        DB::table('product_description')->insert([
            'id' => 102,
            'product_id' => 102
        ]);

        DB::table('description_translation')->insert([
            'id' => 102,
            'product_description_id' => 102,
            'language_id' => 1,
            'name' => 'queso',
            'description' => "soy un extra de queso"
        ]);

        //Extra#2
        DB::table('product')->insert([
            'id' => 103,
            'business_id' => 1,
            'price'  => rand(50, 599) / 10,
            'avalible' => 1,
            'main_product_id' => 101
        ]);

        DB::table('product_description')->insert([
            'id' => 103,
            'product_id' => 103
        ]);

        DB::table('description_translation')->insert([
            'id' => 103,
            'product_description_id' => 103,
            'language_id' => 1,
            'name' => 'tomate',
            'description' => "soy un extra de tomate"
        ]);
    }
}
