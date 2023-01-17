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
            'TenantCode' => 'JTB',
            'TenantBranch' => '東京本社',
            'NumberId' => '11111111',
            'NumberDiv' => '予約NO.',
            'InitNumber' => '1',
            'Symbol' => 'Q',
            'Lengs' => '10',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
        DB::table('un_numbers')->insert([
            'id' => 2,
            'TenantCode' => 'JTB',
            'TenantBranch' => '関西支店',
            'NumberId' => '11112222',
            'NumberDiv' => '予約NO.',
            'InitNumber' => '1',
            'Symbol' => 'S',
            'Lengs' => '10',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
        DB::table('un_numbers')->insert([
            'id' => 3,
            'TenantCode' => 'JTB',
            'TenantBranch' => '九州支店',
            'NumberId' => '11113333',
            'NumberDiv' => '予約NO.',
            'InitNumber' => '1',
            'Symbol' => 'E',
            'Lengs' => '10',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
        DB::table('un_numbers')->insert([
            'id' => 4,
            'TenantCode' => '楽天',
            'TenantBranch' => '東京本社',
            'NumberId' => '22221111',
            'NumberDiv' => '予約NO.',
            'InitNumber' => '1',
            'Symbol' => 'L',
            'Lengs' => '10',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
        DB::table('un_numbers')->insert([
            'id' => 5,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '利用NO.',
            'InitNumber' => '1',
            'Symbol' => 'B',
            'Lengs' => '10',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
        DB::table('un_numbers')->insert([
            'id' => 6,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '利用個別NO.',
            'InitNumber' => '1',
            'Symbol' => 'K',
            'Lengs' => '10',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
        DB::table('un_numbers')->insert([
            'id' => 7,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '顧客NO.',
            'InitNumber' => '1',
            'Symbol' => 'J',
            'Lengs' => '10',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
        DB::table('un_numbers')->insert([
            'id' => 8,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '会員NO.',
            'InitNumber' => '1',
            'Symbol' => 'G',
            'Lengs' => '10',
            'EditDiv' => '1',
            'DateDiv' => '1',
            'NumberClearDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
            'UpdatePerson'=>'1',
        ]);
    }
}
