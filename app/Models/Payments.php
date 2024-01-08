<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'tbl_payments';
    public $timestamps = false;
    protected $fillable  = [
    	'id','reference', 'name', 'facebook', 'email', 'contact_number', 'service_availed', 'mode_of_payment', 'other_mop','total_amount_paid','payment_slip',
        'payment_verified','date_verified','amount_deposited_php','amount_deposited_usd','date_update_admin','verified_by','remarks','date_created','created_by'
    ];
}
