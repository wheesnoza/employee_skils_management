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
        /** 渡されたテーブルを一括削除する */
        $this->truncateTables([
            'users',
            'profiles',
            'skills',
            'skill_user',
            'careers',
        ]);

        /** Seeder実行 */
        $this->call(UsersTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(SkillUserTableSeeder::class);
        $this->call(CareersTableSeeder::class);
    }

    /**
     * テーブル一括削除
     *
     * @param array $tables
     */
    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
