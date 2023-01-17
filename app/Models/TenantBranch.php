<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TenantBranch extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'tenat_branches';

    //可変項目
    protected $fillable = 
    [
        'Tenant_id',
        'TenantBranchId',
        'FaciliyName',
        'updated_at',
    ];

    public function Tenants(){
        return $this->belongsTo(Tenant::class);
    }
}
