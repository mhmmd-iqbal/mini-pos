<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellTransaction extends Model
{
    use HasFactory;

    protected $table = 'sell_transactions';

    protected $fillable = [
        'invoice',
        'total',
        'status',
        'customer_id'
    ];
}
