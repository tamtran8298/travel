@extends('admin.layouts.app')
@section('title','Add flight')
@section('style')
<link href="{{ asset('admin/vendor/summernote/summernote-lite.css') }}" rel="stylesheet">
<style>
    .panel-heading{
         background: #f8f9fc;
      }
   </style>
@stop
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Flight</h6>
        </div>
        <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 push-lg-4 personal-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-10">
                                        <input required="" class="form-control " type="text" name="name" value="" placeholder="name" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">URL</label>
                                    <div class="col-lg-10">
                                        <input required="" class="form-control " type="text" name="url" value="" placeholder="name" />
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <a href="{{ route('flight') }}" class="btn btn-secondary">Hủy</a>
                                <input type="submit" class="btn btn-primary" value="Lưu " />
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/js/upload_avatar.js') }}"></script>
<script src="{{ asset('admin/vendor/summernote/summernote-lite.js') }}"></script>
<script>
$('#summernote').summernote();
$('.note-icon-trash').trigger('click');

</script>
@endsection
