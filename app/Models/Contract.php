<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }

    public function works()
    {
        return $this->hasMany(ContractWork::class);
    }
}
