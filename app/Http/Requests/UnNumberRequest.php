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
            'TenantCode' => 'required|max:4',
            'TenantBranch' => 'required|max:4',
            'NumberId' => 'required',
            'NumberDiv' => 'required|max:10|unique:un_numbers,NumberDiv',//un_numbersテーブルのNumberDivカラムに入力された値が存在するならNG
            'InitNumber' => 'required|numeric',
            'Symbol' => 'required|max:3',
            'Lengs' => 'required|numeric',
            'EditDiv' => 'required|numeric|exists:div_edits,NumberDiv_id',//div_editsテーブルのNumberDiv_idカラムに入力された値が存在しないならNG
            'DateDiv' => 'required|numeric|exists:div_dates,NumberDiv_id',//div_datesテーブルのNumberDiv_idカラムに入力された値が存在しないならNG
            'NumberClearDiv' => 'required|numeric',
            'UpdatePerson' => 'required',
        ];
    }
}
