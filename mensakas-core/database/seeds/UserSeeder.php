<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user();

        factory(User::class, 10)->create();
    }
    public function user()
    {
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@test.com',
            'password' => bcrypt('root')
        ]);
    }
}
