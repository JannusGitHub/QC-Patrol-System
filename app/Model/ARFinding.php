<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Classification;
use App\Model\Factor;
use App\Model\FactorItemList;
use App\Model\ARFInCharge;
use App\Model\AuditResult;

class ARFinding extends Model
{
    //
    protected $table = 'ar_findings';

    public function in_charge_details() {
    	return $this->hasMany(ARFInCharge::class, 'ar_finding_id', 'id');
    }

    public function classification_info() {
    	return $this->hasOne(Classification::class, 'id', 'classification_id');
    }

    public function factor_info() {
    	return $this->hasOne(Factor::class, 'id', 'factor_id');
    }

    public function factor_item_list_info() {
    	return $this->hasOne(FactorItemList::class, 'id', 'factor_item_list_id');
    }

    public function audit_result_info() {
    	return $this->hasOne(AuditResult::class, 'id', 'audit_result_id');
    }
}
