<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TNumberInfomationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_number_informations')->insert([
            'id' => 1,

            'tenant_id' => '11111111',
            'tenant_name' => 'JTB',
            'tenantBranch_name' => '東京本社',

            'number_id' => '1',
            'number_name' => '予約No',

            'edit_id' => '1',
            'edit_name' => '予約番号のみ',
            'edit_length' => '15',

            'date_id' => '1',
            'date_name' => '会員登録日',

            'count_id' => '123456789',
   
        ]);
        DB::table('t_number_informations')->insert([
            'id' => 2,

            'tenant_id' => '11111111',
            'tenant_name' => 'JTB',
            'tenantBranch_name' => '東京本社',

            'number_id' => '2',
            'number_name' => '利用No',

            'edit_id' => '2',
            'edit_name' => '日付+連番',
            'edit_length' => '7',

            'date_id' => '2',
            'date_name' => 'ホテルデイト',

            'count_id' => '123456789',

        ]);
        DB::table('t_number_informations')->insert([
            'id' => 3,

            'tenant_id' => '11111111',
            'tenant_name' => 'JTB',
            'tenantBranch_name' => '東京本社',

            'number_id' => '3',
            'number_name' => '利用個別No',

            'edit_id' => '1',
            'edit_name' => '予約番号のみ',
            'edit_length' => '15',

            'date_id' => '1',
            'date_name' => '会員登録日',

            'count_id' => '123456789',
 
        ]);
        DB::table('t_number_informations')->insert([
            'id' => 4,

            'tenant_id' => '11111111',
            'tenant_name' => 'JTB',
            'tenantBranch_name' => '東京本社',

            'number_id' => '4',
            'number_name' => '利用部屋No',

            'edit_id' => '4',
            'edit_name' => '記号＋予約番号',
            'edit_length' => '15',

            'date_id' => '1',
            'date_name' => '会員登録日',

            'symbol' => 'CCC',
            'count_id' => '123456789',

        ]);
        DB::table('t_number_informations')->insert([
            'id' => 5,

            'tenant_id' => '11111111',
            'tenant_name' => 'JTB',
            'tenantBranch_name' => '東京本社',

            'number_id' => '5',
            'number_name' => '伝票No',

            'edit_id' => '5',
            'edit_name' => '記号＋日付＋予約番号',
            'edit_length' => '7',

            'date_id' => '3',
            'date_name' => 'チェックイン日',

            'symbol' => 'Y',
            'count_id' => '123456789',

        ]);
        DB::table('t_number_informations')->insert([
            'id' => 6,

            'tenant_id' => '11111111',
            'tenant_name' => 'JTB',
            'tenantBranch_name' => '東京本社',

            'number_id' => '6', // テナントIDごとにユニークキー
            'number_name' => '予約金No',

            'edit_id' => '3',
            'edit_name' => '日付＋"-"＋予約番号',
            'edit_length' => '6',

            'date_id' => '2',
            'date_name' => '予約日',
            
            'count_id' => '123456789',

        ]);
    }
}
