@extends('Admin.layouts.app')
@section('title', 'Thêm Sách')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm Sách</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.book.index') }}">Quản Lý Sách</a></li>
                    <li class="breadcrumb-item active">Thêm Sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <form class="card card-default" method="POST" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Thông Tin Sách</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Tên Sách</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên Sách" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="slug">Đường dẫn</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Đường dẫn" value="{{ old('slug') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sku">Mã SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="Mã SKU" value="{{ old('sku') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="origin_price">Giá Gốc</label>
                            <input type="number" class="form-control" id="origin_price" name="origin_price" placeholder="Giá gốc" value="{{ old('origin_price') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Giá sách" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="quantity">Số Lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Số lượng" value="{{ old('quantity') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category_id">Danh Mục</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="avatar">Ảnh Bìa</label>
                            <input type="file" class="form-control" name="avatar" id="avatar" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image">Hình Ảnh</label>
                            <input type="file" class="form-control" name="image[]" id="image" multiple required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags" value="{{ old('tags') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="total_page">Tổng Số Trang</label>
                            <input type="number" class="form-control" id="total_page" name="total_page" placeholder="Tổng số trang" value="{{ old('total_page') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="published_year">Năm Xuất Bản</label>
                            <input type="number" class="form-control" id="published_year" name="published_year" placeholder="Năm xuất bản" value="{{ old('published_year') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="format">Định Dạng</label>
                            <input type="text" class="form-control" id="format" name="format" placeholder="Định dạng" value="{{ old('format') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="language">Ngôn Ngữ</label>
                            <input type="text" class="form-control" id="language" name="language" placeholder="Ngôn ngữ" value="{{ old('language') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="century">Thế Kỷ</label>
                            <input type="text" class="form-control" id="century" name="century" placeholder="Thế kỷ" value="{{ old('century') }}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-success" href="{{ route('admin.book.index') }}">Quay Lại</a>
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
@endsection

@section('script')
<script>
    $(document).ready(function() {
        function createSlug(name) {
            return name.toLowerCase()
                .replace(/á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/g, 'a')
                .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/g, 'e')
                .replace(/i|í|ì|ỉ|ĩ|ị/g, 'i')
                .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/g, 'o')
                .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/g, 'u')
                .replace(/ý|ỳ|ỷ|ỹ|ỵ/g, 'y')
                .replace(/đ/g, 'd')
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text
        }

        $('input[name="name"]').on('keyup', function() {
            var name = $(this).val();
            $('input[name="slug"]').val(createSlug(name));
        });
    });
</script>
@endsection
