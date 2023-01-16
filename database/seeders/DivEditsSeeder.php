<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DivEditsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('div_edits')->insert([
            'id' => 1,
            'NumberDiv_id' => '111',
            'name' => '日付＋予約番号',
            'edit_code' => '111',
            'memo' => '2023040711111',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        DB::table('div_edits')->insert([
            'id' => 2,
            'NumberDiv_id' => '222',
            'name' => '日付＋"-"＋予約番号',
            'edit_code' => '222',
            'memo' => '20230407-11111',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
    }
}
