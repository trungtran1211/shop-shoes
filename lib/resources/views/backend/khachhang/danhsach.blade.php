@extends('backend.master')
@section('title','danh sách khách hàng');
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"> Khách hàng</h3>
        </div>
    </div><!--/.row-->
                
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách khách hàng</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="odd gradeX" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-2">Tên</th>
                <th class="col-lg-1">SĐT</th>
                <th class="col-lg-2">Email</th>
                <th class="col-lg-5">Địa chỉ</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data1 as $item) 
            <tr class="odd gradeX">
                <td>{{$i++}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->address}}</td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{{url('xoa/'.$item->id) }}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                <td class="center"><a href="{{asset('admin/product/lichsu')}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Xem lịch sử mua hàng"><i class="fa fa-history"></i></a>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>
</div>
@stop