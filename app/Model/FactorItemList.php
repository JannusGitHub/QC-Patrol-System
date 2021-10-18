<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Factor;

class FactorItemList extends Model
{
    public function factor() {
    	return $this->hasOne(Factor::class, 'id', 'factor_id');
    }
}