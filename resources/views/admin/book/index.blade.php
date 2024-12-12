@extends('Admin.layouts.app')
@section('title', 'Quản Lý Sách')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Quản Lý Sách</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('admin.book.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Tìm kiếm sách" value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-primary ml-2 w-50">Tìm kiếm</button>
                            </form>
                            @if(auth()->user()->role == "admin")
                                <a href="{{ route('admin.book.create') }}" class="btn btn-success">Thêm Sách</a>
                            @endif
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình Ảnh</th>
                                    <th>Tên Sách</th>
                                    <th>Giá</th>
                                    <th>Danh Mục</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($books as $key => $book)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img style="width: 150px; height: 200px;" src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="">
                                        </td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ number_format($book->price, 0, ',', '.') }} VND</td>
                                        <td>{{ $book->category->name ?? 'Chưa có danh mục' }}</td>
                                        <td>
                                            <a href="{{ route('admin.book.edit', $book->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> Cập Nhật</a>
                                            <form action="{{ route('admin.book.destroy', $book->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa-solid fa-trash"></i> Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Không tìm thấy sách nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $books->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
