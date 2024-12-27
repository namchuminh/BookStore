<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;


class UserBookController extends Controller
{
    public function index(Request $request)
    {
        // Khởi tạo query
        $query = Book::with('category') // Lấy thông tin chuyên mục
        ->withAvg('comments as average_star', 'star') // Tính trung bình số sao từ bảng comments
        ->orderBy('created_at', 'desc'); // Sắp xếp theo thời gian tạo

        // Lọc theo đánh giá sao
        if ($request->has('star') && !empty($request->star)) {
            $query->havingRaw('ROUND(average_star) IN (' . implode(',', $request->star) . ')');
        }

        // Kiểm tra nếu có tìm kiếm
        if ($request->has('search') && $request->search != '') {
            // Lọc theo tên sách
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Kiểm tra nếu có lọc theo giá
        if ($request->has('min_price') && $request->has('max_price')) {
            // Lọc theo khoảng giá
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // Phân trang mỗi lần lấy 12 sách
        $books = $query->paginate(12);

        // Lấy danh sách chuyên mục
        $categories = Category::all();

        // Trả về view với dữ liệu cần thiết
        return view('user.book.index', compact('books', 'categories'));
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
