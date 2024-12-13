<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        // Lấy 10 sách mới nhất
        $newBooks = Book::with('category')->orderBy('created_at', 'desc')->take(10)->get();

        // Lấy 6 sách ngẫu nhiên
        $randomBooks = Book::with('category')->inRandomOrder()->take(6)->get();

        // Lấy các chuyên mục nhiều sách (giới hạn 5 chuyên mục)
        $popularCategories = Category::withCount('books')
            ->orderBy('books_count', 'desc')
            ->take(5)
            ->get();

        // Lấy các sách bán được nhiều (dựa trên tổng số lượng trong DetailOrder, giới hạn 10 sách)
        $bestSellingBooks = Book::with('category')->withSum('detailOrders', 'quantity')
            ->orderBy('detail_orders_sum_quantity', 'desc')
            ->take(10)
            ->get();

        return view('user.home.index', compact('newBooks', 'randomBooks', 'popularCategories', 'bestSellingBooks'));
    }
}
