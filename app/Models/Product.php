<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'SCategoryID',
        'ProductName',
        'Description',
        'Price',
        'Stock'
    ];

    public function sCategory()
    {
        return $this->belongsTo(SCategory::class, 'SCategoryID');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'ProductID');
    }
}
