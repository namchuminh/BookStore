@extends('User.layouts.app')
@section('title', "Thể loại sách") 

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4" style="font-family: 'Roboto', sans-serif; font-weight: 700;">Các Thể Loại Sách</h2>
    <div class="row">
        @foreach ($categories as $category)
            <a href="{{ route('user.category.show', $category->slug)}}" class="col-md-4 col-sm-6 mb-4">
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden position-relative category-card">
                    <!-- Hình ảnh chuyên mục -->
                    <img src="{{ asset('storage/'.$category->image) }}" class="card-img-top" alt="{{ $category->name }}" style="height: 350px; object-fit: cover;">
                    
                    <!-- Overlay hiệu ứng khi hover -->
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50 text-white p-3 text-center">
                        <h4 class="card-title">{{ $category->name }}</h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
<style>
    /* Hiệu ứng hover cho thẻ card */
.category-card:hover .card-img-top {
    transform: scale(1.1); /* Phóng to hình ảnh */
    transition: all 0.3s ease-in-out;
}

.category-card:hover .overlay {
    background-color: rgba(0, 0, 0, 0.7); /* Làm tối nền overlay khi hover */
    transition: all 0.3s ease-in-out;
}

/* Hiệu ứng sáng lên cho overlay */
.category-card:hover .card-title {
    color: #f8f9fa; /* Màu chữ sáng hơn khi hover */
    transform: scale(1.05); /* Phóng to tiêu đề */
    transition: all 0.3s ease-in-out;
}
</style>
@endsection
