<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ARAuditor extends Model
{
    //
    protected $table = 'ar_auditors';

    public function user_info() {
    	return $this->hasOne(User::class, 'id', 'user_id');
    }
}