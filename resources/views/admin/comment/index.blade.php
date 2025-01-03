@extends('Admin.layouts.app')

@section('title', 'Quản Lý Bình Luận')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Quản Lý Bình Luận</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Bình Luận</li>
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
                            <form action="{{ route('admin.comment.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm"
                                    value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-primary ml-2 w-50">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sách</th>
                                    <th>Người Bình Luận</th>
                                    <th>Nội Dung</th>
                                    <th>Đánh Giá</th> <!-- Hiển thị sao -->
                                    <th>Ngày Tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($comments as $key => $comment)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $comment->book->name }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->content }}</td>
                                        <td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $comment->star)
                                                    <i class="fa-solid fa-star text-warning"></i> <!-- Sao vàng -->
                                                @else
                                                    <i class="fa-regular fa-star text-muted"></i> <!-- Sao xám -->
                                                @endif
                                            @endfor
                                        </td>
                                        <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="POST"
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
                                        <td colspan="7" class="text-center">Không tìm thấy bình luận nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $comments->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection