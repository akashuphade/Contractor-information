<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractWork extends Model
{
    use SoftDeletes;


    protected $guarded = [];

    public function roadType()
    {
        return $this->belongsTo(RoadType::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
