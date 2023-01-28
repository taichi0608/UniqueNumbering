<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UsersSeeder::class);
        $this->call(TenantsSeeder::class);

        $this->call(TNumberInfomationsSeeder::class);

        $this->call(DivEditsSeeder::class);
        $this->call(DivDatesSeeder::class);
        $this->call(DivNumberSeeder::class);
        
        $this->call(CliantSeeder::class);
    }
}
