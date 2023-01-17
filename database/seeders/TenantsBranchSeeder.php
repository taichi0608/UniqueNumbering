<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TenantsBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenant_branches')->insert([
            'id' => 1,
            'Tenant_id' => '1111',
            'TenantBranchId' => '11111111',
            'FaciliyName' => '東京本社',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);

        DB::table('tenant_branches')->insert([
            'id' => 2,
            'Tenant_id' => '1111',
            'TenantBranchId' => '11112222',
            'FaciliyName' => '関西支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenant_branches')->insert([
            'id' => 3,
            'Tenant_id' => '1111',
            'TenantBranchId' => '11113333',
            'FaciliyName' => '九州支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenant_branches')->insert([
            'id' => 4,
            'Tenant_id' => '1111',
            'TenantBranchId' => '11114444',
            'FaciliyName' => '東北支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenant_branches')->insert([
            'id' => 5,
            'Tenant_id' => '1111',
            'TenantBranchId' => '11115555',
            'FaciliyName' => 'アジア支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenant_branches')->insert([
            'id' => 6,
            'Tenant_id' => '1111',
            'TenantBranchId' => '11116666',
            'FaciliyName' => '欧米支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);

        DB::table('tenant_branches')->insert([
            'id' => 7,
            'Tenant_id' => '2222',
            'TenantBranchId' => '22221111',
            'FaciliyName' => '東京本社',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);

        DB::table('tenant_branches')->insert([
            'id' => 8,
            'Tenant_id' => '2222',
            'TenantBranchId' => '22222222',
            'FaciliyName' => '関西支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenant_branches')->insert([
            'id' => 9,
            'Tenant_id' => '3333',
            'TenantBranchId' => '33331111',
            'FaciliyName' => '九州支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenant_branches')->insert([
            'id' => 10,
            'Tenant_id' => '4444',
            'TenantBranchId' => '44441111',
            'FaciliyName' => '東北支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenant_branches')->insert([
            'id' => 11,
            'Tenant_id' => '4444',
            'TenantBranchId' => '44442222',
            'FaciliyName' => 'アジア支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
        DB::table('tenant_branches')->insert([
            'id' => 12,
            'Tenant_id' => '5555',
            'TenantBranchId' => '55551111',
            'FaciliyName' => '欧米支店',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
    }
}
