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

    public function number(Request $request)
    {
        // データを受け取る
        $inputs = $request->all();
        
        if(isset($inputs['Symbol'])){//記号が含まれた時のロジック（記号＋日付＋連番）<= 編集区分=1 なら
            $number_count = mb_strlen($inputs['InitNumber']);

            //ここから記号関連
            $symbol_count = mb_strlen($inputs['Symbol']);//記号を文字数に変換
            $leng = intval($inputs['Lengs']);//文字列を数値に変換
            $leng_count = $leng - $symbol_count;//有効桁数を記号の数分減らす
            $total_count = $symbol_count + $number_count;//記号と初期値の合計値
            
            if($total_count > $leng){//初期値と記号の合計が有効桁数より大きい場合
                $replace = substr( $inputs['InitNumber'] , $leng_count, strlen($inputs['InitNumber']) - $leng_count );//指定の文字数まで先頭を除外する
                $unNumber = $inputs['Symbol']. date('Ymd'). $replace;

                // dd($unNumber,'a');
            }elseif($leng > $total_count){
                $replace = str_pad($inputs['InitNumber'],$leng,'0', STR_PAD_LEFT);//指定の文字数まで０で埋める
                $unNumber = $inputs['Symbol'].date('Ymd').  $replace;

                // dd($unNumber,'b');  
            }elseif($leng = $total_count){
                $unNumber = $inputs['Symbol']. date('Ymd').  $inputs['InitNumber'];

                // dd($unNumber,'c');
            }
            
        }


       
        // return view('UnNumber.UnNumber_create',compact('unNumber') );
        return redirect()->route('UnNumber.create')->with(compact('unNumber'));
    }




}
