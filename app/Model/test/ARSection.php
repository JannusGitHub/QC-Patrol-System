<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Section;

class ARSection extends Model
{
    //
    protected $table = 'ar_sections';

    public function section_info() {
    	return $this->hasOne(Section::class, 'id', 'section_id');
    }
}
