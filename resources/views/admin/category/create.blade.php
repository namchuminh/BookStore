@extends('Admin.layouts.app')
@section('title', 'Thêm Chuyên Mục')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm Chuyên Mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Quản Lý Chuyên Mục</a></li>
                    <li class="breadcrumb-item active">Thêm Chuyên Mục</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <form class="card card-default" method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Thông Tin Chuyên Mục</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Tên Chuyên Mục</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên Chuyên Mục">
                        </div>
                        <div class="form-group">
                            <label for="slug">Đường dẫn</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Đường dẫn">
                        </div>
                        <div class="form-group">
                            <label for="name">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
                <a class="btn btn-success" href="{{ route('admin.category.index') }}">Quay Lại</a>
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