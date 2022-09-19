@extends('admin.layouts.app')
@section('title','Special List')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
<link href="{{ asset('admin/vendor/summernote/summernote-lite.css') }}" rel="stylesheet">
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
            <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('flight.add') }}" class="btn btn-primary">Tạo Flight</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID </th>
                            {{-- <th>Hình</th> --}}
                            <th>Tên</th>
                            <th>url</th>
                            {{-- <th>Mô tả</th> --}}
                            {{-- <th>Loại</th> --}}
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
                        <h6 class="m-0 font-weight-bold text-primary">Post</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" id="editForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 push-lg-4 personal-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Tên</label>
                                                <div class="col-lg-10">
                                                    <input required="" class="form-control" type="text" name="name" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">url</label>
                                                <div class="col-lg-10">
                                                    <input required="" class="form-control" type="text" name="url" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                            <input type="submit" class="btn btn-primary" value="Lưu" />
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
    Sumnernote();
    var id = null;
    // alert('abc');
    table = $("#dataTable").DataTable({
        // dom: 'lifrtp',
        // processing:true,
        serverSide: true,
        ajax: {
            url: "{{ route('flight.datatable') }}",
        },
        columns: [
            { data: 'id', name: 'id' },
            // { data: 'img', name: 'img' },
            { data: 'name', name: 'name' },
            { data: 'url', name: 'url' },
            // { data: 'post_type_title', name: 'post_type_title' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searcheble: false },
        ],
        // "fnDrawCallback": function() {
        //     $('.checkbox_type').bootstrapToggle();
        // }
    });

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        // $("select[name='post_type_id']").find("option:selected").attr("selected", false);
        id = $(this).attr('data-id');
        $.ajax({
            url: "{{ route('flight.edit') }}",
            method: 'get',
            dataType: "json",
            data: { id: id },
            success: function(data) {
                if (data.status) {
                    // var path = "{{ asset('') }}";
                    $("input[name='name']").val(data.data.name);
                    $("input[name='url']").val(data.data.url);
                    // $("select[name='post_type_id']").find("option[value='" + data.data.post_type_id + "']").attr('selected', true);
                    // $("textarea[name='description']").text(data.data.description);
                    // $('.summernote').summernote('code', data.data.description);
                    // $("img[alt='avatar']").attr('src', path + data.data.image);
                    $("#editModal").modal("show");
                }
            },
            error: function() {
                toastr.error('Failed to edit data', 'Error !!');
            },
        });
    });

    $("#editForm").on("submit", function(e) {
        e.preventDefault();
        var form = $('#editForm')[0];
        var form_data = new FormData(form);
        form_data.append('id', id);
        $.ajax({
            url: "{{ route('flight.postEdit') }}",
            method: "post",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.status) {
                    $("#editModal").modal("hide");
                    toastr.success("Updated successfully");
                    table.draw();
                }
            },
            error: function() {
                toastr.error("Failed to update");
            }
        });
    });


    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        if (confirm("Are you sure delete this data?")) {
            $.ajax({
                url: "{{ route('flight.delete') }}",
                method: 'post',
                data: { _token: '{{csrf_token()}}', id: id },
                success: function(data) {
                    if (data) {
                        toastr.success("Deleted successfully");
                        table.draw();
                    }
                },
                error: function() {
                    toastr.error('Failed to delete');
                },
            });
        } else return false;
    });



});

</script>
<script src="{{ asset('admin/js/upload_avatar.js') }}"></script>
<script src="{{ asset('admin/vendor/summernote/summernote-lite.js') }}"></script>
<script>
function Sumnernote() {
    $('.summernote').summernote();
    $('.note-icon-trash').trigger('click');
}

</script>
@stop
