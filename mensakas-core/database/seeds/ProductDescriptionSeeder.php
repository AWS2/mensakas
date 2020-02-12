<?php

use Illuminate\Database\Seeder;

class ProductDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->productDescription();
        $this->descriptionTranslation();
    }

    public function productDescription()
    {
        DB::table('product_description')->insert([
            'id' => 1,
            'product_id' => 1
        ]);
        DB::table('product_description')->insert([
            'id' => 2,
            'product_id' => 1
        ]);
        DB::table('product_description')->insert([
            'id' => 3,
            'product_id' => 1
        ]);
    }
    public function descriptionTranslation()
    {
        DB::table('description_translation')->insert([
            'product_description_id' => 1,
            'language_id' => 1,
            'name' => 'Hamburguesa',
            'description' => 'Con queso'
        ]);
        DB::table('description_translation')->insert([
            'product_description_id' => 1,
            'language_id' => 2,
            'name' => 'Hamburguesa',
            'description' => 'Amb formatge'
        ]);
        DB::table('description_translation')->insert([
            'product_description_id' => 1,
            'language_id' => 3,
            'name' => 'Hamburguesa',
            'description' => 'With cheese'
        ]);
    }
}
