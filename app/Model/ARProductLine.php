<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ProductLine;

class ARProductLine extends Model
{
    //
    protected $table = 'ar_product_lines';

    public function product_line_info() {
    	return $this->hasOne(ProductLine::class, 'id', 'product_line_id');
    }
}