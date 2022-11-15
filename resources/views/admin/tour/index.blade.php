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
                <h1 class="page-header">Danh sách
                    <small>Tour</small>
                </h1>
            </div>
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            <div class="col-lg-12">
                <form action="" method="get" class="mb-3" >
                    <div class="row">
                        <div class="col-lg-2">
                            <select name="id_tinh" class="form-control">
                                <option value="0">Chọn tỉnh</option>
                                @if (!empty(getAllTinh()))
                                    @foreach (getAllTinh() as $item)
                                        <option value="{{ $item->id_tinh }}" {{ request()->id_tinh  == $item->id_tinh ? 'selected' : false }}>{{ $item->tentinh }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <select name="id_loaitour" class="form-control">
                                <option value="0">Loại tour</option>
                                @if (!empty(getAllLoaiTour()))
                                    @foreach (getAllLoaiTour() as $item)
                                        <option value="{{ $item->id }}" {{ request()->id_loaitour  == $item->id ? 'selected' : false }}>{{ $item->ten_loai_tour }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                         <div class="col-lg-3">
                            <select name="id_diadiem" class="form-control" >
                                <option value="0">Địa điểm</option>
                                 @if (!empty(getAllDiaDiem()))
                                    @foreach (getAllDiaDiem() as $item)
                                        <option value="{{ $item->id }}" {{ request()->id_diadiem  == $item->id ? 'selected' : false }}>{{ $item->diem_den }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="search" name="keywords" class="form-control" placeholder="Từ khóa tìm kiếm..." value="{{ request()->keywords }}">
                        </div>
                          <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên tour</th>
                        <th scope="col">Tên tỉnh</th>
                        <th scope="col">Địa điểm</th>
                        <th scope="col">Loại tour</th>
                        <th scope="col">Giá trẻ em</th>
                        <th scope="col">Giá người lớn</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tours as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->ten_tour }}</td>
                                <td>{{ $item->tinh }}</td>
                                <td>{{ $item->diadiem }}</td>
                                <td>{{ $item->loaitour }}</td>
                                <td>{{ $item->gia_tre_em }}</td>
                                <td>{{ $item->gia_nguoi_lon }}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                    href="{{ route('tour.delete' , ['id'=>$item->id]) }}">Xóa</a>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="{{ route('tour.edit', ['id'=>$item->id]) }}">Sửa</a>
                                </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12"> 
                <div class="pagination">
                    {{ $tours->withQueryString()->links() }}
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection