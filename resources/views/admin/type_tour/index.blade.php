@extends('admin.layouts.app')
@section('title','type_tour List')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
<link href="{{ asset('admin/vendor/summernote/summernote-lite.css') }}" rel="stylesheet">
<link rel="stylesheet" href="   ://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('get_add_TypeOfTour') }}" class="btn btn-primary">New</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Hình</th>
                            <th>Tên</th>
                            <th>Ẩn/Hiện</th>
                            
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
                        <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" id="editForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 push-lg-4 personal-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2.5 col-form-label form-control-label">Tên Loại Tour</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="" placeholder="Tên" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                            <input type="submit" class="btn btn-primary" value="Lưu" />
                                            <input type="hidden" value="" name="id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 pull-lg-8 text-xs-center">
                                    <img style="" src="" class="m-x-auto img-fluid " alt="avatar1" />
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
        </div>s
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
            url: "{{ route('datatables_TypeOfTour') }}",
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'name', name: 'name' },
            
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searcheble: false },
        ],
        "fnDrawCallback": function() {
            $('.checkbox_type').bootstrapToggle();
        }
    });

    $(document).on('click', '.tour_description', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: "{{ route('description-tour') }}",
            method: 'get',
            dataType: "json",
            data: { id: id },
            success: function(data) {
                if (data.success) {
                    var path = "{{ asset('upload/images') }}";
                    //$("input[name='name']").val(data.tour.name);
                    $("input[name='price']").val(data.tour.price);
                    // $("textarea[name='description']").text(data.tour.description);
                    $("img[alt='avatar']").attr('src', path + '/' + data.tour.image);
                    $("#selectbox").val(data.tour.tour_TypeTour_id).find("option[value='" + data.tour.tour_type_tour_id + "']").attr('selected', true);
                    $("input[name='id']").val(data.tour.id);
                    var markupStr = data.tour.description;

                    $('#summernote').summernote('code', markupStr);
                    Sumnernote();

                    $("input[name='name']").val(data.tour.description);
                    $("#ShowModal").modal("show");
                }
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
                url: "{{ route('TypeOfTour_delete') }}",
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
    $(document).on('click', '.off', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        if (confirm("Are you sure off this data?")) {
            $.ajax({
                url: "{{ route('tour_off') }}",
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
    $(document).on('click', '.on', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        if (confirm("Are you sure on this data?")) {
            $.ajax({
                url: "{{ route('tour_on') }}",
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
            url: "{{ route('editTypeOfTour') }}",
            method: 'get',
            dataType: "json",
            data: { id: id },
            success: function(data) {
                if (data.success) {
                    
                    var path = "{{ asset('') }}";
                    $("input[name='name']").val(data.type.name);
                    
                    // $("textarea[name='description']").text(data.tour.description);
                    $("img[alt='avatar1']").attr('src', path + data.type.image);
                    // $("img[alt='avatar1']").attr('src', path1 + '/' + data.type.image);
                   
                    $("input[name='id']").val(data.type.id);
                    
                    $("#editModal").modal("show");
                }
            },
            error: function() {
                toastr.error('Failed to edit type tour', 'Error !!');
            },
        });
    });

    $("#editForm").on("submit", function(e) {
        e.preventDefault();
        var form = $('#editForm')[0];
        var form_data = new FormData(form);
        $.ajax({
            url: "{{ route('postEditTypetour') }}",
            method: "post",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    $("#editModal").modal("hide");
                    toastr.success("Edit tour Success!");
                    table.draw();
                }
            },
            error: function() {
                toastr.error("Failed to edit tour!");
            }
        });
    });


    

    $(document).on('change', '.check_home_page', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        console.log(id);
        $.ajax({
            url: "{{ route('checkHomePage') }}",
            method: "get",
            data: { id: id },
            success: function(data) {
                if (data) {
                    toastr.success(data);
                    table.draw();
                }
            },
            error: function() {
                toastr.error("Check Active Error");
            }
        });
    });

    $(document).on('change', '.check_trending', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        console.log(id);
        $.ajax({
            url: "{{ route('checkTrendingtour') }}",
            method: "get",
            data: { id: id },
            success: function(data) {
                if (data) {
                    toastr.success(data);
                    table.draw();
                }
            },
            error: function() {
                toastr.error("Check Active Error");
            }
        });
    });

    $(document).on('change', '.check_best_seller', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        console.log(id);
        $.ajax({
            url: "{{ route('checkBestSeller') }}",
            method: "get",
            data: { id: id },
            success: function(data) {
                if (data) {
                    toastr.success(data);
                    table.draw();
                }
            },
            error: function() {
                toastr.error("Check Active Error");
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
