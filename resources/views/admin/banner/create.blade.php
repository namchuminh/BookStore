@extends('Admin.layouts.app')
@section('title', 'Thêm Banner')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm Banner</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Quản Lý Banner</a></li>
                    <li class="breadcrumb-item active">Thêm Banner</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <form class="card card-default" method="POST" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Thông Tin Banner</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Ảnh Banner -->
                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Chọn Sách (book_id) -->
                        <div class="form-group">
                            <label for="book_id">Sách</label>
                            <select class="form-control" name="book_id" id="book_id">
                                <option value="">Chọn Sách (Tùy chọn)</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Chọn Chuyên Mục (category_id) -->
                        <div class="form-group">
                            <label for="category_id">Chuyên Mục</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Chọn Chuyên Mục (Tùy chọn)</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Vị trí Banner -->
                        <div class="form-group">
                            <label for="position">Vị trí</label>
                            <select class="form-control" name="position" id="position">
                                <option value="slide">Slide</option>
                                <option value="banner">Banner</option>
                            </select>
                            @error('position')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <a class="btn btn-success" href="{{ route('admin.banner.index') }}">Quay Lại</a>
                <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
            </div>
        </form>
    </div><!-- /.container-fluid -->
</section>

<style>
    .form-control:disabled, .form-control[readonly] {
        background-color: white;
        opacity: 1;
    }
</style>

@section('script')
<script>
    $(document).ready(function() {
        // Khi chọn chuyên mục, vô hiệu hóa sách
        $('#category_id').on('change', function() {
            if ($(this).val()) {
                $('#book_id').prop('disabled', true); // Disable book_id
            } else {
                $('#book_id').prop('disabled', false); // Enable book_id
            }
        });

        // Khi chọn sách, vô hiệu hóa chuyên mục
        $('#book_id').on('change', function() {
            if ($(this).val()) {
                $('#category_id').prop('disabled', true); // Disable category_id
            } else {
                $('#category_id').prop('disabled', false); // Enable category_id
            }
        });
    });
</script>
@endsection
@endsection
