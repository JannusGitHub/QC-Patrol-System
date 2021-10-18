<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Section;

class ARSection extends Model
{
    protected $table = 'ar_product_lines';

    public function section_info() {
    	return $this->hasOne(Section::class, 'id', 'section_id');
    }
}