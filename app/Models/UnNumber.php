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
}
