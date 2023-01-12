<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenants')->insert([
            'id' => 1,
            'TenantCode' => '1111',
            'CompanyName' => 'test',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenants')->insert([
            'id' => 2,
            'TenantCode' => '2222',
            'CompanyName' => 'test2',
            'created_at'=>'2023-01-26 14:26:37',
            'updated_at'=>'2023-01-26 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
    }
}
