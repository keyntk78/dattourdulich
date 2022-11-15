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
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-details">
                                 <form action="{{ route('post-doimatkhau') }}" method="POST" class="myaccount-form">
                                    @csrf
                                    <div class="myaccount-form-inner">
                                        <div class="single-input ">
                                            <label>Mật khẩu hiện tại</label>
                                            <input type="password" name="mk_cu">
                                            @error('mk_cu')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="single-input ">
                                            <label>Mật khẩu mới</label>
                                            <input type="password" name="mk_moi">
                                            @error('mk_moi')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                           <div class="single-input ">
                                            <label>Nhập lại mật khẩu</label>
                                            <input type="password" name="mk_nhaplai">
                                            @error('mk_nhaplai')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="single-input">
                                            <button type="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0" type="submit">
                                                <span>Đổi mật khẩu</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection