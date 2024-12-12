<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Lấy thông tin user hiện tại
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'phone' => 'nullable|string|max:15'
        ], [
            'name.required' => 'Họ tên là bắt buộc',
            'name.string' => 'Tên chỉ được phép là chuỗi ký tự',
            'name.max' => 'Họ tên tối đa là 255 ký tự',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email tối đa là 255 ký tự',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'username.required' => 'Tên đăng nhập là bắt buộc',
            'username.string' => 'Tên đăng nhập chỉ được phép là chuỗi ký tự',
            'username.max' => 'Tên đăng nhập tối đa là 255 ký tự',
            'username.unique' => 'Tên đăng nhập đã tồn tại trong hệ thống',
            'phone.max' => 'Số điện thoại tối đa là 15 ký tự'
        ]);

        // Cập nhật thông tin người dùng
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Thông tin cá nhân đã được cập nhật!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4|confirmed',
        ], [
            'current_password.required' => 'Mật khẩu hiện tại là bắt buộc.',
            'new_password.required' => 'Mật khẩu mới là bắt buộc.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất :min ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ]);
        
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Mật khẩu hiện tại không chính xác.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Mật khẩu đã được thay đổi thành công!');
    }
}
