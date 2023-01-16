<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'EditDiv',
        'DateDiv',
        'NumberClearDiv',
        'updated_at',
        'UpdatePerson',
        
    ];

    public function DivDates(){
        return $this->hasMany(DivDate::class,'NumberDiv_id');
    }

    public function DivEdits(){
        return $this->hasMany(DivEdit::class,'NumberDiv_id');
    }
}
