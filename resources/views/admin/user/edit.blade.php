@extends('admin.layout.index')

 @section('title')
     {{ $title }}
 @endsection


 @section('content')
    <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa
                    <small>tài khoản {{$user->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            {{-- Handle Show Message Success --}}
           @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
                @endif

                {{-- Hiện thông báo thành công --}}
                @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif

            {{-- Form Input Create new user --}}
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/user/edit/{{$user->id}}" method="POST">
                    {{-- Token --}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    
                    {{-- Họ Tên --}}
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="hoten" placeholder="Nhập tên người dùng" value="{{$user->hoten}}"/>
                        @if ($errors->has('hoten'))
                            <div class="alert alert-danger">{{ $errors->first('hoten') }}</div>
                        @endif
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label>Địa chỉ email</label>
                        <input class="form-control" name="email" placeholder="Nhập địa chỉ email" value="{{$user->email}}" readonly="" />
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    {{-- Địa chỉ --}}
                     <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input class="form-control" name="diachi" placeholder="Nhập địa chỉ" value="{{$user->diachi}}"/>
                        @if ($errors->has('diachi'))
                            <div class="alert alert-danger">{{ $errors->first('diachi') }}</div>
                        @endif
                    </div>

                    {{-- CMND --}}
                     <div class="form-group">
                        <label>CMND/CCCD</label>
                        <input class="form-control" name="cmnd" placeholder="Nhập CMND/CCCD" value="{{$user->cmnd}}"/>
                        @if ($errors->has('cmnd'))
                            <div class="alert alert-danger">{{ $errors->first('cmnd') }}</div>
                        @endif
                    </div>

                    {{-- Số điện thoại --}}
                     <div class="form-group">
                        <label>Điện Thoại</label>
                        <input class="form-control" name="dienthoai" placeholder="Nhập số điện thoại" value="{{$user->dienthoai}}"/>
                        @if ($errors->has('dienthoai'))
                            <div class="alert alert-danger">{{ $errors->first('dienthoai') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Giới tính</label><br>
                        <label class="radio-inline">
                            <input name="gender" value="0" 
                                @if($user->gender == 0)
                                {{"checked"}}
                                @endif
                             type="radio"> Nam
                        </label>
                        <label class="radio-inline">
                            <input name="gender" value="1" 
                            @if($user->gender == 1)
                                {{"checked"}}
                                @endif
                             type="radio"> Nữ
                        </label>
                    </div>

                    {{-- Password and Re-password --}}
                    <div class="form-group">
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <label>Đổi mật khẩu</label>
                        <input class="form-control password" type="password" name="password" placeholder="Nhập password" 
                            disabled="" 
                        />
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input class="form-control password" type="password" name="password_confirmation" placeholder="Nhập lại password" disabled=""/>
                        @if ($errors->has('password_confirmation'))
                            <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    {{-- User role --}}
                    <div class="form-group">
                        <label>Quyền người dùng</label><br>
                        <label class="radio-inline">
                            <input name="level" value="0" 
                                @if($user->level == 0)
                                {{"checked"}}
                                @endif
                             type="radio"> Người dùng
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1" 
                            @if($user->level == 1)
                                {{"checked"}}
                                @endif
                             type="radio"> Admin
                        </label>
                    </div>

                    {{-- Submit --}}
                   <button type="submit" class="btn btn-success">Sửa</button>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Quay lại</a>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper --> 
 @endsection

 @section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            });
        });

    </script>
@endsection
