<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\TUV;
use App\Model\Customer;
use App\Model\Internal;
use App\Model\Supplier;
use App\Model\InternalBatchAuditor;
use App\Model\InternalBatchAuditee;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';
    protected $connection = 'rapidx';

    public function tuv_created_by() {
        return $this->belongsTo(TUV::class);
    }

    public function tuv_last_updated_by() {
        return $this->belongsTo(TUV::class);
    }

    public function tuv_corr_per_in_charge() {
        return $this->belongsTo(TUV::class);
    }

    public function tuv_con_per_in_charge() {
        return $this->belongsTo(TUV::class);
    }

    public function tuv_sys_per_in_charge() {
        return $this->belongsTo(TUV::class);
    }

    public function customer_created_by() {
        return $this->hasOne(Customer::class, 'id', 'created_by');
    }

    public function customer_last_updated_by() {
        return $this->hasOne(Customer::class, 'id', 'last_updated_by');
    }

    public function internal_created_by() {
        return $this->hasOne(Internal::class, 'id', 'created_by');
    }

    public function internal_last_updated_by() {
        return $this->hasOne(Internal::class, 'id', 'last_updated_by');
    }

    public function supplier_created_by() {
        return $this->hasOne(Supplier::class, 'id', 'created_by');
    }

    public function supplier_last_updated_by() {
        return $this->hasOne(Supplier::class, 'id', 'last_updated_by');
    }

    public function internal_batch_auditor() {
        return $this->hasOne(InternalBatchAuditor::class, 'id', 'user_id');
    }

    public function internal_batch_auditee() {
        return $this->hasOne(InternalBatchAuditee::class, 'id', 'user_id');
    }

    public function person_in_charge_cus_record() {
        return $this->belongsTo(Customer::class, 'id', 'person_in_charge');
    }

    public function person_in_charge_int_record() {
        return $this->belongsTo(Internal::class, 'id', 'person_in_charge');
    }

    public function person_in_charge_supp_record() {
        return $this->belongsTo(Supplier::class, 'id', 'person_in_charge');
    }
}
