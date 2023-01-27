<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Tenant extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'tenats';

    //可変項目
    protected $fillable = 
    [
        'tenant_id',
        'tenant_name',
        'tenantBranch_name',
        'updated_at',
    ];

    
}
