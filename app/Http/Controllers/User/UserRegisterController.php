<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserRegisterController extends Controller
{
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'required|string|unique:users,phone|max:15',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.string' => 'Họ tên phải là chuỗi ký tự.',
            'name.max' => 'Họ tên dùng không được vượt quá 255 ký tự.',

            'username.required' => 'Vui lòng nhập tên người dùng.',
            'username.string' => 'Tên người dùng phải là chuỗi ký tự.',
            'username.unique' => 'Tên người dùng đã tồn tại.',
            'username.max' => 'Tên người dùng không được vượt quá 255 ký tự.',
            
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'email.max' => 'Địa chỉ email không được vượt quá 255 ký tự.',
            
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
            
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        // Lấy thông tin đăng ký
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');

        // Tạo người dùng mới
        try {
            $user = User::create([
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'password' => bcrypt($password), // Mã hóa mật khẩu
                'role' => 'user', // Role mặc định
                'status' => 'activate', // Status mặc định
            ]);

            // Đăng nhập người dùng ngay sau khi tạo
            Auth::login($user);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Xử lý lỗi khi tạo người dùng
            return response()->json(['error' => $e]);
        }
    }
}
