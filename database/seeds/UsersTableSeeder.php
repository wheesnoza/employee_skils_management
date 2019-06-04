<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'admin@test.test',
            'password' => bcrypt('laravel'),
            'is_admin' => true
        ]);

        factory(User::class, 50)->create();
    }
}
