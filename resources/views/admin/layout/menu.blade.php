 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav l-inline ov" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li>
                            <a href=""><i class="fa fa-bookmark fa-fw"></i> Loại tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{-- {{ route('loaitour.index') }} --}}
                                    <a href="">Danh sách</a>
                                </li>
                                <li>
                                    {{-- {{ route('loaitour.add') }} --}}
                                    <a href="">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                          <li>
                            <a href=""><i class="fa fa-calendar fa-fw"></i> Chương trình tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{-- {{ route('chuongtrinhtour.index') }} --}}
                                    <a href="">Danh sách</a>
                                </li>
                                <li>
                                    {{-- {{ route('chuongtrinhtour.add') }} --}}
                                    <a href="">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href=""><i class="fa fa-book fa-fw"></i> Chi tiết tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{-- {{ route('chitiettour.index') }} --}}
                                    <a href="">Danh sách</a>
                                </li>
                                <li>
                                    {{-- {{ route('chitiettour.add') }} --}}
                                    <a href="">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href=""><i class="fa fa-plane fa-fw"></i> Tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{-- {{ route('tour.index') }} --}}
                                    <a href="">Danh sách</a>
                                </li>
                                <li>
                                    {{-- {{ route('tour.add') }} --}}
                                    <a href="">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-map-marker fa-fw"></i> Địa Điểm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{-- {{ route('diadiem.index') }} --}}
                                    <a href="">Danh sách</a>
                                </li>
                                <li>
                                    {{-- {{ route('diadiem.add') }} --}}
                                    <a href="">Thêm</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-globe fa-fw"></i> Tỉnh<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{-- {{ route('tinh.index') }} --}}
                                    <a href="">Danh sách</a>
                                </li>
                                <li>
                                    {{-- {{ route('tinh.add') }} --}}
                                    <a href="">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/user/danhsach"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('users.index') }}">Danh sách</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
