@extends('admin.layouts.app')
@section('title','Edit Logo')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Logo</h6>
        </div>
        <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 push-lg-4 personal-info">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Title</label>
                                    <div class="col-lg-9">
                                        <input required="" class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{isset($logo->title) ? $logo->title : old('title')}}" placeholder="Title" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Save Changes" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pull-lg-8 text-xs-center">
                        <img style="" src="{{loadImage($logo->image)}}" class="m-x-auto img-fluid " alt="avatar" />
                        <h6 class="m-t-2">Upload a different photo</h6>
                        <label class="custom-file col-md-8">
                            <span id="choose_file" class="form-control">Choose file</span>
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
@endsection
