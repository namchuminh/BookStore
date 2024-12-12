<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'book_id',
        'category_id',
        'position',
    ];

    // Quan hệ với bảng Book (mỗi banner thuộc về một sách)
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    // Quan hệ với bảng Category (mỗi banner thuộc về một chuyên mục)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
