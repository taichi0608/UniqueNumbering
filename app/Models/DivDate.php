<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnNumber;

class DivDate extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'div_dates';

    //可変項目
    protected $fillable = 
    [
     
        'date_code',
        'name',
        'memo',
        'updated_at',
    ];



    public function UnNumbers(){
        return $this->belongsTo(UnNumber::class, 'DateDiv', 'date_code');
    }
}
