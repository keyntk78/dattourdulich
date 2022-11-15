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
                <h1 class="page-header">Chi tiết tour
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
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 form-group">
                            <label>Tour</label>
                            <select name="id_tour" class="form-control">
                                <option value="0">--Chọn tour--</option>
                                @if (!empty(getAllTour()))
                                    @foreach (getAllTour() as $item)
                                        <option value="{{ $item->id }}" {{ old('id_tour')  == $item->id ? 'selected' : false }}>{{ $item->ten_tour }}</option>
                                    @endforeach
                                @endif
                            </select>
                              @error('id_tour')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <label>Ngày đi</label>
                            <input type="date" class="form-control" name="ngay_di" 
                                value="{{old('ngay_di')}}" />
                                @error('ngay_di')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                         <div class="col-lg-4 form-group">
                            <label>Ngày về</label>
                            <input class="form-control" name="ngay_ve" type="date"
                                value="{{old('ngay_ve')}}" />
                                @error('ngay_ve')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-lg-4 form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="hinh_anh" 
                                value="{{old('hinh_anh')}}" />
                                @error('hinh_anh')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>        
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label>Ghi chú</label>
                            <textarea name="ghi_chu" id="editor1" rows="10" cols="80">
                                {{old('ghi_chu')}}
                            </textarea>
                            @error('ghi_chu')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 form-group">
                             <button type="submit" class="btn btn-success">Thêm</button>
                            <a  href="" class="btn btn-primary">Quay lại</a>
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



