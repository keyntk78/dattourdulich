@extends('layouts.index')
 @section('title')
     {{ $title }}
 @endsection
 
@section('content')
    <!-- Begin Main Content Area -->
      <main class="main-content">

        <div class="login-register-area section-space-y-axis-100">
          <div class="container">
            <div class="row flex-login">
              <div class="col-lg-8">
                 <form action="{{ route('post-dangky') }}" method="POST">
                  <div class="login-form">
                    <h4 class="login-title">Đăng ký</h4>
                       @csrf
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <label>Họ tên</label>
                        <input type="text" name="ho_ten" value="{{ old('ho_ten') }}"  placeholder="Nhập họ tên ..." />
                         @error('ho_ten')
                                    <span style="color: red">{{ $message }}</span>
                          @enderror                      
                      </div>
                      <div class="col-md-6 col-12">
                        <label>Số điện thoại</label>
                        <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}" placeholder="Nhập số điện thoại" />
                        @error('so_dien_thoai')
                                    <span style="color: red">{{ $message }}</span>
                          @enderror 
                      </div>
                      <div class="col-md-12">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" />
                         @error('email')
                                    <span style="color: red">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-md-6">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu ..." />
                           @error('password')
                                    <span style="color: red">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-md-6">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" name="c_password" placeholder="Nhập mật khẩu ..." />
                          @error('c_password')
                                    <span style="color: red">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-12">
                        <button type="submit"class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0">Đăng ký
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- Main Content Area End Here -->
@endsection