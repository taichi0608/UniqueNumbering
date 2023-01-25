<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use DB;

class UniqueController extends Controller
{
    //
    public function unique_index()
    {
        return view(
            'UnNumber.unique_index',
        );
    }


    public function unique_create(Request $request)
    {
        $inputs = $request->all();
        $client = DB::table('clients')->where('id', $inputs['SignIn'])->first();
        $edits = DB::table('un_numbers')->where('NumberId',[$client->tenant_code])->get();

        return view(
            'UnNumber.unique_create', compact('client','edits')
        );
    }


    public function unique_confirm(Request $request)
    {
        $inputs = $request->all();// POSTされたデータを受け取る
        
        $change_number = $inputs['client_id'];// 予約ナンバーを顧客のIDで採番する場合




        //各種予約項目ごとにNo.1～番号を発行
        $reserveNumbers = DB::table('reserves')// テナントコードと予約名称（ユニークキー）で編集区分を絞込み取得
            ->where('NumberDiv', $inputs['NumberDiv'])
            ->where('TenantCode', $inputs['tenant_code'])
            ->orderBy('created_at', 'DESC')
            ->first();
        
        //データベースにデータがあれば＋１、なければ１を代入する
        if($reserveNumbers != null){
            $reserveNumber = $reserveNumbers -> InitNumber;
            $change_number = $reserveNumber + 1;
        }else{
            $change_number = 1;
        }


        
        
          
        // un_numbersテーブルのテナントコードと予約名称（ユニークキー）で対象を絞込み取得
        $edit = DB::table('un_numbers')
            ->where('NumberId', $inputs['tenant_code'])
            ->where('NumberDiv', $inputs['NumberDiv'])
            ->first();
       
        $edit_id = $edit->edit_id;//編集区分を特定

        $date_id = $edit->DateDiv;//日付区分を特定
        
        $client_id = intval($inputs['client_id']);// 数値変換
        
        //テスト用でclientsテーブルに日付区分関係入れてます。
        $dateTimes =  DB::table('clients')// インプットされた会員番号から登録日などの各情報を取得
            ->where('client_id', $client_id)
            ->first();

        // 日付区分によって表示する日付を変更する
        if($date_id == 1){
            //取得する時間のテーブルが別々なら$dateTimesからif文の中に入れる。
            $dateTime = $dateTimes -> registed_at;
            
        }elseif($date_id == 2){
            $dateTime = $dateTimes -> reserved_at;
            
        }elseif($date_id == 3){
            $dateTime = $dateTimes -> checked_at;

        }else{
            $dateTime = date('Ymd');//指定が無ければ現在時間を設定する
        }

        // DBテーブルから取得すると文字列かつ時間も取得するので、タイム型に変更しつつ年月日表示に変更
        $dateTime = date('Ymd', strtotime($dateTime));
        

        //編集処理
        //予約番号 のみ
        if($edit_id == 1){//編集区分 = 1 
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $replace;

                // dd($reserve_id,'A');

            }elseif($length > $number_count){
                $replace = str_pad($change_number,$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $replace;

                // dd($reserve_id,'B');  

            }elseif($length = $number_count){
                $reserve_id = $change_number;

                // dd($reserve_id,'C');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id','change_number')
            ); 
        }

        //日付＋予約番号
        if($edit_id == 2){//編集区分 = 2 
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
       
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                //顧客のIDを各予約の連番にする場合
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $dateTime. $replace;

                // dd($reserve_id,'D');

            }elseif($length > $number_count){
                $replace = str_pad($change_number,$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $dateTime. $replace;

                // dd($reserve_id,'E'); 

            }elseif($length = $number_count){
                $reserve_id = $dateTime. $change_number;

                // dd($reserve_id,'F');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id','change_number')
            ); 
        }

        //日付 + "-" + 予約番号
        if($edit_id == 3){//編集区分 = 3 
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $dateTime. "-". $replace;

                // dd($reserve_id,'G');

            }elseif($length > $number_count){
                $replace = str_pad($change_number,$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $dateTime. "-". $replace;

                // dd($reserve_id,'H');  

            }elseif($length = $number_count){
                $reserve_id = $dateTime. "-". $change_number;

                // dd($reserve_id,'I');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id','change_number')
            ); 
        }

        //記号＋予約番号
        if($edit_id === 4){//編集区分 = 4 
            // dd($inputs);
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($edit->Symbol);//記号を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length){//初期値と記号の合計が有効桁数より大きい場合
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $edit->Symbol. $replace;

                // dd($reserve_id,'J');

            }elseif($length > $total_count){
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($change_number,$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $reserve_id = $edit->Symbol. $replace;

                // dd($reserve_id,'K');

            }elseif($length = $total_count){
                $reserve_id = $edit->Symbol. $change_number;

                // dd($reserve_id,'L');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id','change_number')
            ); 
        }

        //記号＋日付＋連番
        if($edit_id === 5){//編集区分 = 5 
            $number_count = mb_strlen($change_number);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($edit->Symbol);//記号を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length){//初期値と記号の合計が有効桁数より大きい場合
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $change_number , $d_length, strlen($change_number) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $edit->Symbol. $dateTime. $replace;

                // dd($reserve_id,'O');

            }elseif($length > $total_count){
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($change_number,$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $reserve_id = $edit->Symbol. $dateTime.  $replace;

                // dd($reserve_id,'P');

            }elseif($length = $total_count){
                $reserve_id = $edit->Symbol. $dateTime.  $change_number;

                // dd($reserve_id,'Q');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id','change_number')
            ); 
        }


        dd('エラー');
        return view(
            'UnNumber.unique_confirm',compact('inputs','edit','reserve_id','change_number')
        ); 
    }

    public function unique_store(Request $request)
    {
        // データを受け取る
        $reserveInputs = $request->all();

        // dd($reserveInputs);
        
        DB::beginTransaction();
        try{
            // データを登録
            reserve::create($reserveInputs);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
        return view(
            'UnNumber.unique_index',
        );
    }


   
     


}
