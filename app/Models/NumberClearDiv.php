<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnNumber;

class NumberClearDiv extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'number_clear_divs';

    //可変項目
    protected $fillable = 
    [
        'NumberDiv_id',
        'name',
        'clear_code',
        'memo',
        'updated_at',
    ];

    public function UnNumbers(){
        return $this->belongsTo(UnNumber::class);
    }
}
