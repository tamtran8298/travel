@extends('admin.layouts.app')
@section('title','Category List')
@section('style')
  <link rel="stylesheet" type="text/css" href="vendor/datatables/dataTables.bootstrap4.min.css">
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
      <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('get_add_category') }}" class="btn btn-primary">Tạo danh mục</a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên danh mục</th>
              <th>Ngày tạo</th>
              <th>Hành động</th>
            </tr>
          </thead>  
         {{--  <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>0123456789</td>
              <td>admin@dataeglobal.com</td>
              <td>01/02/1998</td>
              <td>Director</td>
              <td>12/05/2019</td>
              <td>
              	<button type="button" onclick="window.location.href='/user/edit'" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
              	<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
      		  </td>
            </tr>               
          </tbody> --}}
        </table>
      </div>
    </div>
  </div>

</div>
@endsection
@section('script')
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function(){

      table = $("#dataTable").DataTable({
        // dom: 'lifrtp',
        // processing:true,
        serverSide:true,
        ajax:{
          url:"{{ route('datatables_category') }}",
        },
        columns:[
          {data:'id',name:'id'},
          {data:'name',name:'name'},
          {data:'created_at',name:'created_at'},
          {data:'action',name:'action',orderable: false, searcheble: false},        
        ]

      });       


       $(document).on('click','.delete',function(e){
          e.preventDefault();
          var id = $(this).attr('data-id');
          if(confirm("Are you sure delete this data?")){
          $.ajax({
            url:'{{ route('category_delete') }}',
            method:'post',
            data:{_token:'{{csrf_token()}}',id:id},
            success:function(data){
              if(data){
                toastr.success(data,'Success !!');
                table.draw();
              }
            },
            error:function(){
            toastr.error('Error delete','Error !!');
            },
          });
          } else return false;
        });


    });
  </script>
@stop