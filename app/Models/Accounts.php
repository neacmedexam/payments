<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $table = 'tbl_accounts';
    public $timestamps = false;
    protected $fillable  = [
    	 'name',  'email', 'password', 'user_type', 'date_created'
    ];
}
