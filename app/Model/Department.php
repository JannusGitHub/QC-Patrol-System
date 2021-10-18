<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\TUV;
use App\Model\Customer;
use App\Model\Internal;
use App\Model\Supplier;
use App\Model\TUVBatchDepartment;
use App\Model\CustomerBatchDepartment;
use App\Model\InternalBatchDepartment;
use App\Model\SupplierBatchDepartment;

class Department extends Model
{
    //
    protected $table = 'departments';

    protected $connection = 'rapidx';

    public function tuv() {
        return $this->belongsTo(TUV::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function internal() {
        return $this->belongsTo(Internal::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function tuv_batch_department(){
        return $this->belongsTo(TUVBatchDepartment::class);
    }

    public function customer_batch_department(){
        return $this->belongsTo(CustomerBatchDepartment::class);
    }

    public function internal_batch_department(){
        return $this->belongsTo(InternalBatchDepartment::class);
    }

    public function supplier_batch_department(){
        return $this->belongsTo(SupplierBatchDepartment::class);
    }
}
