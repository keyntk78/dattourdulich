 <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="harmic-offcanvas-body">
                    <div class="inner-body">
                        <div class="harmic-offcanvas-top">
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <div class="offcanvas-user-info text-center px-6 pb-5">
                            <ul class="dropdown-wrap justify-content-center text-silver">
                                <li class="dropdown dropup">
                                    <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="pe-7s-users"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">
                                        @if (Auth::check())
                                                    <li><a class="dropdown-item" href="{{ route('nguoidung') }}">Thông tin</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng xuất</a></li>
                                                @else
                                                    <li><a class="dropdown-item" href="{{ route('dangnhap') }}">Đăng Nhập</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('dangky') }}">Đăng Ký</a></li>
                                                @endif
                                    </ul>
                                </li>
                                <li>
                                    @if (Auth::check())
                                        {{ Auth::user()->hoten}}
                                    @else  
                                        Tài Khoản
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas-menu_area">
                            <nav class="offcanvas-navigation">
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children">
                                        <a href="/">
                                            <span class="mm-text">Trang chủ 
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="mm-text">Giới thiệu</span>
                                        </a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Loại tour 
                                            <i class="pe-7s-angle-down"></i>
                                        </span>
                                        </a>
                                        <ul class="sub-menu">
                                            @foreach (getAllLoaiTour() as $item)
                                                        <li>
                                                            <a 
                                                            href="{{ route('loaitour', ['id'=>$item->id]) }}">{{ $item->ten_loai_tour }}</a>
                                                        </li>
                                                    @endforeach
                                        </ul>
                                    </li>
                                   
                                    <li>
                                        <a href="#">
                                            <span class="mm-text">Địa điểm</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <span class="mm-text">Liên hệ</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-search_wrapper" id="searchBar">
                <div class="harmic-offcanvas-body">
                    <div class="container h-100">
                        <div class="offcanvas-search">
                            <div class="harmic-offcanvas-top">
                                <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                            </div>
                            <span class="searchbox-info">Tìm kiếm tour du lịch</span>
                            <form action="#" class="hm-searchbox">
                                <input type="text" placeholder="Tìm kiếm">
                                <button class="search-btn" type="submit"><i class="pe-7s-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>