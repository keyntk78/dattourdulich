  <header class="main-header_area position-relative">
            <div class="header-middle py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-middle-wrap">
                                <a href="/" class="header-logo name_logo">
                                    <img src="{{ asset('assets/images/favicon.ico') }}" class="img-logo-qtk" alt="">
                                    QTK
                                    {{-- <img src="assets/images/logo/dark.png" alt="Header Logo"> --}}
                                </a>
                                <div class="header-search-area d-none d-lg-block">
                                    <form action="{{ route('timkiem') }}" method="GET" class="header-searchbox">
                                        <input class="input-field" type="text" name="tim_kiem" placeholder="Tìm kiếm">
                                        <button class="btn btn-outline-whisper btn-primary-hover" type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-right">
                                    <ul>
                                        <li class="dropdown d-none d-md-block">
                                            <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="pe-7s-users"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButton">
                                                @if (Auth::check())
                                                    <li><a class="dropdown-item" href="">{{ Auth::user()->hoten}}</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('nguoidung') }}">Thông tin</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng xuất</a></li>
                                                @else
                                                    <li><a class="dropdown-item" href="{{ route('dangnhap') }}">Đăng Nhập</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('dangky') }}">Đăng Ký</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header header-sticky" data-bg-color="#bac34e">
                <div class="container">
                    <div class="main-header_nav position-relative">
                        <div class="row align-items-center">
                            <div class="col-lg-12 d-none d-lg-block">
                                <div class="main-menu">
                                    <nav class="main-nav">
                                        <ul>
                                            <li class="drop-holder">
                                                <a href="/">Trang chủ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">Giới thiệu</a>
                                            </li>
                                            <li class="drop-holder">
                                                <a href="javascript:void(0)">Loại tour
                                                    <i class="fa fa-chevron-down"></i>
                                                </a>
                                                <ul class="drop-menu">
                                                    @foreach (getAllLoaiTour() as $item)
                                                        <li>
                                                            <a 
                                                            href="{{ route('loaitour', ['id'=>$item->id]) }}">{{ $item->ten_loai_tour }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li class="drop-holder">
                                                <a href="#">Địa điểm
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">Liên hệ</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           @include('layouts.header_mobile')
        </header>