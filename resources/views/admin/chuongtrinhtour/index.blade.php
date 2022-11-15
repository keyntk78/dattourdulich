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
                    <small>Chương trình tour</small>
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
                        <th scope="col">STT</th>
                        <th scope="col">Tên tour</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Ngày thứ</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chuongtrinhtour as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->tour }}</td>
                                <td>{{ $item->tieu_de }}</td>
                                <td>{{ $item->ngay_thu }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                    href="{{ route('chuongtrinhtour.delete' , ['id'=>$item->id]) }}">Xóa</a>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="{{ route('chuongtrinhtour.edit', ['id'=>$item->id]) }}">Sửa</a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12"> 
                <div class="pagination">
                    {{ $chuongtrinhtour->withQueryString()->links() }}
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection