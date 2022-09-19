@extends('admin.layouts.app')
@section('title','User List')
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
      <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('email-template') }}" class="btn btn-primary">New Email Template</a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Template Title</th>
              <th>Email Content Template</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
          </thead>  
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
        // processing:true,
        serverSide:true,
        ajax:{
          url:"{{ route('post-list-email-template') }}",
        },
        columns:[
          {data:'id',name:'id'},
          {data:'email_title',name:'email_title'},
          {data:'email_content_template',name:'sms_content_template'},
          {data:'created_at',name:'created_at'},
          {data:'action',name:'action',orderable: false, searcheble: false},        
        ]
      });       

      $(document).on('click','.delete',function(e){
          e.preventDefault();
          var id = $(this).attr('data-id');
          if(confirm("Are you sure delete this data?")){
          $.ajax({
            url:"{{ route('delete-email-template') }}",
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