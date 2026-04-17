<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'sku',
    'short_description',
    'description',
    'price',
    'image',
    'slug',
    'category_id',
    'stock',
    'meta_title',
    'meta_description'
];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
