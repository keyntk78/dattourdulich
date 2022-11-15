@extends('layouts.index')

 @section('title')
     {{ $title }}
 @endsection

@section('content')
       <!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x373.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item">
                                <h2 class="breadcrumb-heading">{{ $chitiettour->tour }}</h2>
                                <ul>
                                    <li>
                                        <a href="/">Trang chủ<i class="pe-7s-angle-right"></i></a>
                                    </li>
                                    <li>Chi tiết tour</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 order-2 pt-10 pt-lg-0">
                            <div class="sidebar-area">
                                <div class="widgets-area mb-9">
                                    <h2 class="widgets-title mb-5">Giá người lớn: {{ currency_format($chitiettour->gia_nguoi_lon) }}</h2>
                                    <h2 class="widgets-title mb-5">Giá trẻ em: {{currency_format($chitiettour->gia_tre_em) }}</h2>
                                    <div class="widgets-item">
                                        <ul class="widgets-category">
                                            <li>
                                                <span>Thời gian: <span>
                                                <span>{{ $chitiettour->so_ngay  }} ngày {{ $chitiettour->so_dem  }}  đêm</span>
                                            </li>
                                            <li>
                                               <span>Phương Tiện: <span>
                                                <span>{{ $chitiettour->phuong_tien  }} </span>
                                            </li>
                                            <li>
                                                 <span>Số lượng còn: <span>
                                                <span>{{ $chitiettour->so_luong_con  }}</span>
                                            </li>
                                            <li>
                                                 <span>Số lượng đã đặt: <span>
                                                <span>{{ $chitiettour->so_luong_toi_da - $chitiettour->so_luong_con  }}/{{ $chitiettour->so_luong_toi_da  }}</span>
                                            </li>
                                            <li>
                                                <span>Ngày khởi hành: <span>
                                                <span>{{ dinhDangNgayThang($chitiettour->ngay_di)  }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                 <div class="widgets-area mb-9">
                                    <div class="widgets-item">
                                       <a class="btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" href="{{ route('dattour', ['id'=>$chitiettour->id]) }}">Đặt tour</a>
                                    </div>
                                </div>
                                <div class="widgets-area mb-9">
                                    <h2 class="widgets-title mb-5">Các tour liên quan</h2>
                                    <div class="widgets-item">
                                        <div class="swiper-container widgets-list-slider style-2">
                                            <div class="swiper-wrapper">

                                                @foreach ($toptourlienquan as $item)
                                                     <div class="swiper-slide">
                                                    <div class="product-list-item">
                                                        <div class="product-img img-zoom-effect">
                                                            <a href="{{ route('chitiettour', ['id'=>$item->id]) }}">
                                                                <img class="img-full" src="{{ asset(PathImages($item->hinh_anh)) }}" alt="ảnh">
                                                            </a>
                                                        </div>
                                                        <div class="product-content">
                                                            <h5 class="title mb-3">
                                                                <a href="{{ route('chitiettour', ['id'=>$item->id]) }}">{{ $item->tour }}</a>
                                                            </h5>
                                                            <div class="blog-meta text-manatee pb-1">
                                                                <ul>
                                                                    <li class="date">{{ dinhDangNgayThang($chitiettour->ngay_di)  }}</li>
                                                                </ul>
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
                        <div class="col-lg-9 order-1">
                            <div class="blog-detail-item">
                                <div class="blog-img">
                                    <img class="img-full" src="{{ asset(PathImages($chitiettour->hinh_anh)) }}" alt="ảnh">
                                </div>
                                <div class="blog-content text-start pb-0">
                                    <div class="blog-meta text-dim-gray pb-3">
                                        <ul>
                                            <li class="date"><i class="fa fa-calendar-o me-2"></i>Ngày đi {{ dinhDangNgayThang($chitiettour->ngay_di) }} - Ngày về  {{ dinhDangNgayThang($chitiettour->ngay_ve) }}</li>
                                        </ul>
                                    </div>
                                    <div class="diem_den">
                                        <p>Các điểm tham quan: {{ $chitiettour->lich_trinh }}</p>
                                    </div>
                                    {!! $chitiettour->mo_ta_tour !!}
                                    <div class="blog-comment pt-10">
                                        <h4 class="heading mb-7">Lịch trình</h4>
                                        @if (!empty($listChuongtrinhtour[0]))
                                            @foreach ($listChuongtrinhtour as $item)
                                                <div class="blog-comment-item mb-8">
                                                    <div class="blog-comment-content">
                                                        <div class="user-meta">
                                                            <span><strong>Ngày {{ $item->ngay_thu }}</strong></span>
                                                        </div>
                                                        <span class="user-occupation text-primary">{{ $item->tieu_de }}</span>
                                                        {!! $item->mo_ta !!}
                                                        {{-- <p class="user-comment mb-0">Comment example here. Nulla risus lacus, vehicula id mi vitae, auctor accumsan nulla. Sed a dolor sit amrt paremi quam. Lorem In euismod urna ac massa adipiscing interdum.</p>
                                                        <a class="btn btn-link hover-white d-inline-flex d-md-none mt-5" href="javascript:void(0)">
                                                            <i class="fa fa-reply me-2"></i>
                                                            Reply
                                                        </a> --}}
                                                    </div>
                                             </div>
                                            @endforeach
                                        @endif

                                    
                                        {{-- <div class="blog-comment-item">
                                            <div class="blog-comment-img">
                                                <img src="assets/images/avatar/2.jpg" alt="Avatar">
                                            </div>
                                            <div class="blog-comment-content">
                                                <div class="user-meta">
                                                    <span><strong>Aidyn Cody -</strong> Jul 21,2021 at 15 hours ago</span>
                                                    <a class="btn btn-link hover-white d-none d-md-flex" href="javascript:void(0)">
                                                        <i class="fa fa-reply me-2"></i>
                                                        Reply
                                                    </a>
                                                </div>
                                                <span class="user-occupation text-primary">Web Developer</span>
                                                <p class="user-comment mb-0">Comment example here. Nulla risus lacus, vehicula id mi vitae, auctor accumsan nulla. Sed a dolor sit amrt paremi quam. Lorem In euismod urna ac massa adipiscing interdum.</p>
                                                <a class="btn btn-link hover-white d-inline-flex d-md-none mt-5" href="javascript:void(0)">
                                                    <i class="fa fa-reply me-2"></i>
                                                    Reply
                                                </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                   
                                    <div class="tag-wtih-social">
                                        <div class="tag">
                                            <span class="title text-primary">Lưu ý:</span>
                                        </div>
                                    </div> 
                                    <div class="ghi_chu" style="padding-left: 30px;padding-top: 20px;">
                                        {!! $chitiettour->ghi_chu !!}
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
@endsection