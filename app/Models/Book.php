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
        'century',
        'slug',
        'author',
        'summary',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class, 'book_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'book_id'); // Mối quan hệ một-nhiều với Comment
    }
}
