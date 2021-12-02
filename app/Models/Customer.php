<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'address', 'shopname', 'photo', 'account_holder', 'account_number', 'branch_name', 'bank_name', 'status'];
}
