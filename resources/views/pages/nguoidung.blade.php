@extends('layouts.index')
 @section('title')
     {{ $title }}
 @endsection

 
@section('content')
<!-- Begin Main Content Area -->
@if(session('thongbao'))
    <div class="alert alert-success" style="text-align: center;">
        {{session('thongbao')}}
    </div>
@endif
<main class="main-content">
    <div class="account-page-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Thông tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Các tour đã đặt</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{ route('doimatkhau') }}" id="account-logout-tab" href="{{ route('doimatkhau') }}" aria-selected="false">Đổi mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{ route('dangxuat') }}" id="account-logout-tab" href="{{ route('dangxuat') }}" aria-selected="false">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-details">
                                <form action="{{ route('postNguoidung') }}" method="POST" class="myaccount-form">
                                    @csrf
                                    <div class="myaccount-form-inner">
                                        <div class="single-input ">
                                            <label>Họ và tên</label>
                                            <input type="text" name="hoten" value="{{ $user->hoten }}">
                                            @error('hoten')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="single-input">
                                            <label>Email*</label>
                                            <input disabled value="{{ $user->email }}" name="email" type="email">
                                        </div>
                                        <div class="single-input ">
                                            <label>Số điện thoại</label>
                                            <input value="{{ $user->dienthoai }}" name="dienthoai" type="text">
                                            @error('dienthoai')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="single-input">
                                            <label>CMND/CCCD</label>
                                            <input type="text" name="cmnd" value="{{ $user->cmnd }}">
                                              @error('cmnd')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="single-input single-input-half">
                                            <label>Giới tính</label>
                                            <select name="gender">
                                                <option value="0" {{ $user->gender == 0 ? 'selected' : false }}>Nam</option>
                                                <option value="1" {{ $user->gender == 1 ? 'selected' : false }} >Nữ</option>
                                            </select>
                                             @error('gender')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>                                                
                                        <div class="single-input">
                                            <label>Địa chỉ</label>
                                            <input type="text" name="diachi" value="{{ $user->diachi }}">
                                              @error('diachi')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="single-input">
                                            <button type="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0" type="submit">
                                                <span>Lưu</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                            <div class="myaccount-orders">
                                <h4 class="small-title">Tour đã đặt</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên tour</th>
                                                <th>Ngày Đặt</th>
                                                <th>Tổng hóa đơn</th>
                                            </tr>
                                            @foreach ($phieudat as $item)
                                                <tr>
                                                    <td>#{{ $item->id }}</td>
                                                    <td>{{ $item->ten_tour }}</td>
                                                    <td>{{ dinhDangNgayThang($item->ngay_dat) }}</td>
                                                    <td>{{ currency_format($item->gia_tre_em*$item->so_luong_tre_em + $item->gia_nguoi_lon*$item->so_luong_nguoi_lon) }}</td>
                                                    {{-- <td><a href="javascript:void(0)" class="btn btn-secondary btn-primary-hover"><span>View</span></a>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection