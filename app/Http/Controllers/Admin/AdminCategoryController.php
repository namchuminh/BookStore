<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        // Nhận từ khóa tìm kiếm từ request
        $search = $request->input('search');

        // Lấy các chuyên mục, lọc theo tên nếu có từ khóa tìm kiếm
        $categories = Category::when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10); // Phân trang 10 bản ghi

        return view('admin.category.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ], [
            'name.required' => 'Tên chuyên mục là bắt buộc.',
            'name.string' => 'Tên chuyên mục phải là chuỗi ký tự.',
            'name.max' => 'Tên chuyên mục không được vượt quá 255 ký tự.',
            'image.image' => 'Ảnh phải là một tệp hình ảnh.',
            'image.mimes' => 'Ảnh chỉ được phép có các định dạng: jpeg, png, jpg, gif, svg.',
            'slug.required' => 'Slug là bắt buộc.',
            'slug.string' => 'Slug phải là chuỗi ký tự.',
            'slug.max' => 'Slug không được vượt quá 255 ký tự.',
            'slug.unique' => 'Slug đã tồn tại. Vui lòng chọn slug khác.',
        ]);

        // Lưu chuyên mục
        Category::create([
            'name' => $request->input('name'),
            'image' => $request->file('image') ? $request->file('image')->store('categories', 'public') : null,
            'slug' => $request->input('slug'),
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Chuyên mục đã được thêm thành công.');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
        ], [
            'name.required' => 'Tên chuyên mục là bắt buộc.',
            'name.string' => 'Tên chuyên mục phải là chuỗi ký tự.',
            'name.max' => 'Tên chuyên mục không được vượt quá 255 ký tự.',
            'image.image' => 'Ảnh phải là một tệp hình ảnh.',
            'image.mimes' => 'Ảnh chỉ được phép có các định dạng: jpeg, png, jpg, gif, svg.',
            'slug.required' => 'Slug là bắt buộc.',
            'slug.string' => 'Slug phải là chuỗi ký tự.',
            'slug.max' => 'Slug không được vượt quá 255 ký tự.',
            'slug.unique' => 'Slug đã tồn tại, vui lòng chọn slug khác.',
        ]);

        // Cập nhật chuyên mục
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
            'image' => $request->file('image') ? $request->file('image')->store('categories', 'public') : $category->image,
            'slug' => $request->input('slug'),
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Chuyên mục đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            \Storage::delete($category->image); // Xóa hình ảnh nếu có
        }
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Chuyên mục đã được xóa thành công.');
    }
}
