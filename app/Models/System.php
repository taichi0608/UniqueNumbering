<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserve;
use App\Models\DivEdit;
use App\Models\TNumberInformation;
use DB;

class System extends Model
{
    use HasFactory;

    // 予約番号を発行するまでの処理 --------------------

    
    //  ➁ 採番するIDの処理 * $change_number 最後DBに更新
    public function numberSearch($edits)
    {
        $count_id = $edits->count_id;// 採番基準となる連番を代入

        if($count_id != null){
            $change_number = $count_id + 1;
        }else{
            $change_number = 1;
        }

        return $change_number;
    }

    // ➂ 日付区分によって表示する日付を変更する処理
    public function dateOrder($edits, $client)
    {
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

        return $dateTime;
    }

    // ➃ 編集区分によって採番するパターンを変更する処理
    public function division($edits, $change_number, $dateTime)
    {
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
           $symbol_count = mb_strlen($edits->symbol);//記号を文字数に変換
           $length = intval($edits->edit_length);//文字列を数値に変換
           $total_count = $symbol_count + $number_count;//記号と初期値の合計値
           
           if($total_count > $length)//初期値と記号の合計が有効桁数より大きい場合
           {
               $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
               $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
               $reserve_id = $edits->symbol. $replace;
           }
           elseif($length > $total_count)
           {
               $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
               $replace = str_pad($change_number,$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
               $reserve_id = $edits->symbol. $replace;
           }
           elseif($length = $total_count)
           {
               $reserve_id = $edits->symbol. $change_number;
           }
       }

       //記号＋日付＋連番
       if($edit_id === 5){
           $number_count = mb_strlen($change_number);//初期値を文字数に変換
           //ここから記号関連
           $symbol_count = mb_strlen($edits->symbol);//記号を文字数に変換
           $length = intval($edits->edit_length);//文字列を数値に変換
           $total_count = $symbol_count + $number_count;//記号と初期値の合計値
           
           if($total_count > $length)//初期値と記号の合計が有効桁数より大きい場合
           {
               $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
               $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
               $reserve_id = $edits->symbol. $dateTime. $replace;
           }
           elseif($length > $total_count)
           {
               $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
               $replace = str_pad($change_number,$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
               $reserve_id = $edits->symbol. $dateTime.  $replace; 
           }
           elseif($length = $total_count)
           {
               $reserve_id = $edits->symbol. $dateTime.  $change_number;
           }
       }

        return $reserve_id;
    }

    // ➄ 予約確定する前にcount_idを更新するだけの処理。（今回はただの採番の為ユニークキーになるのであればOK）
    public function update_id($edits, $change_number)
    {
        DB::beginTransaction();
        try{
            // 予約確定する前にcount_idを更新するだけの処理
            $update = TNumberInformation::find($edits->id);
            $update->update([
                "count_id" => $change_number,
            ]);
            DB::commit();

        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , 'まだ予約は完了しておりません。');
        

    }

    // ➄ 予約確定 バージョン
    public function update_create($edits, $reserve_id, $change_number, $client)
    {
        DB::beginTransaction();
        try{
            // 予約確定する前にcount_idを更新するだけの処理
            $update = TNumberInformation::find($edits->id);
            $update->update([
                "count_id" => $change_number,
                "newest_id" => $reserve_id,
            ]);

            // 予約確定でreserves予約テーブルに登録する処理
            Reserve::create([
                "number_name" => $edits->number_name,
                "reserve_id" => $reserve_id,
                "client_id" => $client->client_id,
                "client_name" => $client->client_name,
                "tenant_id" => $edits->tenant_id,
            ]);

            DB::commit();

        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');

       
    }

    



}
