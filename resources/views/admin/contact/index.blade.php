@extends('admin.layouts.app')
@section('title','Edit Contact')
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
            <h6 class="m-0 font-weight-bold text-primary">Liên hệ</h6>
        </div>
        <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 personal-info">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Địa chỉ</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="address" value="{{isset($contact->address) ? $contact->address : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Điện thoại</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="phone" value="{{isset($contact->phone) ? $contact->phone : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="email" value="{{isset($contact->email) ? $contact->email : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Iframe Map</label>
                                    <div class="col-lg-10">
                                        <textarea name="map" class="form-control" rows="4" cols="50">{{isset($contact->map) ? $contact->map : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Mission</label>
                                    <div class="col-lg-10">
                                        <textarea id="summernote" name="mission" class="form-control" rows="4" cols="50">{{isset($contact->mission) ? $contact->mission : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Hủy</a>
                                <input type="submit" class="btn btn-primary" value="Lưu" />
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
