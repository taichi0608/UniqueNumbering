<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UnNumbersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('un_numbers')->insert([
            'id' => 1,
            'TenantCode' => '会社名A',
            'TenantBranch' => '施設名A',
            'NumberId' => '1111',
            'NumberDiv' => '予約NO.',
            'InitNumber' => '1',
            'Symbol' => 'A',
            'Lengs' => '1',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
    }
}
