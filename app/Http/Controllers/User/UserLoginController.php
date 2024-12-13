<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function loginSubmit(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lấy thông tin đăng nhập
        $username = $request->input('username');
        $password = $request->input('password');

        // Tạo danh sách các trường có thể dùng để đăng nhập
        $loginFields = ['username', 'email', 'phone'];

        // Lặp qua các trường để kiểm tra đăng nhập
        foreach ($loginFields as $field) {
            if (Auth::attempt([$field => $username, 'password' => $password, 'status' => 'activate', 'role' => 'user'])) {
                // Đăng nhập thành công
                return response()->json(['success' => true]);
            }
        }

        // Đăng nhập thất bại
        return response()->json(['error' => 'Tên đăng nhập, email hoặc số điện thoại hoặc mật khẩu không đúng.']);
    }
}
