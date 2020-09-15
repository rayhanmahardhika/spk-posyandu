<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(VariableSeeder::class);
        $this->call(RuleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RulesDetailSeeder::class);
    }
}
