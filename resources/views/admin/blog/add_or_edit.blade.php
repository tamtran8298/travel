@extends('admin.layouts.app')
@section('title','Tour '.$name)
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
         <h6 class="m-0 font-weight-bold text-primary">{{$name}} Blog</h6>
      </div>
      <div class="card-body">
         <form role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-lg-12" style="text-align: center;">
              <h2>New Blog</h2>
            </div>
            <div class="col-lg-12">
              <div class="col-lg-2">
              <label class="col-lg-12 col-form-label form-control-label" style="padding-left: 0;">Title</label>
              </div>
              <div class="col-lg-12">
              <input required="" class="form-control @error('title') is-invalid @enderror" type="text" name="title"/>
              </div>
            </div>
            
             <div class="col-lg-12">
              <div class="col-lg-2">
              <label class="col-lg-12 col-form-label form-control-label" style="padding-left: 0;">Description</label>
              </div>
              <div class="col-lg-12">
              <input required="" class="form-control @error('title') is-invalid @enderror" type="text" name="description"/>
              </div>
            </div>
            <div class="col-lg-12">
              <label class="col-lg-12 col-form-label form-control-label">Body</label>
               <div class="col-lg-12">                     
                        <textarea id="summernote" name="body" class="form-control" rows="30" cols="50" placeholder="Destination Blog"></textarea>
               </div>
               <br>
            </div>
            <div class="col-lg-12">
              <div class="col-lg-2">
              <label class="col-lg-12 col-form-label form-control-label" style="padding-left: 0;">Topic</label>
              </div>
              <div class="col-lg-12" style="padding-bottom: 20px;">
                                      <select class="form-control" name="topic" id="">
                           @foreach ($category_blog as $element)
                               <option 
                               
                               value="{{$element->id_blog_category}}">{{$element->name}}</option>
                           @endforeach
                        </select>
              </div>
            </div>



            
            <div class="col-lg-12  text-xs-center" style="text-align: center;">
               <img style="" src="{{(!isset($tour->image)) ? '//placehold.it/150/' : asset("upload/images").'/'.$tour->image}}" class="m-x-auto img-fluid " alt="avatar" />
               <h6 class="m-t-2">Upload a different photo</h6>
            <div class="col-lg-12" style="text-align: center; padding: 0 350px 0 350px;">
               <label class="custom-file col-lg-12"  >
               <span id="choose_file" class="form-control" >Chọn hình</span>
               <input accept="image/*" type="file" id="file" name="image" class="custom-file-input">
               </label>
               </div>
            </div>
            </div>


            <div class="col-lg-12  personal-info">
               
               <div class="form-group row" style="text-align: center;">
               
               <div class="col-lg-9" style="padding-left: 180px">  
               <label class="col-lg-2 col-form-label form-control-label"></label>                   
                  <a href="{{ route('blog') }}" class="btn btn-secondary">Hủy</a>
                  <input type="submit" class="btn btn-primary" value="Thêm Blog" />
               </div>
            </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('admin/js/upload_avatar.js') }}"></script>
<script src="{{ asset('admin/vendor/summernote/summernote-lite.js') }}"></script>
<script type="text/javascript">
$('#summernote').summernote();
$('.note-icon-trash').trigger('click');

</script>

@stop
