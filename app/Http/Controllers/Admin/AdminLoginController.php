<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Đăng nhập hệ thống quản trị'
        ];

        return view('admin.login', $data);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == 'user') {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors(['error' => 'Bạn không có quyền truy cập trang quản trị.']);
            } else {
                return redirect()->intended('/admin');
            }
        }
    
        // Đăng nhập thất bại
        return redirect()->route('admin.login')->withErrors(['error' => 'Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.']);
    }
}

