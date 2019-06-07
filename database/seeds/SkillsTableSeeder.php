<?php

use App\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            'name' => 'Java',
            'image' => 'Java.png'
        ]);
        DB::table('skills')->insert([
            'name' => 'Ruby',
            'image' => 'Ruby.png'
        ]);
        DB::table('skills')->insert([
            'name' => 'Rails',
            'image' => 'Rails.png'
        ]);
        DB::table('skills')->insert([
            'name' => 'PHP',
            'image' => 'PHP.png'
        ]);
    }
}
