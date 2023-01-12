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
            'TenantCode' => '111',
            'TenantBranch' => '111',
            'TenantBranchName' => 'test1',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);

        DB::table('tenant_branches')->insert([
            'id' => 2,
            'TenantCode' => '222',
            'TenantBranch' => '222',
            'TenantBranchName' => 'test2',
            'created_at'=>'2023-01-16 14:26:37',
            'updated_at'=>'2023-01-16 14:26:37',
            // 'deleted_at'=>'2023-01-06 14:26:37',
        ]);
    }
}
