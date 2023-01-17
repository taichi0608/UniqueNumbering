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
            'TenantId' => '1111',
            'CompanyName' => 'JTB',
            'created_at'=>'2023-01-06 14:26:37',
            'updated_at'=>'2023-01-06 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenants')->insert([
            'id' => 2,
            'TenantId' => '2222',
            'CompanyName' => '楽天',
            'created_at'=>'2023-01-26 14:26:37',
            'updated_at'=>'2023-01-26 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenants')->insert([
            'id' => 3,
            'TenantId' => '3333',
            'CompanyName' => '日本旅行',
            'created_at'=>'2023-01-26 14:26:37',
            'updated_at'=>'2023-01-26 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenants')->insert([
            'id' => 4,
            'TenantId' => '4444',
            'CompanyName' => '阪急交通社',
            'created_at'=>'2023-01-26 14:26:37',
            'updated_at'=>'2023-01-26 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenants')->insert([
            'id' => 5,
            'TenantId' => '5555',
            'CompanyName' => 'ジャルセールス',
            'created_at'=>'2023-01-26 14:26:37',
            'updated_at'=>'2023-01-26 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
    }
}
