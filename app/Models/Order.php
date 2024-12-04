<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'CustomerID',
        'Total',
        'Status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'OrderID');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'OrderID');
    }
}
