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
                <h1 class="page-header">Tỉnh
                    <small>Thêm</small>
                </h1>
            </div>
             @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
            @endif
            <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                        @if ($errors->any())
                          <div class="alert alert-danger">
                                Vui lòng kiểm tra lại dữ liệu
                          </div>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên tỉnh</label>
                                <input class="form-control" name="tentinh" placeholder="Nhập tên tỉnh ..." 
                                value="{{old('tentinh')}}" />
                                @error('tentinh')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <a href="{{ route('tinh.index') }}" class="btn btn-primary">Quay lại</a>
                        </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection



