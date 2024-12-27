@extends('User.layouts.app')
@section('title', "Liên hệ") 

@section('content')
<section class="contact-section fix section-padding">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row g-4 align-items-center">
                <div class="col-lg-4">
                    <div class="contact-left-items">
                        <div class="contact-info-area-2">
                            <div class="contact-info-items mb-4">
                                <div class="icon">
                                    <i class="icon-icon-10"></i>
                                </div>
                                <div class="content">
                                    <p>Gọi cho chúng tôi 24/7</p>
                                    <h3>
                                        <a href="tel:+2085550112">+208-555-0112</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="contact-info-items mb-4">
                                <div class="icon">
                                    <i class="icon-icon-11"></i>
                                </div>
                                <div class="content">
                                    <p>Yêu cầu báo giá</p>
                                    <h3>
                                        <a href="mailto:example@gmail.com">example@gmail.com</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="contact-info-items border-none">
                                <div class="icon">
                                    <i class="icon-icon-12"></i>
                                </div>
                                <div class="content">
                                    <p>Địa chỉ</p>
                                    <h3>
                                        4517 Đại lộ Washington.
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="video-image">
                            <img src="assets/img/contact.jpg" alt="img">
                            <div class="video-box">
                                <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I"
                                    class="video-btn ripple video-popup">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-content">
                        <h2>Sẵn sàng bắt đầu chưa?</h2>
                        <p>
                            Chúng tôi luôn sẵn sàng hỗ trợ bạn. Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua các phương thức dưới đây. Chúng tôi cam kết sẽ phản hồi trong thời gian sớm nhất.
                        </p>
                        <form action="contact.php" id="contact-form" method="POST" class="contact-form-items">
                            <div class="row g-4">
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <span>Họ và tên*</span>
                                        <input type="text" name="name" id="name" placeholder="Nhập tên của bạn">
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <span>Email của bạn*</span>
                                        <input type="text" name="email" id="email123" placeholder="Nhập email của bạn">
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="form-clt">
                                        <span>Viết tin nhắn*</span>
                                        <textarea name="message" id="message" placeholder="Nhập tin nhắn của bạn"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-7 wow fadeInUp" data-wow-delay=".9s">
                                    <button type="submit" class="theme-btn">
                                        Gửi tin nhắn <i class="fa-solid fa-arrow-right-long"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
