@extends('admin.layouts.app')
@section('title','Add Our Team')
@section('style')
{{--
<link href="vendor/summernote/summernote-lite.css" rel="stylesheet"> --}}
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
            <h6 class="m-0 font-weight-bold text-primary">Our Team</h6>
        </div>
        <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 push-lg-4 personal-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Tiêu đề</label>
                                    <div class="col-lg-10">
                                        <input required="" class="form-control " type="text" name="title" value="" placeholder="Tiêu đề" />
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Link</label>
                                    <div class="col-lg-10">
                                        <input required="" class="form-control " type="text" name="link" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Type Name</label>
                                    <div class="col-lg-10">
                                        <input required="" class="form-control " type="text" name="type_name" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Mô tả </label>
                                    <div class="col-lg-10">
                                        <textarea id="summernote" name="description" class="form-control" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <a href="{{ route('ourTeam') }}" class="btn btn-secondary">Hủy</a>
                                <input type="submit" class="btn btn-primary" value="Lưu" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pull-lg-8 text-xs-center">
                        <img style="" src="{{(!isset($product->image)) ? '//placehold.it/150/' : asset("upload/images").'/'.$product->image}}" class="m-x-auto img-fluid " alt="avatar" />
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
@endsection
@section('script')
<script src="{{ asset('admin/js/upload_avatar.js') }}"></script>
{{-- <script src="vendor/summernote/summernote-lite.js"></script> --}}
{{-- <script>
$('#summernote').summernote();
$('.note-icon-trash').trigger('click');

</script> --}}
@endsection
