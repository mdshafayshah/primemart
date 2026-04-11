<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
