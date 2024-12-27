<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class UserCategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        // Trả về view với dữ liệu cần thiết
        return view('user.category.index', compact('categories'));
    }

    public function show($slug){
        $query = Book::with('category') // Lấy thông tin chuyên mục
        ->withAvg('comments as average_star', 'star') // Tính trung bình số sao từ bảng comments
        ->whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug); // Lọc theo slug của category
        })
        ->orderBy('created_at', 'desc'); // Sắp xếp theo thời gian tạo

        // Phân trang mỗi lần lấy 12 sách
        $books = $query->paginate(12);

        // Lấy danh sách chuyên mục
        $categories = Category::all();

        // Trả về view với dữ liệu cần thiết
        return view('user.book.index', compact('books', 'categories'));
    }
}
