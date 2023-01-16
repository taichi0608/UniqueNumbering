<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivDate extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'div_dates';

    //可変項目
    protected $fillable = 
    [
        'NumberDiv_id',
        'name',
        'date_code',
        'memo',
        'updated_at',
    ];

    public function UnNumbers(){
        return $this->belongsTo(UnNumber::class);
    }
}
