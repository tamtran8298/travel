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
      <form method="POST" action="{{route('post-sms-template')}}">
        @csrf()

    	<div class="form-group row"  >
            <label class="col-lg-2 col-form-label form-control-label">Template title</label>
            <div class="col-lg-6">
               <input class="late form-control" name="template_title" type="text">
            </div>
            
        </div>
        <div class="form-group row"  >
        	<label class="col-lg-2 col-form-label form-control-label">SMS Content Template</label>
            <div class="col-lg-6">
                <textarea class="form-control" name="sms_content" id="textMessage" rows="4" cols="50"></textarea>
                <span class="note"><span id="length">0</span>/160 characters</span>
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
      $('#textMessage').val(function(i, text) {
          return text + name;
      }).focus();
    })
    $(document).on("click","#phone",function(){
      $('#textMessage').val(function(i, text) {
          return text + phone;
      }).focus();
    });
    $(document).on("click","#birthday",function(){
      $('#textMessage').val(function(i, text) {
          return text + birthday;
      }).focus();
    });

    $("#textMessage").on("keyup",function(){
        convertSmsContentTemplate();
   });

   function convertSmsContentTemplate(){
        var MaxLength = 160;
        var length = $("#textMessage").val().length;
        $("#length").text(length);

        if(length > MaxLength){
            $("#length").text(160);
           var str = $("#textMessage").val();
           var s_str = str.substring(0,MaxLength);
           $("#textMessage").val(s_str);
        }   
    }

  });
</script>
@stop