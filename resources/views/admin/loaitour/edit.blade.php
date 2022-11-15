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
                <h1 class="page-header">Loại tour
                    <small>Sửa</small>
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
                        <form action="{{ route('loaitour.post-edit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên loại tour</label>
                                <input class="form-control" name="ten_loai_tour" placeholder="Nhập tên loại tour ..." 
                                value="{{old('tentinh')?? $loaitourDetails->ten_loai_tour}}" />
                                @error('ten_loai_tour')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <a href="{{ route('loaitour.index') }}" class="btn btn-primary">Quay lại</a>
                        </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection



