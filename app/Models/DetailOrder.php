<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'order_id',
        'quantity',
    ];

    /**
     * Quan hệ với bảng Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Quan hệ với bảng Book
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
}