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
            'edit_id' => '1',
            'edit_name' => '予約番号のみ',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
       
        ]);
        DB::table('un_numbers')->insert([
            'id' => 2,
            'TenantCode' => 'JTB',
            'TenantBranch' => '関西支店',
            'NumberId' => '11112222',
            'NumberDiv' => '予約NO.',
            'InitNumber' => '1',
            'Symbol' => 'S',
            'edit_id' => '2',
            'edit_name' => '日付＋予約番号',
            'Lengs' => '7',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        
        ]);
        DB::table('un_numbers')->insert([
            'id' => 3,
            'TenantCode' => 'JTB',
            'TenantBranch' => '九州支店',
            'NumberId' => '11113333',
            'NumberDiv' => '予約NO.',
            'InitNumber' => '1',
            'Symbol' => 'E',
            'edit_id' => '3',
            'edit_name' => '日付＋"-"＋予約番号',
            'Lengs' => '6',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
         
        ]);
        DB::table('un_numbers')->insert([
            'id' => 4,
            'TenantCode' => '楽天',
            'TenantBranch' => '東京本社',
            'NumberId' => '22221111',
            'NumberDiv' => '予約NO.',
            'InitNumber' => '1',
            'Symbol' => 'L',
            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        
        ]);
        DB::table('un_numbers')->insert([
            'id' => 5,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '利用NO.',
            'InitNumber' => '1',
            'Symbol' => 'B',
            'edit_id' => '5',
            'edit_name' => '記号＋日付＋予約番号',
            'Lengs' => '7',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        
        ]);
        DB::table('un_numbers')->insert([
            'id' => 6,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '利用個別NO.',
            'InitNumber' => '1',
            'Symbol' => 'K',
            'edit_id' => '5',
            'edit_name' => '記号＋日付＋予約番号',
            'Lengs' => '7',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
       
        ]);
        DB::table('un_numbers')->insert([
            'id' => 7,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '顧客NO.',
            'InitNumber' => '1',
            'Symbol' => 'J',
            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        
        ]);
        DB::table('un_numbers')->insert([
            'id' => 8,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '会員NO.',
            'InitNumber' => '1',
            'Symbol' => 'G',
            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
         
        ]);
        DB::table('un_numbers')->insert([
            'id' => 9,
            'TenantCode' => 'JTB',
            'TenantBranch' => '九州支店',
            'NumberId' => '11113333',
            'NumberDiv' => '会員NO.',
            'InitNumber' => '1',
            'Symbol' => 'T',
            'edit_id' => '3',
            'edit_name' => '日付＋"-"＋予約番号',
            'Lengs' => '6',
            'DateDiv' => '2',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
         
        ]);
        DB::table('un_numbers')->insert([
            'id' => 10,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => '特殊NO.',
            'InitNumber' => '1',
            'Symbol' => 'TT',
            'edit_id' => '3',
            'edit_name' => '日付＋"-"＋予約番号',
            'Lengs' => '6',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
          
        ]);
        DB::table('un_numbers')->insert([
            'id' => 11,
            'TenantCode' => '楽天',
            'TenantBranch' => '九州支店',
            'NumberId' => '22223333',
            'NumberDiv' => 'VIP会員NO.',
            'InitNumber' => '1',
            'Symbol' => 'VIP',
            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
         
        ]);

        DB::table('un_numbers')->insert([
            'id' => 12,
            'TenantCode' => '日本旅行',
            'TenantBranch' => '九州支店',
            'NumberId' => '33333333',
            'NumberDiv' => 'VIP会員NO.',
            'InitNumber' => '1',
            'Symbol' => 'VIP',
            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
         
        ]);

        DB::table('un_numbers')->insert([
            'id' => 13,
            'TenantCode' => '楽天',
            'TenantBranch' => '関西支店',
            'NumberId' => '22222222',
            'NumberDiv' => 'VIP会員',
            'InitNumber' => '1',
            'Symbol' => 'V',
            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
         
        ]);

        DB::table('un_numbers')->insert([
            'id' => 14,
            'TenantCode' => '日本旅行',
            'TenantBranch' => '東京本社',
            'NumberId' => '33331111',
            'NumberDiv' => '会員',
            'InitNumber' => '1',
            'Symbol' => 'IP',
            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
         
        ]);

        DB::table('un_numbers')->insert([
            'id' => 15,
            'TenantCode' => '日本旅行',
            'TenantBranch' => '関西支店',
            'NumberId' => '33332222',
            'NumberDiv' => '会',
            'InitNumber' => '1',
            'Symbol' => 'P',
            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'Lengs' => '15',
            'DateDiv' => '1',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
         
        ]);
       
       
    }
}
