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
        'TenantId',
        'CompanyName',
        'updated_at',
    ];

    public function TenantBranches(){
        return $this->hasMany(TenantBranch::class,'Tenant_id');
    }
}
