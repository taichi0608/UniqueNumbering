<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnNumberRequest;
use App\Models\UnNumber;
use App\Models\DivDate;
use DB;

class UnNumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        

        return view(
            'UnNumber.UnNumber_index',
        );


    }
    public function create()
    {
        return view(
            'UnNumber.UnNumber_create',
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
        $div_dates = DivDate::select('name')->first();
        $err_check ='';
        
        //採番区分の存在チェック
        if(DB::table('un_numbers')->where('NumberDiv', $inputs['NumberDiv'])->exists() === false ){
            $input = $inputs['NumberDiv'];
            $t_numberDiv = '';
        }else{
            $t_numberDiv = '入力された編集区分は既に存在しています。別名に変更してください。';
            $err_check = '1';
        }

        //編集区分の存在チェック
        if(DB::table('div_edits')->where('NumberDiv_id', $inputs['EditDiv'])->exists() !== false ){
            $input = DB::table('div_edits')->where('NumberDiv_id', $inputs['EditDiv'])->first();//数値入力から名前を返す
            $t_edit = $input->name;
        }else{
            $t_edit = '入力された編集区分は存在しません。';
            $err_check = '1';
        }

        //日付区分の存在チェック
        if(DB::table('div_dates')->where('NumberDiv_id', $inputs['DateDiv'])->exists() !== false ){
            $input = DB::table('div_dates')->where('NumberDiv_id', $inputs['DateDiv'])->first();//数値入力から名前を返す
            $t_date = $input->name;
        }else{
            $t_date = '入力された日付区分は存在しません。';
            $err_check = '1';
        }

        //クリア区分の存在チェック
        if(DB::table('number_clear_divs')->where('NumberDiv_id', $inputs['NumberClearDiv'])->exists() !== false ){
            $input = DB::table('number_clear_divs')->where('NumberDiv_id', $inputs['NumberClearDiv'])->first();//数値入力から名前を返す
            $t_clear = $input->name;
        }else{
            $t_clear = '入力されたクリア区分は存在しません。';
            $err_check = '1';
        }
       
        //存在チェック後の分岐処理
        if($err_check !== ''){
            //データベース照合でNGが1つでもあればリダイレクトさせる
            return redirect()
            ->route('UnNumber.create')
            ->with(compact('t_date', 't_edit', 't_numberDiv', 't_numberDiv', 't_clear'))//存在する値orエラーメッセージ表示
            ->withInput();//入力されている値をセッションで渡す

        }else{
            return view(
                'UnNumber.UnNumber_confirm',compact('inputs','div_dates', 't_date', 't_edit', 't_numberDiv', 't_clear')
            ); 
        }

    }

    /**
     * 登録する 
     * 
     * @return view
     */
    public function store(Request $request)
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
}
