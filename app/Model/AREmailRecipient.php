<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AREmailRecipient extends Model
{
    //
    protected $table = 'ar_email_recipients';
	
	public function user_info() {
    	return $this->hasOne(User::class, 'id', 'user_id');
    }
}
