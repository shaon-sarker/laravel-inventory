<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static function total_amount()
    {

        $counts = Order::orderBy('id', 'desc')->sum('sub_total');
        return $counts;
    }
}
