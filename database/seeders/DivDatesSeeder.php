<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DivDatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('div_dates')->insert([
            'id' => 1,
            'un_number_id' => '1',
            'name' => '顧客登録日',
            'date_code' => '1',
            'memo' => '会員登録された日',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        ]);
        DB::table('div_dates')->insert([
            'id' => 2,
            'un_number_id' => '2',
            'name' => 'チェックイン日',
            'date_code' => '2',
            'memo' => 'チェックインされた日',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        ]);
        DB::table('div_dates')->insert([
            'id' => 3,
            'un_number_id' => '3',
            'name' => 'サーバー日付',
            'date_code' => '3',
            'memo' => 'Webで登録された日',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        ]);
        DB::table('div_dates')->insert([
            'id' => 4,
            'un_number_id' => '4',
            'name' => 'サーバー日付',
            'date_code' => '2',
            'memo' => 'Webで登録された日',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        ]);
        DB::table('div_dates')->insert([
            'id' => 5,
            'un_number_id' => '5',
            'name' => '予約日付',
            'date_code' => '3',
            'memo' => 'Webで登録された日',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        ]);
        
    }
}
