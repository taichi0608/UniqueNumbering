<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NumberClearDivsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('number_clear_divs')->insert([
            'id' => 1,
            'NumberDiv_id' => '111',
            'name' => '無し',
            'clear_code' => '1',
            'memo' => '2033-01-16 14:26:37',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        DB::table('number_clear_divs')->insert([
            'id' => 2,
            'NumberDiv_id' => '222',
            'name' => '日時',
            'clear_code' => '2',
            'memo' => '2033-01',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        DB::table('number_clear_divs')->insert([
            'id' => 3,
            'NumberDiv_id' => '333',
            'name' => '月次',
            'clear_code' => '3',
            'memo' => '01-16 14:26:37',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        DB::table('number_clear_divs')->insert([
            'id' => 4,
            'NumberDiv_id' => '444',
            'name' => '年次',
            'clear_code' => '4',
            'memo' => '2033',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
    }
}
