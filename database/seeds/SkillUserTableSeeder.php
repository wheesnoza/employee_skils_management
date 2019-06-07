<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_user')->insert([
            'user_id' => 1,
            'skill_id' => 1
        ]);
        DB::table('skill_user')->insert([
            'user_id' => 1,
            'skill_id' => 2
        ]);
        DB::table('skill_user')->insert([
            'user_id' => 2,
            'skill_id' => 3
        ]);
        DB::table('skill_user')->insert([
            'user_id' => 2,
            'skill_id' => 1
        ]);
        DB::table('skill_user')->insert([
            'user_id' => 2,
            'skill_id' => 2
        ]);
    }
}
