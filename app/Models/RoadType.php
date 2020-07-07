<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadType extends Model
{
    public function works()
    {
        return $this->hasMany(ContractWork::class);
    }
}
