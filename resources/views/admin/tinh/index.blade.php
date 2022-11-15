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
                    <small>Tỉnh</small>
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
                        <th>Tên tỉnh</th>
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
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

