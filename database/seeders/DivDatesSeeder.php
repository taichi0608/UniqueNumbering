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
            'date_code' => '1',
            'name' => 'サーバー日付',

            'memo' => '会員登録された日',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        ]);
        DB::table('div_dates')->insert([
            'id' => 2,
            'date_code' => '2',
            'name' => 'ホテルデイト',

            'memo' => '予約日',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        ]);
        DB::table('div_dates')->insert([
            'id' => 3,
            'date_code' => '3',
            'name' => 'チェックイン日',

            'memo' => 'チェックインされた日',
            'created_at'=>'2033-11-16 14:26:37',
            'updated_at'=>'2033-11-16 14:26:37',
        ]);
       
        
    }
}
