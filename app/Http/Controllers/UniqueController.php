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
        $dateTime = date('Ymd');//指定が無ければ現在時間を設定する
     

        //日付区分と紐付け

        //編集区分と紐付け
        $edit = DB::table('un_numbers')// テナントコードと予約名称（ユニークキー）で編集区分を絞込み取得
            ->where('NumberId', $inputs['tenant_code'])
            ->where('NumberDiv', $inputs['NumberDiv'])
            ->first();
        $edit_id = $edit->edit_id;
      
        
        //予約番号 のみ
        if($edit_id == 1){//編集区分 = 1 
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $replace;

                dd($reserve_id,'A');

            }elseif($length > $number_count){
                $replace = str_pad($inputs['client_id'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $replace;

                dd($reserve_id,'B');  

            }elseif($length = $number_count){
                $reserve_id = $inputs['client_id'];

                dd($reserve_id,'C');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }

        //日付＋予約番号
        if($edit_id == 2){//編集区分 = 2 
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                //顧客のIDを各予約の連番にする場合
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $dateTime. $replace;

                dd($reserve_id,'D');

            }elseif($length > $number_count){
                $replace = str_pad($inputs['client_id'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $dateTime. $replace;

                dd($reserve_id,'E'); 

            }elseif($length = $number_count){
                $reserve_id = $dateTime. $inputs['client_id'];

                dd($reserve_id,'F');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }

        //日付 + "-" + 予約番号
        if($edit_id == 3){//編集区分 = 3 
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $dateTime. "-". $replace;

                dd($reserve_id,'G');

            }elseif($length > $number_count){
                $replace = str_pad($inputs['client_id'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $dateTime. "-". $replace;

                dd($reserve_id,'H');  

            }elseif($length = $number_count){
                $reserve_id = $dateTime. "-". $inputs['client_id'];

                dd($reserve_id,'I');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }

        //記号＋予約番号
        if($edit_id === 4){//編集区分 = 4 
            // dd($inputs);
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($edit->Symbol);//記号を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length){//初期値と記号の合計が有効桁数より大きい場合
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $edit->Symbol. $replace;

                dd($reserve_id,'J');

            }elseif($length > $total_count){
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($inputs['client_id'],$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $reserve_id = $edit->Symbol. $replace;

                dd($reserve_id,'K');

            }elseif($length = $total_count){
                $reserve_id = $edit->Symbol. $inputs['client_id'];

                dd($reserve_id,'L');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }

        //記号＋日付＋連番
        if($edit_id === 5){//編集区分 = 5 
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($edit->Symbol);//記号を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length){//初期値と記号の合計が有効桁数より大きい場合
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $edit->Symbol. $dateTime. $replace;

                dd($reserve_id,'O');

            }elseif($length > $total_count){
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($inputs['client_id'],$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $reserve_id = $edit->Symbol. $dateTime.  $replace;

                dd($reserve_id,'P');

            }elseif($length = $total_count){
                $reserve_id = $edit->Symbol. $dateTime.  $inputs['client_id'];

                dd($reserve_id,'Q');

            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }


        dd('エラー');
        return view(
            'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
        ); 
    }

    public function unique_store(Request $request)
    {
        // データを受け取る
        $reserveInputs = $request->all();

        // dd($reserveInputs);
        
        DB::beginTransaction();
        try{
            reserve::create($reserveInputs);
            DB::commit();
            // データを登録
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
        return view(
            'UnNumber.unique_index',
        );
    }









    //予約名称ごとにIDをNo.1～発行するロジックを組み込もうと思ったがif文から変更することになるので一旦保留

    public function unique_confirm_numbers(Request $request)
    {
        
        $inputs = $request->all();// POSTされたデータを受け取る

        //各種予約項目ごとにNo.1～番号を発行
        $reserveNumbers = DB::table('reserves')// テナントコードと予約名称（ユニークキー）で編集区分を絞込み取得
            ->where('NumberDiv', $inputs['NumberDiv'])
            ->where('TenantCode', $inputs['tenant_code'])
            ->orderBy('created_at', 'DESC')
            ->first();
        
        //データベースにデータがあれば＋１、なければ１を代入する
        if($reserveNumbers != null){
            $reserveNumber = $reserveNumbers -> InitNumber;
            $initNumber = $reserveNumber + 1;
        }else{
            $initNumber = 1;
        }
        // dd($initNumber);





        //日付区分と紐付け

        //編集区分と紐付け
        $edit = DB::table('un_numbers')// テナントコードと予約名称（ユニークキー）で編集区分を絞込み取得
            ->where('NumberId', $inputs['tenant_code'])
            ->where('NumberDiv', $inputs['NumberDiv'])
            ->first();
        $edit_id = $edit->edit_id;
      
        
        //予約番号 のみ
        if($edit_id == 1){//編集区分 = 1 
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $replace;

                // dd($reserve_id,'A');
            }elseif($length > $number_count){
                $replace = str_pad($inputs['client_id'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = $replace;

                // dd($reserve_id,'B');  
            }elseif($length = $number_count){
                $reserve_id = $inputs['client_id'];

                // dd($reserve_id,'C');
            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }

        //日付＋予約番号
        if($edit_id == 2){//編集区分 = 2 
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                //顧客のIDを各予約の連番にする場合
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = date('Ymd'). $replace;

                // dd($reserve_id,'D');
            }elseif($length > $number_count){
                $replace = str_pad($inputs['client_id'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = date('Ymd'). $replace;

                // dd($reserve_id,'E');  
            }elseif($length = $number_count){
                $reserve_id = date('Ymd'). $inputs['client_id'];

                // dd($reserve_id,'F');
            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }

        //日付 + "-" + 予約番号
        if($edit_id == 3){//編集区分 = 3 
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = date('Ymd'). "-". $replace;

                // dd($reserve_id,'G');
            }elseif($length > $number_count){
                $replace = str_pad($inputs['client_id'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $reserve_id = date('Ymd'). "-". $replace;

                // dd($reserve_id,'H');  
            }elseif($length = $number_count){
                $reserve_id = date('Ymd'). "-". $inputs['client_id'];

                // dd($reserve_id,'I');
            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }

        //記号＋予約番号
        if($edit_id === 4){//編集区分 = 4 
            // dd($inputs);
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($edit->Symbol);//記号を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length){//初期値と記号の合計が有効桁数より大きい場合
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $edit->Symbol. $replace;

                // dd($reserve_id,'J');
            }elseif($length > $total_count){
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($inputs['client_id'],$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $reserve_id = $edit->Symbol. $replace;

                // dd($reserve_id,'K');  
            }elseif($length = $total_count){
                $reserve_id = $edit->Symbol. $inputs['client_id'];

                // dd($reserve_id,'L');
            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }

        //記号＋日付＋連番
        if($edit_id === 5){//編集区分 = 5 
            $number_count = mb_strlen($inputs['client_id']);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($edit->Symbol);//記号を文字数に変換
            $length = intval($edit->Lengs);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length){//初期値と記号の合計が有効桁数より大きい場合
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $inputs['client_id'] , $d_length, strlen($inputs['client_id']) - $d_length );//指定の文字数まで先頭を除外する
                $reserve_id = $edit->Symbol. date('Ymd'). $replace;

                // dd($reserve_id,'O');
            }elseif($length > $total_count){
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($inputs['client_id'],$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $reserve_id = $edit->Symbol .date('Ymd').  $replace;

                // dd($reserve_id,'P');  
            }elseif($length = $total_count){
                $reserve_id = $edit->Symbol . date('Ymd').  $inputs['client_id'];

                // dd($reserve_id,'Q');
            }
            return view(
                'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
            ); 
        }


        dd('エラー');
        return view(
            'UnNumber.unique_confirm',compact('inputs','edit','reserve_id')
        ); 
    }

    public function unique_store_number(Request $request)
    {
        // データを受け取る
        $reserveInputs = $request->all();

        // dd($reserveInputs);
        
        DB::beginTransaction();
        try{
            reserve::create($reserveInputs);
            DB::commit();
            // データを登録
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
