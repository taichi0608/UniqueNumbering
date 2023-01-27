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

            'symbol' => 'A',
            'count_id' => '1',

            'created_at'=>'2033-11-16 14:26:37',
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

            'symbol' => 'BB',
            'count_id' => '12',

            'created_at'=>'2033-11-26 14:26:37',
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

            'symbol' => 'CCC',
            'count_id' => '31',

            'created_at'=>'2033-11-16 14:26:37',
        ]);
    }
}
