<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;
use DB;

class SystemController extends Controller
{
    public function system_index()
    {
        return view(
            'UnNumber.system_index',
        );
    }

    public function system_create(Request $request)
    {
        $inputs = $request->all();
        $client = DB::table('clients')->where('id', $inputs['SignIn'])->first();

        // ➁ 採番区分特定の処理 IDも取得DB更新処理で使う
        $edits = DB::table('t_number_informations')// 採番用のシステムをチョイス
            ->where('tenant_id',$client->tenant_id)// ログインしたユーザーのテナントIDで絞り込む
            ->where('number_id',$inputs['number_id'])// 各種登録ボタンに仕込んでいるナンバーIDを基に採番処理の内容を確定させる。
            ->first();// とりあえずナンバーIDは同じテナントIDでは被らないとする
      
        // ➁ 採番するIDの処理 *ここ最後DBに更新
        $count_id = $edits->count_id;

        if($count_id != null){
            $change_number = $count_id + 1;
        }else{
            $change_number = 1;
        }
        

        // ➂ 日付区分によって表示する日付を変更する処理
        $date_id = $edits->date_id;

        //テスト用でclientsテーブルに日付区分関係を全て入れてます。
        $dateTimes =  DB::table('clients')// インプットされた会員番号から登録日などの各情報を取得
            ->where('client_id', $client->client_id)
            ->first();

        if($date_id == 1){
            //取得する時間のテーブルが別々なら$dateTimesからif文の中に入れる。
            $dateTime = $dateTimes -> registed_at;
            
        }elseif($date_id == 2){
            $dateTime = $dateTimes -> reserved_at;
            
        }elseif($date_id == 3){
            $dateTime = $dateTimes -> checked_at;

        }else{
            $dateTime = date('Ymd');//指定が無ければ現在時間を設定する（保険）
        }
        // DBテーブルから取得すると文字列かつ時間も取得するので、タイム型に変更しつつ年月日表示に変更
        $dateTime = date('Ymd', strtotime($dateTime));

      
        // ➃ 編集区分によって採番するパターンを変更する処理
        $edit_id = $edits->edit_id;

        // 予約番号 のみ
        if($edit_id == 1)
        {
            $number_count = mb_strlen($change_number);//初期値を桁数に変換
            $length = intval($edits->edit_length);//文字列を数値に変換
       
            if($number_count > $length)//初期値の合計が有効桁数より大きい場合
            {
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $replace;
            }
            elseif($length > $number_count)
            {
                $replace = str_pad($change_number,$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $replace;  
            }
            elseif($length = $number_count)
            {
                $reserve_id = $change_number;
            }
        }

        // 日付＋予約番号
        if($edit_id == 2)
        {
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            $length = intval($edits->edit_length);//文字列を数値に変換
       
            if($number_count > $length)//初期値の合計が有効桁数より大きい場合
            {
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                //顧客のIDを各予約の連番にする場合
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $dateTime. $replace;
            }
            elseif($length > $number_count)
            {
                $replace = str_pad($change_number,$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $dateTime. $replace;
            }
            elseif($length = $number_count)
            {
                $reserve_id = $dateTime. $change_number;
            }
        }

        //日付 + "-" + 予約番号
        if($edit_id == 3)
        {
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            $length = intval($edits->edit_length);//文字列を数値に変換
            
            if($number_count > $length)//初期値の合計が有効桁数より大きい場合
            {
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $dateTime. "-". $replace;
            }
            elseif($length > $number_count)
            {
                $replace = str_pad($change_number,$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $dateTime. "-". $replace;
            }
            elseif($length = $number_count)
            {
                $reserve_id = $dateTime. "-". $change_number;
            }
        }

        //記号＋予約番号
        if($edit_id === 4)
        {
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($edits->Symbol);//記号を文字数に変換
            $length = intval($edits->edit_length);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length)//初期値と記号の合計が有効桁数より大きい場合
            {
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $edits->Symbol. $replace;
            }
            elseif($length > $total_count)
            {
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($change_number,$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $reserve_id = $edits->Symbol. $replace;
            }
            elseif($length = $total_count)
            {
                $reserve_id = $edits->Symbol. $change_number;
            }
        }

        //記号＋日付＋連番
        if($edit_id === 5){
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($edits->Symbol);//記号を文字数に変換
            $length = intval($edits->edit_length);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length)//初期値と記号の合計が有効桁数より大きい場合
            {
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $edits->Symbol. $dateTime. $replace;
            }
            elseif($length > $total_count)
            {
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($change_number,$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $reserve_id = $edits->Symbol. $dateTime.  $replace; 
            }
            elseif($length = $total_count)
            {
                $reserve_id = $edits->Symbol. $dateTime.  $change_number;
            }
        }


        
        $input = DB::table('t_number_informations') -> find($edits->id);
        dd($input,$change_number);
        $input->update([
            "count_id" => $change_number,
        ]);

        DB::beginTransaction();
        try{

            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
       



     

        return view(
            'UnNumber.system_create', compact('reserve_id')
        );
    }
}
