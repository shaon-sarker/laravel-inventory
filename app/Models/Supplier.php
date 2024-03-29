<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'address', 'type', 'photo', 'shop', 'account_holder', 'account_number', 'branch_name', 'bank_name', 'status'];
}
