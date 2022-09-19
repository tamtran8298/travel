@extends('admin.layouts.app')
@section('title','Blog List')
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
        <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('get_add_blog') }}" class="btn btn-primary">New Blog</a></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID </th>
                <th>Hình</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Topic</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>

{{-- <div id="editModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Edit Blog</h6>
                 </div>
                 <div class="card-body">
                    <form role="form" id="editFormvalue" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12" style="text-align: center;">
                              <h2>Sửa Blog</h2>
                          </div>
                          <div class="col-lg-12">
                              <div class="col-lg-2">
                                  <label class="col-lg-12 col-form-label form-control-label" style="padding-left: 0;">Title</label>
                              </div>
                              <div class="col-lg-12">
                                  <input required="" class="form-control @error('title') is-invalid @enderror" type="text" name="title"/>
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <label class="col-lg-12 col-form-label form-control-label">Body</label>
                              <div class="col-lg-12">                     
                                <textarea id="summernote" name="body" class="form-control" rows="30" cols="50" placeholder="Destination Blog"></textarea>
                            </div>
                            <br>
                        </div>
                        <div class="col-lg-12">
                          <div class="col-lg-2">
                              <label class="col-lg-12 col-form-label form-control-label" style="padding-left: 0;">Topic</label>
                          </div>
                          <div class="col-lg-12" style="padding-bottom: 20px;">
                              <select class="form-control" name="topic" id="selecbox">
                               @foreach ($category_blog as $element)
                               <option 
                               value="{{$element->id_blog_category}}">{{$element->name}}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>




                   <div class="col-lg-12  text-xs-center" style="text-align: center;">
                       <img style="" src="{{(!isset($tour->image)) ? '//placehold.it/150/' : asset("upload/images").'/'.$tour->image}}" class="m-x-auto img-fluid " alt="avatar" />
                       <h6 class="m-t-2">Upload a different photo</h6>
                       <div class="col-lg-12" style="text-align: center; padding: 0 350px 0 350px;">
                           <label class="custom-file col-lg-12"  >
                               <span id="choose_file" class="form-control" >Chọn hình</span>
                               <input accept="image/*" type="file" id="file" name="image" class="custom-file-input">
                           </label>
                       </div>
                   </div>
               </div>


               <div class="col-lg-12  personal-info">

                   <div class="form-group row" style="text-align: center;">

                       <div class="col-lg-9" style="padding-left: 180px">  
                           <label class="col-lg-2 col-form-label form-control-label"></label>                   
                           <a href="{{ route('blog') }}" class="btn btn-secondary">Hủy</a>
                           <input type="submit" class="btn btn-primary" value="Cập Nhập Blog" />
                       </div>
                   </div>
               </div>
           </form>
       </div>
   </div>
</div>
</div>
</div>
</div>
--}}
<div id="showdemo"></div>

<div id="editModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tour</h6>
          </div>
          <div class="card-body">
            <form role="form" id="editForm" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="personal-info" >


                  <div class="row">
                    <div class="col-lg-12">
                      <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label form-control-label" style="padding-left: 0;">Title</label>
                      </div>
                      <div class="col-lg-12">
                        <input required="" class="form-control @error('title') is-invalid @enderror" type="text" name="title"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label form-control-label" style="padding-left: 0;">Description</label>
                      </div>
                      <div class="col-lg-12">
                        <input required="" class="form-control @error('title') is-invalid @enderror" type="text" name="description"/>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">

                      <label class="col-lg-12 col-form-label form-control-label">Body</label>
                      <div class="col-lg-12">                     
                        <textarea id="summernote" name="body" class="form-control" rows="30" cols="50" placeholder="Destination Blog"></textarea>
                      </div>
                      <br>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label form-control-label" style="padding-left: 0;">Topic</label>
                      </div>
                      <div class="col-lg-12" style="padding-bottom: 20px;">
                        <select class="form-control" name="topic" id="selecbox">
                         @foreach ($category_blog as $element)
                         <option 
                         value="{{$element->id_blog_category}}">{{$element->name}}</option>
                         @endforeach
                       </select>
                     </div>
                   </div>
                 </div>


               </div>

               <div class="col-lg-12  text-xs-center" style="text-align: center;">
                 <img style="" src="{{(!isset($tour->image)) ? '//placehold.it/150/' : asset("upload/images").'/'.$tour->image}}" class="m-x-auto img-fluid " alt="avatar" />
                 <h6 class="m-t-2">Upload a different photo</h6>
                 <div class="col-lg-12" style="text-align: center; padding: 0 350px 0 350px;">
                   <label class="custom-file col-lg-12"  >
                     <span id="choose_file" class="form-control" >Chọn hình</span>
                     <input accept="image/*" type="file" id="file" name="image" class="custom-file-input">
                   </label>
                 </div>
               </div>

               <div class="row">
                <div class="col-lg-12  personal-info">

                  <label class="col-lg-2 col-form-label form-control-label"></label>
                  <div class="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    <input type="submit" class="btn btn-primary" value="Lưu Tour" />
                    <input type="hidden" value="" name="id">
                  </div>

                </div>
              </div>


            </div>
          </form>
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
<script>
  $(document).ready(function() {

    table = $("#dataTable").DataTable({
        // dom: 'lifrtp',
        // processing:true,
        serverSide: true,
        ajax: {
          url: "{{ route('datatables_blog') }}",
        },
        columns: [
        { data: 'id', name: 'id' },
        { data: 'img', name: 'img' },
        { data: 'title', name: 'title' },
        { data: 'body', name: 'body' },
        { data: 'category_blog', name: 'category_blog' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action', orderable: false, searcheble: false },
        ],
        "fnDrawCallback": function() {
          $('.checkbox_type').bootstrapToggle();
        }
      });



    $(document).on('click', '.blog_description', function(e) {
      e.preventDefault();
      var id = $(this).attr('data-id');
      $.ajax({
        url: "{{ route('description_blog') }}",
        method: 'get',
        dataType: "json",
        data: { id: id },
        success: function(data) {
          if (data.success) {
            var html ="";
            html +=`<div id="ShowModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="container-fluid">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">Nội dung blog</h6>
            </div>
            <div class="card-body">

            <div class="row">




            <div class="col-lg-12">
            <label class="col-lg-12 col-form-label form-control-label">Descripton:</label>
            <div class="col-lg-12">                     
            `+data.blog.description+`
            </div>
            <br>
            </div>
            <div class="col-lg-12">
            <label class="col-lg-12 col-form-label form-control-label">Body:</label>
            <div class="col-lg-12">                     
            `+data.blog.body+`
            </div>
            <br>
            </div>




            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>`;

          }
          document.getElementById('showdemo').innerHTML=html;
          $("#ShowModal").modal("show");



        },
        error: function() {
          toastr.error('Failed to edit tour', 'Error !!');
        },
      });
    });

    $(document).on('click', '.delete', function(e) {
      e.preventDefault();
      var id = $(this).attr('data-id');
      if (confirm("Are you sure delete this data?")) {
        $.ajax({
          url: "{{ route('blog_delete') }}",
          method: 'post',
          data: { _token: '{{csrf_token()}}', id: id },
          success: function(data) {
            if (data) {
              toastr.success(data, 'Success !!');
              table.draw();
            }
          },
          error: function() {
            toastr.error('Error delete', 'Error !!');
          },
        });
      } else return false;
    });
    $(document).on('click', '.blog_off', function(e) {
      e.preventDefault();
      var id = $(this).attr('data-id');
      if (confirm("Are you sure off this data?")) {
        $.ajax({
          url: "{{ route('off_blog') }}",
          method: 'post',
          data: { _token: '{{csrf_token()}}', id: id },
          success: function(data) {
            if (data) {
              toastr.success(data, 'Success !!');
              table.draw();
            }
          },
          error: function() {
            toastr.error('Error off', 'Error !!');
          },
        });
      } else return false;
    });
    $(document).on('click', '.blog_on', function(e) {
      e.preventDefault();
      var id = $(this).attr('data-id');
      if (confirm("Are you sure on this data?")) {
        $.ajax({
          url: "{{ route('on_blog') }}",
          method: 'post',
          data: { _token: '{{csrf_token()}}', id: id },
          success: function(data) {
            if (data) {
              toastr.success(data, 'Success !!');
              table.draw();
            }
          },
          error: function() {
            toastr.error('Error on', 'Error !!');
          },
        });
      } else return false;
    });
    $(document).on('click', '.edit', function(e) {
      e.preventDefault();
      var id = $(this).attr('data-id');
      $.ajax({
        url: "{{ route('edit_blog') }}",
        method: 'get',
        dataType: "json",
        data: { id: id },
        success: function(data) {
          if (data.success) {
            var path = "{{ asset('') }}";
            $("input[name='title']").val(data.blog.title);
            $("img[alt='avatar']").attr('src', path + data.blog.img);
            var markupStr = data.blog.body;
            $('#summernote').summernote('code', markupStr);
            $("input[name='id']").val(data.blog.id);
            $("#selecbox").val(data.blog.topic).find("option[value='" + data.blog.topic + "']").attr('selected', true);
            $("#editModal").modal("show");
          }
        },
        error: function() {
          toastr.error('Failed to edit tour', 'Error !!');
        },
      });
    });

    $("#editForm").on("submit", function(e) {
      e.preventDefault();
      var form = $('#editForm')[0];
      var form_data = new FormData(form);
      $.ajax({
        url: "{{ route('post_edit_blog') }}",
        method: "post",
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          if (data.success) {
            $("#editModal").modal("hide");
            toastr.success("Edit Blog Success!");
            table.draw();
          }
        },
        error: function() {
          toastr.error("Failed to edit blog!");
        }
      });
    });






  });

</script>
<script src="{{ asset('admin/js/upload_avatar.js') }}"></script>
<script src="{{ asset('admin/vendor/summernote/summernote-lite.js') }}"></script>
<script>
  function Sumnernote() {
    $('#summernote').summernote();
    $('.note-icon-trash').trigger('click');
  }

</script>
@stop
