<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnNumberRequest;
use App\Http\Requests\SearchRequest;
use App\Models\UnNumber;
use App\Models\DivDate;
use App\Models\DivEdit;
use DB;

class UnNumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index(SearchRequest $request)
    {
        $searchId = $request->input('searchId');
        $query = UnNumber::query();

        //入力された場合、un_numbersテーブルから完全に一致するIdを$queryに代入
        if (isset($searchId)) {
            $query->where('NumberId',self::escapeLike($searchId));
            $UnNumbers = $query->orderBy('updated_at', 'asc')->paginate(5);//$queryをupdated_atの昇順に並び替え 
            $tenantName = $UnNumbers->first();//会社名と施設名を表示させるために１件だけ取得
            return view('UnNumber.UnNumber_index', [
                'UnNumbers' => $UnNumbers,
                'searchId' => $searchId,
                'tenantName' => $tenantName,
            ]);
        }
        return view('UnNumber.UnNumber_index', [
            'searchId' => $searchId,
        ]);
    }
    
    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
   

    public function create()
    {

        $s_dates = DB::table('div_dates')->get();
        $s_edits = DB::table('div_edits')->get();
        // dd($s_date);

        return view(
            'UnNumber.UnNumber_create',compact('s_dates', 's_edits')
        );
    }

    /**
     * 確認する 
     * 
     * @return view
     */
    public function confirm(UnNumberRequest $request)
    {
        $inputs = $request->all();
      
        //入力された値から紐づいている行を取得し、nameカラムを格納する。
        $t_edit = DB::table('div_edits')->where('edit_code', $inputs['div_edit_id'])->first()->name;
        $t_date = DB::table('div_dates')->where('date_code', $inputs['DateDiv'])->first()->name;
        $t_clear = DB::table('number_clear_divs')->where('clear_code', $inputs['NumberClearDiv'])->first()->name;
        
        return view(
            'UnNumber.UnNumber_confirm',compact('inputs','t_date', 't_edit',  't_clear')
        ); 
    }

    /**
     * 登録する 
     * 
     * @return view
     */
    public function store(UnNumberRequest $request)
    {
        // データを受け取る
        $UnNumberInputs = $request->all();

        DB::beginTransaction();
        try{
            // データを登録
            UnNumber::create($UnNumberInputs);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
        return redirect( route('home') );
    }










    //編集区分のロジック
    public function test()
    {
        return view(
            'UnNumber.test'
        );
    }

    public function input(Request $request)
    {
        
        $inputs = $request->all();// POSTされたデータを受け取る
        //初期値である
        
        //予約番号　のみ
        if($inputs['NumberClearDiv'] == "1"){//編集区分 = 1 
            $number_count = mb_strlen($inputs['InitNumber']);//初期値を文字数に変換
            $length = intval($inputs['Lengs']);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $inputs['InitNumber'] , $d_length, strlen($inputs['InitNumber']) - $d_length );//指定の文字数まで先頭を除外する
                $unNumber = $replace;

                dd($unNumber,'A');
            }elseif($length > $number_count){
                $replace = str_pad($inputs['InitNumber'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $unNumber = $replace;

                dd($unNumber,'B');  
            }elseif($length = $number_count){
                $unNumber = $inputs['InitNumber'];

                dd($unNumber,'C');
            }
            return view(
                'UnNumber.input',compact('unNumber')
            ); 
        }

        //日付＋予約番号　　
        if($inputs['NumberClearDiv'] == "2"){//編集区分 = 2 
            $number_count = mb_strlen($inputs['InitNumber']);//初期値を文字数に変換
            $length = intval($inputs['Lengs']);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $inputs['InitNumber'] , $d_length, strlen($inputs['InitNumber']) - $d_length );//指定の文字数まで先頭を除外する
                $unNumber = date('Ymd'). $replace;

                dd($unNumber,'D');
            }elseif($length > $number_count){
                $replace = str_pad($inputs['InitNumber'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $unNumber = date('Ymd'). $replace;

                dd($unNumber,'E');  
            }elseif($length = $number_count){
                $unNumber = date('Ymd'). $inputs['InitNumber'];

                dd($unNumber,'F');
            }
            return view(
                'UnNumber.input',compact('unNumber')
            ); 
        }

        //日付 + "-" + 予約番号　　
        if($inputs['NumberClearDiv'] == "3"){//編集区分 = 3 
            $number_count = mb_strlen($inputs['InitNumber']);//初期値を文字数に変換
            $length = intval($inputs['Lengs']);//文字列を数値に変換
            
            if($number_count > $length){//初期値の合計が有効桁数より大きい場合
                $d_length = $number_count - $length;//初期値と有効桁数の差分を代入する
                $replace = substr( $inputs['InitNumber'] , $d_length, strlen($inputs['InitNumber']) - $d_length );//指定の文字数まで先頭を除外する
                $unNumber = date('Ymd'). "-". $replace;

                dd($unNumber,'G');
            }elseif($length > $number_count){
                $replace = str_pad($inputs['InitNumber'],$length,'0', STR_PAD_LEFT);//有効桁数まで０で埋める
                $unNumber = date('Ymd'). "-". $replace;

                dd($unNumber,'H');  
            }elseif($length = $number_count){
                $unNumber = date('Ymd'). "-". $inputs['InitNumber'];

                dd($unNumber,'I');
            }
            return view(
                'UnNumber.input',compact('unNumber')
            ); 
        }

        //記号＋予約番号
        if($inputs['NumberClearDiv'] === "4"){//編集区分 = 4 
            $number_count = mb_strlen($inputs['InitNumber']);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($inputs['Symbol']);//記号を文字数に変換
            $length = intval($inputs['Lengs']);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length){//初期値と記号の合計が有効桁数より大きい場合
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $inputs['InitNumber'] , $d_length, strlen($inputs['InitNumber']) - $d_length );//指定の文字数まで先頭を除外する
                $unNumber = $inputs['Symbol']. $replace;

                // dd($unNumber,'J');
            }elseif($length > $total_count){
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($inputs['InitNumber'],$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $unNumber = $inputs['Symbol']. $replace;

                // dd($unNumber,'K');  
            }elseif($length = $total_count){
                $unNumber = $inputs['Symbol']. $inputs['InitNumber'];

                // dd($unNumber,'L');
            }
            return view(
                'UnNumber.input',compact('unNumber')
            ); 
        }

        //記号＋日付＋連番
        if($inputs['NumberClearDiv'] === "5"){//編集区分 = 5 
            $number_count = mb_strlen($inputs['InitNumber']);//初期値を文字数に変換
            //ここから記号関連
            $symbol_count = mb_strlen($inputs['Symbol']);//記号を文字数に変換
            $length = intval($inputs['Lengs']);//文字列を数値に変換
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $length){//初期値と記号の合計が有効桁数より大きい場合
                $d_length = $total_count - $length;//記号と初期値の合計値 - 有効桁数 （初期値を減らす目的）
                $replace = substr( $inputs['InitNumber'] , $d_length, strlen($inputs['InitNumber']) - $d_length );//指定の文字数まで先頭を除外する
                $unNumber = $inputs['Symbol']."-". date('Ymd')."-". $replace;

                // dd($unNumber,'O');
            }elseif($length > $total_count){
                $c_length = $length - $symbol_count;//有効桁数 - 記号数 （初期値に対してのみ記号の数を引いた有効桁数分の０を追加する目的）
                $replace = str_pad($inputs['InitNumber'],$c_length,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $unNumber = $inputs['Symbol']."-".date('Ymd')."-".  $replace;

                // dd($unNumber,'P');  
            }elseif($length = $total_count){
                $unNumber = $inputs['Symbol']."-". date('Ymd')."-".  $inputs['InitNumber'];

                // dd($unNumber,'Q');
            }
            return view(
                'UnNumber.input',compact('unNumber')
            ); 
        }


       dd('da');
        return view('UnNumber.test');
        // return redirect()->route('UnNumber.create')->with(compact('unNumber'));
    }




}
