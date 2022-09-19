@extends('admin.layouts.app')
@section('title','Special Form List')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
<link href="{{ asset('admin/vendor/summernote/summernote-lite.css') }}" rel="stylesheet">
<style>
.modal-lg {
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
            <h6 class="m-0 font-weight-bold text-primary">Free Consultation</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Large modal -->
</div>
@endsection
@section('script')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
$(document).ready(function() {
    Sumnernote();
    var id = null;
    table = $("#dataTable").DataTable({
        // dom: 'lifrtp',
        // processing:true,
        serverSide: true,
        ajax: {
            url: "{{ route('special-form.datatable') }}",
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            // { data: 'action', name: 'action', orderable: false, searcheble: false },
        ],

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
