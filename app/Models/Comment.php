<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'star',
        'book_id',
        'user_id'
    ];

    // Quan hệ với model Book
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id'); // Book::class đại diện cho bảng Book
    }

    // Quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // User::class đại diện cho bảng User
    }
}

