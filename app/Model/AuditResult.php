<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\ARProductLine;
use App\Model\ARAuditor;
use App\Model\ARAuditee;
use App\Model\ARSection;
use App\Model\AREmailRecipient;
use App\Model\ARFinding;

class AuditResult extends Model
{
    //
    public function section_details() {
    	return $this->hasMany(ARSection::class, 'audit_result_id', 'id');
    }

    public function checked_by_info() {
    	return $this->hasOne(User::class, 'id', 'checked_by');
    }

    public function product_line_details() {
    	return $this->hasMany(ARProductLine::class, 'audit_result_id', 'id');
    }

    public function auditor_details() {
    	return $this->hasMany(ARAuditor::class, 'audit_result_id', 'id');
    }

    public function auditee_details() {
    	return $this->hasMany(ARAuditee::class, 'audit_result_id', 'id');
    }

    public function ar_email_recipient_details() {
        return $this->hasMany(AREmailRecipient::class, 'audit_result_id', 'id');
    }

    public function ar_finding_details() {
        return $this->hasMany(ARFinding::class, 'audit_result_id', 'id');
    }
}
