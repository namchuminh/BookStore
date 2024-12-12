@extends('Admin.layouts.app')
@section('title', 'Quản Lý Chuyên Mục')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Quản Lý Chuyên Mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Chuyên Mục</li>
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
                            <form action="{{ route('admin.category.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Tìm kiếm" value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-primary ml-2 w-50">Tìm kiếm</button>
                            </form>
                            @if(auth()->user()->role == "admin")
                                <a href="{{ route('admin.category.create') }}" class="btn btn-success">Thêm Chuyên Mục</a>
                            @endif
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình Ảnh</th>
                                    <th>Tên Chuyên Mục</th>
                                    <th>Đường Dẫn</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img style="width: 200px; height: 200px;" src="{{ asset('storage/' . $category->image) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{ $category->slug ?? 'N/A' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> Cập Nhật</a>
                                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa-solid fa-trash"></i> Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Không tìm thấy chuyên mục nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection