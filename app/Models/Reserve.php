<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'reserves';

    //可変項目
    protected $fillable = 
    [
        'NumberDiv',
        'reserve_id',
        'InitNumber',
        'client_id',
        'client_name',
        'TenantCode',
        'edit_id',
        'edit_name',
        'Symbol',
        'Lengs',
        'DateDiv',
        'date_name',
      
        'updated_at',
    ];
}
