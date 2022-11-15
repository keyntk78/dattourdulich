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
                <h1 class="page-header">Chương trình tour
                    <small>Sửa</small>
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
                <form action="{{ route('chuongtrinhtour.post-edit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="tieu_de" placeholder="Nhập tên đề ..." 
                                value="{{old('tieu_de') ?? $chuongtrinhtourDetails->tieu_de}}" />
                                @error('tieu_de')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 form-group">
                            <label>Tour</label>
                            <select name="id_tour" class="form-control">
                                <option value="0">--Chọn tour--</option>
                                @if (!empty(getAllTour()))
                                    @foreach (getAllTour() as $item)
                                        <option value="{{ $item->id }}"{{ old('id_tour')  == $item->id || $chuongtrinhtourDetails->id_tour == $item->id ? 'selected' : false }}>{{ $item->ten_tour }}</option>
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
                            <label>Ngày thứ</label>
                            <input class="form-control" name="ngay_thu" placeholder="Nhập ngày thứ ..." 
                                value="{{old('ngay_thu')??$chuongtrinhtourDetails->ngay_thu}}" />
                                @error('ngay_thu')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label>Mô tả</label>
                            <textarea name="mo_ta" id="editor1" rows="10" cols="80">
                                {{old('mo_ta')??$chuongtrinhtourDetails->mo_ta}}
                            </textarea>
                            @error('mo_ta')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-4 form-group">
                             <button type="submit" class="btn btn-success">Thêm</button>
                            <a  href="{{ route('chuongtrinhtour.index') }}" class="btn btn-primary">Quay lại</a>
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



