<?php

namespace App\Models\Products;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_is',
        'status',
        'shipping_address',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
