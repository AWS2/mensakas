<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate();
        $this->call(TranslationSeeder::class);
        $this->call(OrderSeeder::class);
    }

    public function truncate()
    {
        DB::table('business')->truncate();
        DB::table('business_address')->truncate();
        DB::table('business_category')->truncate();
        DB::table('category')->truncate();
        DB::table('category_translation')->truncate();
        DB::table('comanda')->truncate();
        DB::table('comanda_product')->truncate();
        DB::table('customer')->truncate();
        DB::table('customer_address')->truncate();
        DB::table('delivery')->truncate();
        DB::table('description_translation')->truncate();
        DB::table('invoice')->truncate();
        DB::table('language')->truncate();
        DB::table('location')->truncate();
        DB::table('order')->truncate();
        DB::table('order_status')->truncate();
        DB::table('payment')->truncate();
        DB::table('product')->truncate();
        DB::table('product_description')->truncate();
        DB::table('product_tag')->truncate();
        DB::table('rider')->truncate();
        DB::table('schedule')->truncate();
        DB::table('status')->truncate();
        DB::table('tag')->truncate();
        DB::table('tag_translation')->truncate();
    }
}
