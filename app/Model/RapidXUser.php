<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RapidXUser extends Model
{
    //

    protected $table = 'users';
    protected $connection = 'rapidx';
}
