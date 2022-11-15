@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Đăng Ký</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="hoten" class="col-md-4 col-form-label text-md-right">{{ __('Họ Tên') }}</label>

                            <div class="col-md-6">
                                <input id="hoten" type="text" class="form-control @error('hoten') is-invalid @enderror" name="hoten" value="{{ old('hoten') }}"  autocomplete="name" autofocus>

                                @error('hoten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật Khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="diachi" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ') }}</label>

                            <div class="col-md-6">
                                <input id="hoten" type="text" class="form-control @error('hoten') is-invalid @enderror" name="diachi" value="{{ old('diachi') }}"  autocomplete="diachi" autofocus>

                                @error('diachi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dienthoai" class="col-md-4 col-form-label text-md-right">{{ __('Điện thoại') }}</label>

                            <div class="col-md-6">
                                <input id="hoten" type="text" class="form-control @error('dienthoai') is-invalid @enderror" name="dienthoai" value="{{ old('dienthoai') }}"  autocomplete="dienthoai" autofocus>

                                @error('dienthoai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cmnd" class="col-md-4 col-form-label text-md-right">{{ __('CMND/CCCD') }}</label>

                            <div class="col-md-6">
                                <input id="cmnd" type="text" class="form-control @error('cmnd') is-invalid @enderror" name="cmnd" value="{{ old('cmnd') }}"  autocomplete="cmnd" autofocus>

                                @error('cmnd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Giới tính') }}</label>
                            <label class="col-form-label text-md-left">Nam</label>

                                <div class="col-md-1">
                                    <input id="gender" type="radio" class="form-control" name="gender" value="0" required autocomplete="gender" autofocus checked >
                                </div>

                                <label class="col-form-label">Nữ</label>
                                <div class="col-md-1">
                                    <input id="gender" type="radio" class="form-control" name="gender" value="1" required autocomplete="gender" autofocus>
                                </div>   
                    
                        </div>

                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng Ký') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








