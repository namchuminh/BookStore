<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar',
        'image',
        'price',
        'origin_price',
        'quantity',
        'sku',
        'tags',
        'total_page',
        'published_year',
        'category_id',
        'format',
        'language',
        'century'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
