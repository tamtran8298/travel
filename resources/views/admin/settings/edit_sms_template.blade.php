@extends('admin.layouts.app')
@section('title','Send SMS')
@section('style')
@stop
@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">SMS Template</h6>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('post-edit-sms-template')}}">
        @csrf()
    	<div class="form-group row"  >
            <label class="col-lg-2 col-form-label form-control-label">Template title</label>
            <div class="col-lg-6">
               <input class="late form-control" name="template_title" type="text" value="{{$sms->template_title}}">
               <input class="late form-control" name="id" type="hidden" value="{{$sms->id}}">
            </div>
            
        </div>
        <div class="form-group row"  >
        	<label class="col-lg-2 col-form-label form-control-label">SMS Content Template</label>
            <div class="col-lg-6">
                <textarea name="sms_content" class="form-control" id="sms_content" rows="4" cols="50">{{$sms->sms_content_template}}</textarea>
            </div>
        </div>
        <div class="form-group row" >
          <label class="col-lg-2 col-form-label form-control-label">Params</label>
          <div class="col-lg-6">
            <button type="button" id="name" class="btn btn-primary">Name</button>
            <button type="button" id="phone" class="btn btn-primary">Phone</button>
            <button type="button" id="birthday" class="btn btn-primary">Birthday</button>
            <button type="button" id="link" class="btn btn-primary">Sort Link</button>
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
<script type="text/javascript">
  $(document).ready(function(){
    var name="{name}";
    var phone="{phone}";
    var birthday="{birthday}";
    $(document).on("click","#name",function(){
      $('#sms_content').val(function(i, text) {
          return text + name;
      }).focus();
    })
    $(document).on("click","#phone",function(){
      $('#sms_content').val(function(i, text) {
          return text + phone;
      }).focus();
    });
    $(document).on("click","#birthday",function(){
      $('#sms_content').val(function(i, text) {
          return text + birthday;
      }).focus();
    });
  });
</script>
@stop