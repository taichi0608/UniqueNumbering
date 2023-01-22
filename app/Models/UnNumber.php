<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DivDate;
use App\Models\DivEdit;
use App\Models\NumberClearDiv;
use DB;

class UnNumber extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'un_numbers';

    //可変項目
    protected $fillable = 
    [
        'TenantCode',
        'TenantBranch',
        'NumberId',
        'NumberDiv',
        'InitNumber',
        'Symbol',
        'Lengs',
        'div_edit_id',
        'DateDiv',
        'NumberClearDiv',
        'updated_at',
        'UpdatePerson',
        
    ];


    //リレーション関係
    public function DivDates(){
        return $this->hasOne(DivDate::class, 'date_code', 'DateDiv');
    }

    public function DivEdits(){
        return $this->hasOne(DivEdit::class,);
    }
}


