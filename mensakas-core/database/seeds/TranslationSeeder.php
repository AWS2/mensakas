<?php

use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->language();
    }

    public function language()
    {
        DB::table('language')->insert([
            'id' => 1,
            'language' => 'es'
        ]);
        DB::table('language')->insert([
            'id' => 2,
            'language' => 'cat'
        ]);
        DB::table('language')->insert([
            'id' => 3,
            'language' => 'en'
        ]);
    }
}
