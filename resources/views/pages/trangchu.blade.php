 @extends('layouts.index')

 @section('title')
     {{ $title }}
 @endsection

@section('content')
        @if(session('thongbao'))
                    <div class="alert alert-success" style="text-align: center;">
                        {{session('thongbao')}}
                    </div>
        @endif
         <!-- Begin Slider Area -->
        <div class="slider-area">
            <!-- Main Slider -->
            <div class="swiper-container main-slider swiper-arrow with-bg_white">
                <div class="swiper-wrapper">
                    <div class="swiper-slide animation-style-01">
                        <div class="slide-inner bg-height" data-bg-image="{{ asset('uploads/images/banner.jpg') }}">
                            <div class="parallax-img-wrap">
                                <div class="chilly">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.2">
                                            <img src="{{ asset('uploads/images/banner.jpg') }}" alt="Inner Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="avocado">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.5">
                                            <img src="{{ asset('uploads/images/banner.jpg') }}" alt="Inner Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="parallax-with-content">
                                    <div class="slide-content">
                                        <span class="sub-title mb-3">Du Lịch Việt Nam</span>
                                        <h2 class="title mb-9">Đoán chào <br>năm mới</h2>
                                    </div>
                                    <div class="parallax-img-wrap">
                                        <div class="tomatoes">
                                            <div class="scene fill">
                                                <div class="expand-width" data-depth="0.5">
                                                    <img src="{{ asset('uploads/images/banner.jpg') }}" alt="Inner Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination with-bg d-md-none"></div>
            </div>

        </div>
        <!-- Slider Area End Here -->

        <!-- Begin Shipping Area -->
        <div class="shipping-area section-space-top-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="assets/images/shipping/icon/plane.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Đặt tour</h5>
                                <p class="short-desc mb-0">Đặt tour nhanh chống</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-6 pt-md-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="assets/images/shipping/icon/earphones.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Hổ trợ trực tuyến</h5>
                                <p class="short-desc mb-0">Tư vấn 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-6 pt-lg-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="assets/images/shipping/icon/shield.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Thanh toán an toàn</h5>
                                <p class="short-desc mb-0">Hệ thống thanh toán hoàn toàn an toàn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shipping Area End Here -->
        <!-- Mới nhất-->
        <div class="blog-area section-space-y-axis-100">
            <div class="container">
                <div class="section-title text-center pb-55">
                    <span class="sub-title text-primary">TOUR</span>
                    <h2 class="title mb-0">Mới Nhất</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container blog-slider">
                            <div class="swiper-wrapper">
                                @foreach ($chitiettour as $item)
                                     <div class="swiper-slide">
                                    <div class="blog-item">
                                        <div class="blog-img img-zoom-effect">
                                            <a href="{{ route('chitiettour', ['id'=>$item->id]) }}">
                                                <img class="img-full" src="{{ asset(PathImages($item->hinh_anh)) }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta text-dim-gray pb-3">
                                                <ul>
                                                    <li class="date"><i class="fa fa-calendar-o me-2"></i>{{ dinhDangNgayThang($item->ngay_di) }}</li>
                                                    <li>
                                                        <span class="comments me-3">
                                                        <a href="javascript:void(0)">2 bình luận</a>
                                                    </span>
                                                        <span class="link-share">
                                                        <a href="javascript:void(0)">chia sẻ</a>
                                                    </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title mb-4">
                                                <a href="{{ route('chitiettour', ['id'=>$item->id]) }}">{{ $item->tour }}</a>
                                            </h5>
                                            <p class="short-desc mb-5">{{ $item->lich_trinh }}</p>
                                            <div class="button-wrap">
                                                <a class="btn btn-custom-size btn-dark btn-lg rounded-0" href="{{ route('dattour', ['id'=>$item->id]) }}">Đặt tour</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tour hàng đầu --}}
        <div class="blog-area section-space-y-axis-100">
            <div class="container">
                <div class="section-title text-center pb-55">
                    <span class="sub-title text-primary">TOUR</span>
                    <h2 class="title mb-0">Hàng đầu</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container blog-slider">
                            <div class="swiper-wrapper">
                                @foreach ($chitiettour as $item)
                                     <div class="swiper-slide">
                                    <div class="blog-item">
                                        <div class="blog-img img-zoom-effect">
                                            <a href="{{ route('chitiettour', ['id'=>$item->id]) }}">
                                                <img class="img-full" src="{{ asset(PathImages($item->hinh_anh)) }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta text-dim-gray pb-3">
                                                <ul>
                                                    <li class="date"><i class="fa fa-calendar-o me-2"></i>{{ dinhDangNgayThang($item->ngay_di) }}</li>
                                                    <li>
                                                        <span class="comments me-3">
                                                        <a href="javascript:void(0)">2 bình luận</a>
                                                    </span>
                                                        <span class="link-share">
                                                        <a href="javascript:void(0)">chia sẻ</a>
                                                    </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title mb-4">
                                                <a href="{{ route('chitiettour', ['id'=>$item->id]) }}">{{ $item->tour }}</a>
                                            </h5>
                                            <p class="short-desc mb-5">{{ $item->lich_trinh }}</p>
                                            <div class="button-wrap">
                                                <a class="btn btn-custom-size btn-dark btn-lg rounded-0" href="">Đặt tour</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- Sự kiện-->
        <div class="blog-area section-space-y-axis-100">
            <div class="container">
                <div class="section-title text-center pb-55">
                    <span class="sub-title text-primary">TOUR</span>
                    <h2 class="title mb-0">Sự Kiện</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container blog-slider">
                            <div class="swiper-wrapper">
                                @foreach ($chitiettour as $item)
                                     <div class="swiper-slide">
                                    <div class="blog-item">
                                        <div class="blog-img img-zoom-effect">
                                            <a href="{{ route('chitiettour', ['id'=>$item->id]) }}">
                                                <img class="img-full" src="{{ asset(PathImages($item->hinh_anh)) }}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta text-dim-gray pb-3">
                                                <ul>
                                                    <li class="date"><i class="fa fa-calendar-o me-2"></i>{{ dinhDangNgayThang($item->ngay_di) }}</li>
                                                    <li>
                                                        <span class="comments me-3">
                                                        <a href="javascript:void(0)">2 bình luận</a>
                                                    </span>
                                                        <span class="link-share">
                                                        <a href="javascript:void(0)">chia sẻ</a>
                                                    </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title mb-4">
                                                <a href="{{ route('chitiettour', ['id'=>$item->id]) }}">{{ $item->tour }}</a>
                                            </h5>
                                            <p class="short-desc mb-5">{{ $item->lich_trinh }}</p>
                                            <div class="button-wrap">
                                                <a class="btn btn-custom-size btn-dark btn-lg rounded-0" href="">Đặt tour</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection