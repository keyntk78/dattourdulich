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
                <h1 class="page-header">Tour
                    <small>Thêm</small>
                </h1>
            </div>
             @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
            @endif
            <div class="col-lg-12" style="padding-bottom:120px">
                 @if ($errors->any())
                          <div class="alert alert-danger">
                                Vui lòng kiểm tra lại dữ liệu
                          </div>
                @endif
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 form-group">
                            <label>Tên tour</label>
                            <input class="form-control" name="ten_tour" placeholder="Nhập tên tour ..." 
                                value="{{old('ten_tour')}}" />
                                @error('ten_tour')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <label>Tỉnh</label>
                            <select name="id_tinh" class="form-control">
                                <option value="0">--Chọn tỉnh--</option>
                                @if (!empty(getAllTinh()))
                                    @foreach (getAllTinh() as $item)
                                        <option value="{{ $item->id_tinh }}" {{ old('id_tinh')  == $item->id_tinh ? 'selected' : false }}>{{ $item->tentinh }}</option>
                                    @endforeach
                                @endif
                            </select>
                              @error('id_tinh')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Địa điểm</label>
                            <select name="id_diadiem" class="form-control">
                                <option value="0">--Chọn địa điểm--</option>
                                 @if (!empty(getAllDiaDiem()))
                                    @foreach (getAllDiaDiem() as $item)
                                        <option value="{{ $item->id }}" {{ old('id_diadiem')  == $item->id ? 'selected' : false }}>{{ $item->diem_den }}</option>
                                    @endforeach
                                @endif
                            </select>
                             @error('id_diadiem')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Loại tour</label>
                            <select name="id_loaitour" class="form-control">
                                <option value="0">--Chọn loại tour--</option>
                                 @if (!empty(getAllLoaiTour()))
                                    @foreach (getAllLoaiTour() as $item)
                                        <option value="{{ $item->id }}" {{ old('id_loaitour')  == $item->id ? 'selected' : false }}>{{ $item->ten_loai_tour }}</option>
                                    @endforeach
                                @endif
                            </select>
                             @error('id_loaitour')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <label>Phương tiện</label>
                            <input class="form-control" name="phuong_tien" placeholder="Nhập phương tiện ..." 
                                value="{{old('phuong_tien')}}" />
                                @error('phuong_tien')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                         <div class="col-lg-4 form-group">
                            <label>Giá người lớn</label>
                            <input class="form-control" name="gia_nguoi_lon" placeholder="Nhập giá vnđ ..." 
                                value="{{old('gia_nguoi_lon')}}" />
                                @error('gia_nguoi_lon')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                         <div class="col-lg-4 form-group">
                            <label>Giái trẻ em</label>
                            <input class="form-control" name="gia_tre_em" placeholder="Nhập giá vnđ ..." 
                                value="{{old('gia_tre_em')}}" />
                                @error('gia_tre_em')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-lg-4 form-group">
                            <label>Số lượng tối đa</label>
                            <input class="form-control" name="so_luong_toi_da" placeholder="Nhập số lượng ..." 
                                value="{{old('so_luong_toi_da')}}" />
                                @error('so_luong_toi_da')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Số ngày</label>
                            <input class="form-control" name="so_ngay" placeholder="Nhập số ngày ..." 
                                value="{{old('so_ngay')}}" />
                                @error('so_ngay')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Số đêm</label>
                            <input class="form-control" name="so_dem" placeholder="Nhập số đêm ..." 
                                value="{{old('so_dem')}}" />
                                @error('so_dem')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 form-group">
                            <label>Lịch trình</label>
                            <textarea name="lich_trinh" class="form-control" rows="10">{{old('lich_trinh')}}</textarea>
                            @error('lich_trinh')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label>Mô tả</label>
                            <textarea name="mo_ta_tour" id="editor1" rows="10" cols="80">
                                {{old('mo_ta_tour')}}
                            </textarea>
                            @error('mo_ta_tour')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-4 form-group">
                             <button type="submit" class="btn btn-success">Thêm</button>
                            <a  href="{{ route('tour.index') }}" class="btn btn-primary">Quay lại</a>
                        </div>
                        
                    </div>

                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor 4
                        // instance, using default configuration.
                        
                        CKEDITOR.replace( 'editor1', {
                            filebrowserBrowseUrl: 'admin_asset/ckfinder/ckfinder.html',
                            filebrowserUploadUrl: 'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                        } );
                    </script>
                </form>
               
            </div>
        </div>
        
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection



