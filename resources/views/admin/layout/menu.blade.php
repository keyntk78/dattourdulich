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
                                    {{--  --}}
                                    <a href="{{ route('loaitour.index') }}">Danh sách</a>
                                </li>
                                <li>
                                    {{-- --}}
                                    <a href="{{ route('loaitour.add') }} ">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                          <li>
                            <a href=""><i class="fa fa-calendar fa-fw"></i> Chương trình tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('chuongtrinhtour.index') }}">Danh sách</a>
                                </li>
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('chuongtrinhtour.add') }}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href=""><i class="fa fa-book fa-fw"></i> Chi tiết tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('chitiettour.index') }}">Danh sách</a>
                                </li>
                                <li>
                                    {{-- --}}
                                    <a href="{{ route('chitiettour.add') }} ">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href=""><i class="fa fa-plane fa-fw"></i> Tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('tour.index') }}">Danh sách</a>
                                </li>
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('tour.add') }}">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-map-marker fa-fw"></i> Địa Điểm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('diadiem.index') }}">Danh sách</a>
                                </li>
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('diadiem.add') }}">Thêm</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-globe fa-fw"></i> Tỉnh<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{-- --}}
                                    <a href="{{ route('tinh.index') }} ">Danh sách</a>
                                </li>
                                <li>
                                    {{--  --}}
                                    <a href="{{ route('tinh.add') }}">Thêm</a>
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
