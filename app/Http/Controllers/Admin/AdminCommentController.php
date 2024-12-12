<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Book;
use App\Models\User;

class AdminCommentController extends Controller
{
    // Hiển thị danh sách bình luận với phân trang và tìm kiếm
    public function index(Request $request)
    {
        $search = $request->input('search'); // Lấy từ khóa tìm kiếm từ request

        // Lấy danh sách bình luận có phân trang và tìm kiếm theo tên sách và tên người bình luận
        $comments = Comment::when($search, function ($query) use ($search) {
            $query->whereHas('book', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        })
        ->with(['book', 'user'])  // Load thông tin sách và người dùng
        ->orderBy('created_at', 'desc')  // Sắp xếp theo ngày tạo bình luận
        ->paginate(10); // Phân trang 10 bản ghi

        return view('admin.comment.index', compact('comments', 'search'));
    }

    // Xóa bình luận
    public function destroy($commentId)
    {
        // Tìm bình luận theo ID và xóa
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect()->route('admin.comment.index')->with('success', 'Bình luận đã được xóa thành công.');
    }
}

