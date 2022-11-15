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
                <h1 class="page-header">Địa Điểm
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
                        <form action="{{ route('diadiem.post-edit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Điểm đến</label>
                                <input class="form-control" name="diem_den" placeholder="Nhập điểm đến ..." 
                                value="{{old('diem_den') ?? $diadiemDetails->diem_den}}" />
                                @error('diem_den')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label>Tỉnh thành</label>
                                <Select class="form-control form-select form-select-sm" name="id_tinh" style="width: 50%;">
                                     <option value="">--chọn tỉnh--</option>
                                     @if (!empty(getAllTinh()))
                                        @foreach (getAllTinh() as $item)
                                            <option value="{{ $item->id_tinh }}"
                                              {{ old('id_tinh')  == $item->id_tinh || $diadiemDetails->id_tinh == $item->id_tinh ? 'selected' : false }}    
                                            >{{ $item->tentinh }}</option>
                                        @endforeach
                                     @endif
                                    
                                </Select>
                                @error('id_tinh')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="mo_ta" id="exampleFormControlTextarea3" placeholder="Nhập mô tả" rows="7">{{ $diadiemDetails->mo_ta }}</textarea>
                                @error('mo_ta')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            <button type="submit" class="btn btn-success">Sửa</button>
                            <a href="{{ route('diadiem.index') }}" class="btn btn-primary">Quay lại</a>
                        </form>
            </div>
        </div> 
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection



