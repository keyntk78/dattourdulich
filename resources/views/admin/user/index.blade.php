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
                    <small>User</small>
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
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->id}}</td>
                        <td>{{$item->hoten}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @if ($item->level == 1)
                                {{"Admin"}}
                            @else
                                {{"User"}} 
                            @endif 
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="admin/user/delete/{{$item->id}}">Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$item->id}}">Sửa</a></td>
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