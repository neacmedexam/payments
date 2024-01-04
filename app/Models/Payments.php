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
    	'reference', 'name', 'facebook', 'email', 'contact_number', 'service_availed', 'mode_of_payment', 'other_mop','total_amount_paid','payment_slip','date_created','created_by'
    ];
}
