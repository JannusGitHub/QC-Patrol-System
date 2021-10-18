<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ARFInCharge extends Model
{
    //
    protected $table = 'arf_in_charges';

    public function user_info() {
    	return $this->hasOne(User::class, 'id', 'user_id');
    }
}
