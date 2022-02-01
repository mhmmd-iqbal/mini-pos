<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTransaction extends Model
{
    use HasFactory;

    protected $table = 'purchase_transactions';

    protected $fillable = [
        'invoice',
        'total',
        'status',
        'suplier_id'
    ];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'suplier_id', 'id');
    }

    public function products(){
        return $this->hasManyThrough(
            Product::class, 
            ProductPurchase::class, 
            'purchase_id', 
            'id',
            'id', 
            'product_id', 
        )->select(['name', 'unit', 'price', 'quantity', 'products.id']);
    }
}
