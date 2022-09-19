@extends('admin.layouts.app')
@section('title','tour List')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
<link href="{{ asset('admin/vendor/summernote/summernote-lite.css') }}" rel="stylesheet">
<link rel="stylesheet" href="   ://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    .modal-lg{
      max-width: 80%;
  }
  .w3-btn {
    margin-bottom:5px;
    font-size: 5px;}
</style>




@stop
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">User List</h1>
  </div> -->
  <!-- Content Row -->
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('get_add_tour') }}" class="btn btn-primary">Khách hàng đã đi tour</a>
            <a href="{{ route('get_add_tour') }}" class="btn btn-primary" style="padding-left: 20px;">Khách hàng đã xóa</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>Tên Khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th colspan="2">Chi tiết</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach($customer as $value)
                <thead style="text-align: center;">
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->guests }} người</td>
                        
                        <td ><i id="but" data-toggle="modal" data-target="#myModal" data-id="{{ $value->id_user_listcustomer }}" class="fa fa-info-circle" aria-hidden="true"></i></td>
                        {{-- <button id="but" data-toggle="modal" data-target="#myModal" data-id="{{ $value->id_user_listcustomer }}" class="deltail" >deltail</button></td> --}}
                        {{-- <td ><button id="but" data-toggle="modal" data-target="#myModal" data-id="{{ $value->id_user_listcustomer }}" class="deltail" >deltail</button></td> --}}
                        
                        <td> {{ number_format($value->total)}}</td>
                    
                        <td><a><i class="fa fa-check" aria-hidden="true" style="color: blue"></i></a>
                                <a><i class="fa fa-trash" aria-hidden="true" style="color: red; padding-left: 20px;"></i></a></td>
                    </tr>
                </thead>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
<!-- Large modal -->
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Khách Hàng Đặt Tour</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Độ tuổi</th>
                                    <th>Phòng đơn</th>
                                    <th>Giá</th>

                                </tr>
                            </thead>

                            <thead id="showdetail" style="text-align: center;">

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection
@section('script')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/upload_avatar.js') }}"></script>
<script src="{{ asset('admin/vendor/summernote/summernote-lite.js') }}"></script>

<script>
   $(document).on('click', '#but', function(e) {
    e.preventDefault();
    var data_id = $(this).attr('data-id');
    $.ajax({
        url: "{{ route('getEdittour') }}",
        method: 'get',
        dataType: "json",
        data: { id: data_id },
        success: function(data) {
            if (data.success) {
                {{-- var path = "{{ asset('') }}"; --}}
                var html='';
                for (var i = 0; i < data.length; i++) 
                {
                    html += 
                    `
                    <tr>
                    <td>`+data.data[i].id+`</td>
                    <td>`+ data.data[i].name+`</td>
                    <td>`+ data.data[i].gender+`</td>
                    <td>`+ data.data[i].date_birth+`</td>
                    <td>`+ data.data[i].personkind+`</td>
                    <td>`+ data.data[i].clone_room+`</td>
                    <td>`+ data.data[i].price+`</td>
                    </tr>`;
                }
                document.getElementById("showdetail").innerHTML = html;
                // $('#show123').append(html);
                // toastr.success('success to edit tour', 'Error !!');
            }
        },
        error: function(data) {
            toastr.error('Failed to show deltail customer', 'Error !!');
        },
    });
});
// function Sumnernote() {
//     $('#summernote').summernote();
//     $('.note-icon-trash').trigger('click');
// }

</script>
@stop
