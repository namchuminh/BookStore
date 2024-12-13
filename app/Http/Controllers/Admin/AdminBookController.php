<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index(Request $request)
    {
        // Nhận từ khóa tìm kiếm từ request
        $search = $request->input('search');

        // Lấy danh sách sách, lọc theo tên nếu có từ khóa tìm kiếm
        $books = Book::when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->with('category') // Lấy thông tin thể loại
            ->orderBy('id', 'desc')
            ->paginate(10); // Phân trang 10 bản ghi

        return view('admin.book.index', compact('books', 'search'));
    }

    public function create()
    {
        // Lấy danh sách thể loại để hiển thị trong form tạo sách
        $categories = Category::all();

        return view('admin.book.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu với thông báo lỗi bằng tiếng Việt
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'required|array', // Sử dụng mảng cho nhiều ảnh
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra kiểu ảnh
            'price' => 'required|numeric',
            'origin_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required|string|max:255|unique:books,sku',
            'tags' => 'nullable|string|max:255',
            'total_page' => 'nullable|integer',
            'published_year' => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
            'format' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'century' => 'nullable|string|max:255',
            'slug' => 'required|string|max:500|unique:categories,slug',
            'author' => 'required|string',
            'description' => 'required|string',
            'summary' => 'required|string',
        ], [
            'name.required' => 'Tên sách là bắt buộc.',
            'avatar.image' => 'Ảnh đại diện phải là hình ảnh.',
            'image.image' => 'Hình ảnh sách phải là hình ảnh.',
            'price.required' => 'Giá sách là bắt buộc.',
            'price.numeric' => 'Giá sách phải là số.',
            'sku.required' => 'Mã sách (SKU) là bắt buộc.',
            'category_id.exists' => 'Danh mục sách không tồn tại.',
            'slug.required' => 'Đường dẫn là bắt buộc.',
            'slug.string' => 'Đường dẫn phải là chuỗi ký tự.',
            'slug.max' => 'Đường dẫn không được vượt quá 500 ký tự.',
            'slug.unique' => 'Đường dẫn đã tồn tại. Vui lòng chọn đường dẫn khác.',
            'author.required' => 'Tác giả là bắt buộc.',
            'author.string' => 'Tác giả phải là chuỗi ký tự.',
            'description.required' => 'Mô tả sách là bắt buộc.',
            'description.string' => 'Mô tả sách phải là chuỗi ký tự.',
            'summary.required' => 'Tóm tắt sách là bắt buộc.',
            'summary.string' => 'Tóm tắt sách phải là chuỗi ký tự.',
        ]);

        // Xử lý upload ảnh đại diện
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('books/avatars', 'public');
        }

        // Xử lý upload nhiều ảnh sách
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // Lưu ảnh vào thư mục books/images và lấy đường dẫn
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/books'), $imageName);
                $imagePaths[] = asset('images/books/' . $imageName);
            }
        }

        // Tạo mới sách và lưu thông tin vào CSDL
        Book::create([
            'name' => $request->input('name'),
            'avatar' => $avatarPath ?? null,
            'image' => implode('#', $imagePaths), // Lưu các đường dẫn ảnh theo định dạng url1#url2#...
            'price' => $request->input('price'),
            'origin_price' => $request->input('origin_price'),
            'quantity' => $request->input('quantity'),
            'sku' => $request->input('sku'),
            'tags' => $request->input('tags'),
            'total_page' => $request->input('total_page'),
            'published_year' => $request->input('published_year'),
            'category_id' => $request->input('category_id'),
            'format' => $request->input('format'),
            'language' => $request->input('language'),
            'century' => $request->input('century'),
            'slug' => $request->input('slug'),
            'author' => $request->input('author'),
            'summary' => $request->input('summary'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.book.index')->with('success', 'Sách đã được thêm thành công.');
    }


    public function show($id)
    {
        // Hiển thị chi tiết sách
        $book = Book::findOrFail($id);

        return view('admin.book.show', compact('book'));
    }

    public function edit($id)
    {
        // Lấy sách cần chỉnh sửa và danh sách thể loại để hiển thị trong form
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('admin.book.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu với thông báo lỗi bằng tiếng Việt
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra kiểu ảnh
            'price' => 'required|numeric',
            'origin_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'sku' => 'required|string|max:255|unique:books,sku,' . $id,
            'tags' => 'nullable|string|max:255',
            'total_page' => 'nullable|integer',
            'published_year' => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
            'format' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'century' => 'nullable|string|max:255',
            'slug' => 'required|string|max:500|unique:books,slug,' . $id,
            'author' => 'required|string',
            'description' => 'required|string',
            'summary' => 'required|string',
        ], [
            'name.required' => 'Tên sách là bắt buộc.',
            'avatar.image' => 'Ảnh đại diện phải là hình ảnh.',
            'image.image' => 'Hình ảnh sách phải là hình ảnh.',
            'price.required' => 'Giá sách là bắt buộc.',
            'price.numeric' => 'Giá sách phải là số.',
            'sku.required' => 'Mã sách (SKU) là bắt buộc.',
            'category_id.exists' => 'Danh mục sách không tồn tại.',
            'slug.required' => 'Đường dẫn là bắt buộc.',
            'slug.string' => 'Đường dẫn phải là chuỗi ký tự.',
            'slug.max' => 'Đường dẫn không được vượt quá 500 ký tự.',
            'slug.unique' => 'Đường dẫn đã tồn tại, vui lòng chọn đường dẫn khác.',
            'author.required' => 'Tác giả là bắt buộc.',
            'author.string' => 'Tác giả phải là chuỗi ký tự.',
            'description.required' => 'Mô tả sách là bắt buộc.',
            'description.string' => 'Mô tả sách phải là chuỗi ký tự.',
            'summary.required' => 'Tóm tắt sách là bắt buộc.',
            'summary.string' => 'Tóm tắt sách phải là chuỗi ký tự.',
        ]);

        // Cập nhật sách
        $book = Book::findOrFail($id);

        // Xử lý ảnh đại diện nếu có thay đổi
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('books/avatars', 'public');
        } else {
            $avatarPath = $book->avatar;
        }

        // Xử lý ảnh sách (nếu có)
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/books'), $imageName);
                $imagePaths[] = asset('images/books/' . $imageName);
            }
        } else {
            $imagePaths = explode('#', $book->image); // Giữ lại các ảnh cũ nếu không upload ảnh mới
        }

        // Cập nhật thông tin sách
        $book->update([
            'name' => $request->input('name'),
            'avatar' => $avatarPath,
            'image' => implode('#', $imagePaths), // Cập nhật các đường dẫn ảnh theo định dạng url1#url2#...
            'price' => $request->input('price'),
            'origin_price' => $request->input('origin_price'),
            'quantity' => $request->input('quantity'),
            'sku' => $request->input('sku'),
            'tags' => $request->input('tags'),
            'total_page' => $request->input('total_page'),
            'published_year' => $request->input('published_year'),
            'category_id' => $request->input('category_id'),
            'format' => $request->input('format'),
            'language' => $request->input('language'),
            'century' => $request->input('century'),
            'slug' => $request->input('slug'),
            'author' => $request->input('author'),
            'summary' => $request->input('summary'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.book.index')->with('success', 'Sách đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Xóa hình ảnh (nếu có)
        if ($book->avatar) {
            \Storage::delete($book->avatar);
        }
        if ($book->image) {
            \Storage::delete($book->image);
        }

        // Xóa sách
        $book->delete();

        return redirect()->route('admin.book.index')->with('success', 'Sách đã được xóa thành công.');
    }
}
