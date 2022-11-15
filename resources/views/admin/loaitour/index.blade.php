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
                    <small>Loại tour</small>
                </h1>
            </div>
             @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên loại tour</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loaitour as $key => $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$key+1}}</td>
                        <td>{{$item->ten_loai_tour}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a 
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')" 
                            href="{{ route('loaitour.delete', ['id'=>$item->id]) }}">Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a 
                            href="{{ route('loaitour.edit', ['id'=>$item->id]) }}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

