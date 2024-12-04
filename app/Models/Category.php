<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'CategoryName',
        'CategoryImage',
        'Description'
    ];

    public function scategories()
    {
        return $this->hasMany(SCategory::class, 'CategoryID');
    }
}
