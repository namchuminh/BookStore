<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class UserCommentController extends Controller
{
    public function create(Request $request){
        if(!auth()->user()){
            return redirect()->back()->with('error', 'Vui lòng đăng nhập đánh giá.');
        }

        $request->validate([
            'content' => 'required|string|max:500', // Kiểm tra nội dung đánh giá
            'star' => 'required|integer|between:1,5', // Kiểm tra số sao (từ 1 đến 5)
            'bookId' => 'required|integer|exists:books,id', // Kiểm tra book_id tồn tại trong bảng books
        ], [
            // Các thông báo lỗi
            'content.required' => 'Nội dung đánh giá là bắt buộc.',
            'content.string' => 'Nội dung đánh giá phải là chuỗi văn bản.',
            'content.max' => 'Nội dung đánh giá tối đa 500 ký tự.',

            'star.required' => 'Số sao là bắt buộc.',
            'star.integer' => 'Số sao phải là một số nguyên.',
            'star.between' => 'Số sao phải nằm trong khoảng từ 1 đến 5.',
            
            'bookId.required' => 'Mã sách là bắt buộc.',
            'bookId.integer' => 'Mã sách phải là một số nguyên.',
            'bookId.exists' => 'Mã sách không tồn tại trong cơ sở dữ liệu.',
        ]);

        // Lưu bình luận
        Comment::create([
            'content' => $request->content, // Nội dung đánh giá
            'star' => $request->star, // Số sao đánh giá
            'book_id' => $request->bookId, // ID của sách (nếu có)
            'user_id' => auth()->user()->id, // ID của người dùng
        ]);

        // Quay lại trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Đánh giá thành công!');
    }
}
