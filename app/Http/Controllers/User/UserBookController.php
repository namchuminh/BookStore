<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;


class UserBookController extends Controller
{
    public function index(){
        return view('user.book.index');
    }

    public function show($slug){
        // Tìm sách theo slug, đồng thời load quan hệ 'category'
        $book = Book::with('category')->where('slug', $slug)->first();

        // Nếu không tìm thấy, trả về 404
        if (!$book) {
            abort(404);
        }

        $relatedBooks = Book::where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->take(5) // Giới hạn số lượng sản phẩm liên quan
            ->get();
        
        $images = explode('#', $book->image);

        $comments = Comment::where('book_id', $book->id)
            ->with('user') // Tải thông tin người dùng
            ->orderByDesc('id')
            ->get();

        // Truyền dữ liệu sách và sản phẩm liên quan vào view
        return view('user.book.show', compact('book', 'relatedBooks', 'images', 'comments'));
    }
}
