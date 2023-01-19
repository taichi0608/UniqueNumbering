<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnNumberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //文字数指定が無いところは仮でMAX1000にしています。
            'TenantCode' => 'required|max:4',
            'TenantBranch' => 'required|max:4',
            'NumberId' => 'required|max:1000',
            'NumberDiv' => 'required|max:10|unique:un_numbers,NumberDiv',//un_numbersテーブルのNumberDivカラムに入力された値が存在するならNG
            'InitNumber' => 'required|numeric|max:100000000',
            'Symbol' => 'required|max:3',
            'Lengs' => 'required|numeric|max:1000',
            'div_edit_id' => 'required|numeric|exists:div_edits,edit_code|max:1000',//div_editsテーブルのNumberDiv_idカラムに入力された値が存在しないならNG
            'DateDiv' => 'required|numeric|exists:div_dates,date_code|max:1000',//div_datesテーブルのNumberDiv_idカラムに入力された値が存在しないならNG
            'NumberClearDiv' => 'required|numeric|exists:number_clear_divs,clear_code|max:1000',//div_datesテーブルのNumberDiv_idカラムに入力された値が存在しないならNG
            'UpdatePerson' => 'required|max:1000',
        ];
    }
}
