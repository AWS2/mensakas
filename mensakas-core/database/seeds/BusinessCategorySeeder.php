<?php

use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->businessCategory();
    }

    public function businessCategory()
    {
        DB::table('business_category')->insert([
            'business_id' => 1,
            'category_id' => 1
        ]);
    }
}
