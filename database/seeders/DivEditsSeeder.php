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
            'name' => '予約番号のみ',
            'edit_code' => '1',
            'memo' => '0000000000001',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        DB::table('div_edits')->insert([
            'id' => 2,
            'NumberDiv_id' => '222',
            'name' => '日付＋予約番号',
            'edit_code' => '2',
            'memo' => '2023040700001',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        DB::table('div_edits')->insert([
            'id' => 3,
            'NumberDiv_id' => '333',
            'name' => '日付＋"-"＋予約番号',
            'edit_code' => '3',
            'memo' => '20230407-0001',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        DB::table('div_edits')->insert([
            'id' => 4,
            'NumberDiv_id' => '444',
            'name' => '記号＋予約番号',
            'edit_code' => '4',
            'memo' => 'A000000000001',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        DB::table('div_edits')->insert([
            'id' => 5,
            'NumberDiv_id' => '555',
            'name' => '記号＋日付＋予約番号',
            'edit_code' => '5',
            'memo' => 'A000000000001',
            'created_at'=>'2033-01-16 14:26:37',
            'updated_at'=>'2033-01-16 14:26:37',
        ]);
        
    }
}
