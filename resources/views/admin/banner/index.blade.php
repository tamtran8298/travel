@extends('admin.layouts.app')
@section('title','Edit Banner')
@section('style')
<link href="{{ asset('admin/vendor/summernote/summernote-lite.css') }}" rel="stylesheet">
<style>
    .panel-heading{
         background: #f8f9fc;
      }
   </style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit {{$name}} Banner</h6>
        </div>
        <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 push-lg-4 personal-info">
                       {{--  <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Tiêu đề</label>
                                    <div class="col-lg-9">
                                        <input required="" class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{isset($banner->title) ? $banner->title : old('title')}}" placeholder="Title" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Nội dung</label>
                                    <div class="col-lg-10">
                                        <textarea id="summernote" name="description" class="form-control" rows="4" cols="50">{{isset($banner->description) ? $banner->description : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                {{-- <a href="{{ route('home') }}" class="btn btn-secondary">Hủy</a> --}}
                                <input type="submit" class="btn btn-primary" value="Lưu " />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pull-lg-8 text-xs-center">
                        <img style="" src="{{empty($banner->image) ? '//placehold.it/150/' : loadImage($banner->image)}}" class="m-x-auto img-fluid " alt="avatar" />
                        <h6 class="m-t-2">Upload a different photo</h6>
                        <label class="custom-file col-md-8">
                            <span id="choose_file" class="form-control">Chọn hình</span>
                            <input accept="image/*" type="file" id="file" name="image" class="custom-file-input" value="">
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
<script src="{{ asset('admin/vendor/summernote/summernote-lite.js') }}"></script>
<script>
$('#summernote').summernote();
$('.note-icon-trash').trigger('click');

</script>
@endsection
