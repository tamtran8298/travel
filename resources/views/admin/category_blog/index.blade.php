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
      <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('get_add_category_blog') }}" class="btn btn-primary">Tạo danh mục Blog</a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên danh mục</th>
              <th>Hành động</th>
            </tr>
          </thead>
          @foreach($categoryBlog as $value)  
          <tr>
            <td>{{$value->id}}</td>
            <td>{{ $value->name }}</td>
            <td><a href="{{ route('edit_category_blog',$value->id) }}" class="btn btn-success btn-sm">
            <i class="fas fa-edit"></i></a>
                <a href="{{ route('category_blog_delete',$value->id) }}" id="delete" class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>

</div>
@endsection
@section('script')
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

{{--   <script>
    $(document).ready(function(){      
       $(document).on('click','#delete',function(e){
          e.preventDefault();
          var id = $(this).attr('data-id');
          if(confirm("Are you sure delete this data?")){
          $.ajax({
            url:'{{ route('category_blog_delete') }}',
            method:'post',
            // data:{_token:'{{csrf_token()}}',id:id},
            success:function(data){
              if(data.success){
                toastr.success(data,'Success !!');
                location.reload();
              }
            },
            error:function(){
            toastr.error('Error delete','Error !!');
            },
          });
          } 
        });


    });
  </script> --}}
@stop