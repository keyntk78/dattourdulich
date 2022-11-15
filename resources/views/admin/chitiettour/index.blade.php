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
                    <small>Chi tiết tour</small>
                </h1>
            </div>
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif

             {{-- <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                       <th scope="col">STT</th>
                        <th scope="col">Tên tour</th>
                        <th scope="col">Ngày đi</th>
                        <th scope="col">Ngày về</th>
                        <th scope="col">Số lượng còn</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tinh as $key => $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$key+1}}</td>
                        <td>{{$item->tentinh}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a 
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')" 
                            href="{{ route('tinh.delete', ['id'=>$item->id_tinh])}}">Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a 
                            href="{{ route('tinh.edit', ['id'=>$item->id_tinh])}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}
            <div class="col-lg-12">
                <form action="" method="get" class="mb-3" >
                    <div class="row">
                        <div class="col-lg-2">
                            <select name="id_tour" class="form-control">
                                <option value="0">--Chọn tour--</option>
                                @if (!empty(getAllTour()))
                                    @foreach (getAllTour() as $item)
                                        <option value="{{ $item->id }}" {{ request()->id_tour  == $item->id ? 'selected' : false }}>{{ $item->ten_tour }}</option>
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
                        <th scope="col">ID</th>
                        <th scope="col">Tên tour</th>
                        <th scope="col">Ngày đi</th>
                        <th scope="col">Ngày về</th>
                        <th scope="col">Số lượng còn</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chitiettours as $key => $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->tour }}</td>
                                <td>{{ dinhDangNgayThang($item->ngay_di)}}</td>
                                <td>{{ dinhDangNgayThang($item->ngay_ve) }}</td>
                                <td>{{ $item->so_luong_con }}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                    href="">Xóa</a>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="">Sửa</a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12"> 
                <div class="pagination">
                    {{ $chitiettours->withQueryString()->links() }}
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection