<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Section;

class EmailRecipient extends Model
{
    protected $table = 'email_recipients';

    public function receiver_info() {
    	return $this->hasOne(User::class, 'id', 'receiver');
    }

    public function section() {
    	return $this->hasOne(Section::class, 'id', 'section_id');
    }
}
