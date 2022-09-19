@extends('admin.layouts.app')
@section('title','Email template')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
@stop
@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Email template</h6>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('post-email-template')}}">
        @csrf()
    	<div class="form-group row"  >
            <label class="col-lg-2 col-form-label form-control-label">Email title</label>
            <div class="col-lg-6">
               <input class="late form-control" name="template_title" type="text">
            </div>
            
        </div>
        <div class="form-group row"  >
        	<label class="col-lg-2 col-form-label form-control-label">Email Content Template</label>
            <div class="col-lg-10">
                <textarea class="form-control email_content" id="summernote" name="email_content" ></textarea>
            </div>
        </div>
        <div class="form-group row" >
        </div>

         <div class="form-group row">
	          <label class="col-lg-2 col-form-label form-control-label"></label>
	          <div class="col-lg-9">                     
	             <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
	             <input type="submit" class="btn btn-primary" value="Save Changes" />
	          </div>
	       </div>
        </form>
    </div>
  </div>

</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 150,                 // set editor height           // set maximum height of editor
      focus: false 
    });
  });
</script>
@stop