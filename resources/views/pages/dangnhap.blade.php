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
        <div class="login-register-area section-space-y-axis-100">
          <div class="container">
            <div class="row flex-login">
              <div class="col-lg-6">
                <form action="{{ route('post-dangnhap') }}" method="POST">
                  <div class="login-form">
                    <h4 class="login-title">Đăng nhập</h4>
                     @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Nhập email ..." />
                         @error('email')
                                    <span style="color: red">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-lg-12">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Nhập mật khẩu ..." />
                         @error('password')
                                    <span style="color: red">{{ $message }}</span>
                          @enderror
                      </div>
                       <div class="col-lg-12 pt-5">
                        <button
                          type="submit"
                          class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0"
                        >Đăng Nhập</button>
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