<?php

class DatabaseSeeder extends Seeder
{

    protected $tables = [
        'users'
    ];

    protected $seeder = [
        'UsersTableSeeder'
    ];


    public function run()
    {
        Eloquent::unguard();
        $this->cleanDatabase();

        foreach ($this->seeder as $SeedClass) {
            $this->call($SeedClass);
        }
    }

    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
