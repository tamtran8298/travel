@extends('admin.layouts.app')
@section('title','Edit About')
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
            <h6 class="m-0 font-weight-bold text-primary">Edit Trang {{$name}}</h6>
        </div>
        <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-10 personal-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Nội dung</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="4" cols="50" id="summernote" name="content">{{isset($about->content) ? $about->content : ''}}</textarea>
                                        {{-- <textarea name="content" class="form-control" rows="4" cols="50">{{isset($about->content) ? $about->content : ''}}</textarea> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Hủy</a>
                                <input type="submit" class="btn btn-primary" value="Lưu trang" />
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
<script src="{{ asset('admin/vendor/summernote/summernote-lite.js') }}"></script>
<script>
$('#summernote').summernote();
$('.note-icon-trash').trigger('click');

</script>
@endsection
