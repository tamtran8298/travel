@extends('admin.layouts.app')
@section('title','Edit Title')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit {{$name}} Title</h6>
        </div>
        <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">Mô tả </label>
                                    <div class="col-lg-10">
                                        <textarea id="summernote" name="description" class="form-control" rows="4" cols="50">{{$title->description ?? null}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                {{-- <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a> --}}
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
@endsection
