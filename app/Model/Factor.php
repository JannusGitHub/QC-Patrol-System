<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\FactorItemList;

class Factor extends Model
{
    public function factor_item_lists() {
    	return $this->hasMany(FactorItemList::class, 'factor_id', 'id');
    }
}
