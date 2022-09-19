@extends('admin.layouts.app')
@section('title','Slides List')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
{{-- <link href="{{ asset('admin/vendor/summernote/summernote-lite.css') }}" rel="stylesheet"> --}}
<style>
    .modal-lg{
      max-width: 80%;
    }
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
            <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('slide.add') }}" class="btn btn-primary">Tạo Silde</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Hình</th>
                            <th>Url</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
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
<!-- Large modal -->
<div id="editModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Slide</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" id='form' method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 push-lg-4 personal-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Tiêu Đề</label>
                                                <div class="col-lg-10">
                                                    <input required="" class="form-control " type="text" name="title" placeholder="Tiêu đề" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">URL</label>
                                                <div class="col-lg-10">
                                                    <input required="" class="form-control " type="text" name="link" placeholder="URL" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Mô tả</label>
                                                <div class="col-lg-10">
                                                    <textarea id="summernote" name="description" class="form-control" rows="4" cols="50"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                            <input type="submit" class="btn btn-primary" value="Lưu Slide" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 pull-lg-8 text-xs-center">
                                    <img style="" src="" class="m-x-auto img-fluid " alt="avatar" />
                                    <h6 class="m-t-2">Upload a different photo</h6>
                                    <label class="custom-file col-md-8">
                                        <span id="choose_file" class="form-control">Chọn hình</span>
                                        <input accept="image/*" type="file" id="file" name="image" class="custom-file-input">
                                    </label>
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
    var id = null;

    table = $("#dataTable").DataTable({
        // dom: 'lifrtp',
        // processing:true,
        serverSide: true,
        ajax: {
            url: "{{ route('slide.datatables') }}",
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'img', name: 'img' },
            { data: 'link', name: 'link' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searcheble: false },
        ],
        // "fnDrawCallback": function() {
        //     $('.checkbox_type').bootstrapToggle();
        // }
    });

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        $.ajax({
            url: "{{ route('slide.edit') }}",
            method: 'get',
            dataType: "json",
            data: { id: id },
            success: function(data) {
                if (data.status) {
                    var path = "{{ asset('') }}";
                    $("input[name='title']").val(data.data.title);
                    $("input[name='link']").val(data.data.link);
                    $("textarea[name='description']").text(data.data.description);
                    $("img[alt='avatar']").attr('src', path + data.data.image);
                    $("#editModal").modal("show");
                }
            },
            error: function() {
                toastr.error('Failed to edit product', 'Error !!');
            },
        });
    });

    $("#form").on("submit", function(e) {
        e.preventDefault();
        var form = $(this)[0];
        var form_data = new FormData(form);
        form_data.append('id', id);
        $.ajax({
            url: "{{ route('slide.postEdit') }}",
            method: "post",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.status) {
                    $("#editModal").modal("hide");
                    toastr.success("Updated Successfully!");
                    table.draw();
                }
            },
            error: function() {
                toastr.error("Failed to update !");
            }
        });
    });


    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        if (confirm("Are you sure delete this data?")) {
            $.ajax({
                url: "{{ route('slide.delete') }}",
                method: 'post',
                dataType:'json',
                data: { _token: '{{csrf_token()}}', id: id },
                success: function(data) {
                    if (data.status) {
                        toastr.success('Deleted Successfully !!');
                        table.draw();
                    }
                },
                error: function() {
                    toastr.error('Error delete', 'Error !!');
                },
            });
        } else return false;
    });

});

</script>
<script src="{{ asset('admin/js/upload_avatar.js') }}"></script>
<script src="{{ asset('admin/vendor/summernote/summernote-lite.js') }}"></script>
<script>

</script>
@stop
