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
            <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('get_add_tour') }}" class="btn btn-primary">New Tour</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Hình</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Chi tiết</th>
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
                        <h6 class="m-0 font-weight-bold text-primary">Tour</h6>
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
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="" placeholder="Tên" />
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">Danh mục</label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="type_tour" id="selectbox">
                                                        @foreach ($type_tour as $element)
                                                        <option value="{{$element->id}}">{{$element->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Mã Tour</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('tour_id') is-invalid @enderror" type="text" name="tour_id" value="" placeholder="Mã Tour" />
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">PT Di Chuyển</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('transport') is-invalid @enderror" type="text" name="transport" value="" placeholder="Phương Tiện Di Chuyển" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Thời Gian</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('tour_date') is-invalid @enderror" type="text" name="tour_date" value="" placeholder="Thời Gian" />
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">Nơi Khởi Hành</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('place_start') is-invalid @enderror" type="text" name="place_start" value="" placeholder="Nơi Khởi Hành" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Ngày Khởi Hành</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('date_start') is-invalid @enderror" type="text" name="date_start" value="" placeholder="Ngày Khởi Hành" />
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">Giá</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="" placeholder="Giá" />
                                                </div>
                                                
                                            </div>
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
                                <div> 
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Giới thiệu</label>
                                                <div class="col-lg-12">
                                                    <textarea id="summernote" name="description" class="form-control" rows="4" cols="50"></textarea>
                                                </div>
                                            </div>
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

<div id="ShowModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tour</h6>
                    </div>
                    <div class="card-body">
                        
                            <div class="row">
                                <div class="col-lg-8 push-lg-4 personal-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Tên</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="" placeholder="Tên" disabled/>
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">Mã Tour</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('tour_id') is-invalid @enderror" type="text" name="tour_id" value="" placeholder="Mã Tour" disabled/>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Nơi Khởi Hành</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('place_start') is-invalid @enderror" type="text" name="place_start" value="" placeholder="Nơi Khởi Hành" disabled/>
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">PT Di Chuyển</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('transport') is-invalid @enderror" type="text" name="transport" value="" placeholder="Phương Tiện Di Chuyển" disabled/>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Thời Gian</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('tour_date') is-invalid @enderror" type="text" name="tour_date" value="" placeholder="Thời Gian" disabled/>
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">Ngày Khởi Hành</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('date_start') is-invalid @enderror" type="text" name="date_start" value="" placeholder="Ngày Khởi Hành" disabled/>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                
                                                <label class="col-lg-2 col-form-label form-control-label">Giá</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="" placeholder="Giá" disabled/>
                                                    
                                                </div>
                                                {{-- <label class="col-lg-2 col-form-label form-control-label">Giá</label>
                                                <p id="test"></p> --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 pull-lg-8 text-xs-center">
                                    <img style="" src="" class="m-x-auto img-fluid " alt="avatar" />
                                    
                                </div>
                                <div> 
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Giới thiệu</label>
                                                <div class="col-lg-12">
                                                    <textarea disabled id="summernote1" name="description1" class="form-control" rows="4" cols="50" ></textarea>
                                                

                                            </div>
                                        </div>
                                </div>
                                    
                                <div class="row">
                                <div class="col-lg-8 push-lg-4 personal-info">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label form-control-label"></label>
                                        <div class="">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            
                                            <input type="hidden" value="" name="id">
                                        </div>
                                    </div>
                                </div>
                                </div>


                            </div>
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
            url: "{{ route('datatables_tour') }}",
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'img', name: 'img' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'type_tour', name: 'type_tour' },
            { data: 'description', name: 'description' },
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
                    var path = "{{ asset('') }}";
                    $("input[name='name']").val(data.tour.name);
                    $("input[name='tour_id']").val(data.tour.tour_id);
                    $("input[name='transport']").val(data.tour.transport);
                    $("input[name='name']").val(data.tour.name);
                    $("input[name='tour_date']").val(data.tour.tour_date);
                    $("input[name='place_start']").val(data.tour.place_start);
                    $("input[name='date_start']").val(data.tour.date_start);
                    
                
                    $("input[name='price']").val(data.tour.price);
                    
                    // $("textarea[name='description']").text(data.tour.description);
                    $("img[alt='avatar']").attr('src', path + data.tour.image);
                    $("#selectbox").val(data.tour.tour_TypeTour_id).find("option[value='" + data.tour.tour_type_tour_id + "']").attr('selected', true);
                    $("input[name='id']").val(data.tour.id);
                    var markupStr = data.tour.description;
                    $('#summernote1').summernote('code', markupStr);
                    $('#summernote1').summernote('disable');

                    // Sumnernote();
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
                url: "{{ route('tour_delete') }}",
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
    $(document).on('click', '.tour_off', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        if (confirm("Are you sure off this data?")) {
            $.ajax({
                url: "{{ route('off_tour') }}",
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
    $(document).on('click', '.tour_on', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        if (confirm("Are you sure on this data?")) {
            $.ajax({
                url: "{{ route('on_tour') }}",
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
            url: "{{ route('edit-tour') }}",
            method: 'get',
            dataType: "json",
            data: { id: id },
            success: function(data) {
                if (data.success) {
                    var path = "{{ asset('') }}";
                    $("input[name='name']").val(data.tour.name);
                    $("input[name='tour_id']").val(data.tour.tour_id);
                    $("input[name='transport']").val(data.tour.transport);
                    $("input[name='name']").val(data.tour.name);
                    $("input[name='tour_date']").val(data.tour.tour_date);
                    $("input[name='place_start']").val(data.tour.place_start);
                    $("input[name='date_start']").val(data.tour.date_start);
                    

                    $("input[name='price']").val(data.tour.price);
                    // $("textarea[name='description']").text(data.tour.description);
                    $("img[alt='avatar']").attr('src', path + data.tour.image);
                    $("#selectbox").val(data.tour.tour_TypeTour_id).find("option[value='" + data.tour.tour_type_tour_id + "']").attr('selected', true);
                    $("input[name='id']").val(data.tour.id);
                    var markupStr = data.tour.description;
                    $('#summernote').summernote('code', markupStr);
                    // Sumnernote();
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
            url: "{{ route('postEdittour') }}",
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
