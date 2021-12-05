<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSell extends Model
{
    use HasFactory;

    protected $table = 'product_sells';

    protected $fillable = [
        'product_id',
        'sell_id',
        'qunatity'
    ];
}
