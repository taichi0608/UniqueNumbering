<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\UnNumberRequest;
use App\Http\Requests\SearchRequest;
use App\Models\UnNumber;
use App\Models\DivDate;
use App\Models\DivEdit;
use DB;

class EditController extends Controller
{
    // オリジナル編集区分の作成

    public function edit_create()
    {
        // $latestUmberId = UnNumber::where();
        $s_edits = DB::table('div_edits')->get();
        $s_dates = DB::table('div_dates')->get();
        return view(
            'UnNumber.edit_create', compact('s_edits','s_dates')
        );
    }

    public function edit_confirm(Request $request)
    {
        $inputs = $request->all();

        //入力された値から紐づいている行を取得し、nameカラムを格納する。
        $t_edit = DB::table('div_edits')->where('edit_id', $inputs['edit_id'])->first();
        $t_date = DB::table('div_dates')->where('date_code', $inputs['date_code'])->first();

        return view(
            'UnNumber.edit_confirm',compact('inputs','t_edit', 't_date')
        ); 
    }

    public function edit_store(Request $request)
    {
        $UnNumberInputs = $request->all();

        // データを登録
        DB::beginTransaction();
        try{
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
