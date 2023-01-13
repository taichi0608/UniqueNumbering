<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function confirm(Request $request)
    {
        $inputs = $request->all();

        // $div_dates = DB::table('div_dates')->get(); 
        $div_dates = DivDate::select('name')->first();
        
        // dd($div_dates);

        return view(
            'UnNumber.UnNumber_confirm',compact('inputs','div_dates')
        );

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

        // dd($UnNumberInputs);
        
        DB::beginTransaction();
        try{
            UnNumber::create($UnNumberInputs);
            DB::commit();
            // データを登録
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
        return redirect( route('home') );
    }
}
