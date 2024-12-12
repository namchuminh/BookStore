<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index(Request $request)
    {
        // Nhận từ khóa tìm kiếm từ request
        $search = $request->input('search');

        // Lấy các banner, lọc theo từ khóa tìm kiếm nếu có
        $banners = Banner::when($search, function ($query) use ($search) {
                // Tìm kiếm theo nhiều trường khác nhau
                $query->where(function($q) use ($search) {
                    $q->where('position', 'like', '%' . $search . '%')
                    ->orWhereHas('book', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%'); // Tìm kiếm theo tên sách
                    })
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%'); // Tìm kiếm theo tên chuyên mục
                    });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10); // Phân trang 10 bản ghi

        return view('admin.banner.index', compact('banners', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        $books = Book::all();
        return view('admin.banner.create', compact('categories', 'books'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'book_id' => 'nullable|exists:books,id',
            'category_id' => 'nullable|exists:categories,id',
            'position' => 'required|in:slide,banner',
        ], [
            'image.required' => 'Ảnh là bắt buộc.',
            'image.image' => 'Ảnh phải là một tệp hình ảnh.',
            'image.mimes' => 'Ảnh chỉ được phép có các định dạng: jpeg, png, jpg, gif, svg.',
            'position.required' => 'Vị trí là bắt buộc.',
            'position.in' => 'Vị trí chỉ có thể là "slide" hoặc "banner".',
        ]);

        // Lưu banner
        Banner::create([
            'image' => $request->file('image')->store('banners', 'public'),
            'book_id' => $request->input('book_id'),
            'category_id' => $request->input('category_id'),
            'position' => $request->input('position'),
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner đã được thêm thành công.');
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.show', compact('banner'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $books = Book::all();
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner', 'categories', 'books'));
    }


    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'book_id' => 'nullable|exists:books,id',
            'category_id' => 'nullable|exists:categories,id',
            'position' => 'required|in:slide,banner',
        ], [
            'image.image' => 'Ảnh phải là một tệp hình ảnh.',
            'image.mimes' => 'Ảnh chỉ được phép có các định dạng: jpeg, png, jpg, gif, svg.',
            'position.required' => 'Vị trí là bắt buộc.',
            'position.in' => 'Vị trí chỉ có thể là "slide" hoặc "banner".',
        ]);

        // Cập nhật banner
        $banner = Banner::findOrFail($id);
        $banner->update([
            'image' => $request->file('image') ? $request->file('image')->store('banners', 'public') : $banner->image,
            'book_id' => $request->input('book_id'),
            'category_id' => $request->input('category_id'),
            'position' => $request->input('position'),
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner->image) {
            \Storage::delete($banner->image); // Xóa hình ảnh nếu có
        }
        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner đã được xóa thành công.');
    }
}
