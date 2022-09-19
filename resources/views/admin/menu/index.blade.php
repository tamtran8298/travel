@extends('admin.layouts.app')
@section('title','Menu')
@section('style')
<link rel="stylesheet" href="vendor/nestable/nestable.css">
<style>
   .dd{
   max-width: none;
   }
</style>
@endsection
@section('content')
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Menu</h1>
   </div>
</div>
<div class="container-fluid">
   <div class="card shadow ">
      <div class="card-header">
         <h6 class="m-0 font-weight-bold text-primary">
            <button class="btn btn-primary" id="new">New</button>
            <button class="btn btn-warning" id="update">Update</button>
         </h6>
      </div>
      <div class="card-body" >
         <div class="dd">
            <ol class="dd-list" id="list_menu">
               {{-- 
               <li class="dd-item" data-id="1">
                  <div class=" form-control"><a href="#" class="edit">Item 1</a></div>
               </li>
               <li class="dd-item" data-id="2">
                  <div class="d form-control">Item 2</div>
               </li>
               <li class="dd-item" data-id="3">
                  <div class=" form-control">Item 3</div>
                  <ol class="dd-list">
                     <li class="dd-item" data-id="4">
                        <div class="dd-handle form-control">Item 4 </div>
                     </li>
                     <li class="dd-item" data-id="5">
                        <div class="dd-handle form-control">Item 5</div>
                     </li>
                  </ol>
               </li>
               --}}
            </ol>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade " id="menu_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Menu Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="col-lg-12 personal-info">
               <form role="form" method="post" enctype="multipart/form-data" id="menu_item">
                  {{csrf_field()}}                  
                  <div class="form-group row">
                     <label class="col-lg-3 col-form-label form-control-label">Title</label>
                     <div class="col-lg-9">                     
                        <input required="" class="form-control " type="text" name="title"  placeholder="Menu"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-lg-3 col-form-label form-control-label">URL</label>
                     <div class="col-lg-9">
                        <input required="" class="form-control" type="text" value="" name="url" placeholder="/menu" />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-lg-3 col-form-label form-control-label">Target</label>
                     <div class="col-lg-9">
                        <select class="form-control" name="target" id="">
                           <option class="form-control" value="">Null</option>
                           <option class="form-control" value="_blank" >Open new tab</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-lg-3 col-form-label form-control-label">Class Icon</label>
                     <div class="col-lg-9">
                        <input  class="form-control" type="text" value="" name="class_icon" placeholder="fas fa-fw fa-tachometer-alt" />
                     </div>
                  </div>
            </div>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-warning delete" data-dismiss="modal">Delete</button>
         <input type="submit" class="btn btn-primary" value="Save">
         <input type="hidden" name="action" value="">
         <input type="hidden" name="id">
         </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="vendor/nestable/jquery.nestable.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
{{-- <script src="https://dbushell.com/Nestable/jquery.nestable.js"></script> --}}
{{-- <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> --}}
<script>
   // $('.dd').nestable('serialize');
   $('.dd').nestable({ maxDepth:2 });
   
     $(document).ready(function(){
   
      ajax_load_menu();
        function ajax_load_menu(){
          $.ajax({
            url:"{{ route('ajax_load_menu') }}",
            method:"get",
            dataType:"json",
            success:function(data){             
              if(data){
                var html = '';
                for(var i = 0; i < data.length; i++){
                  if(data[i].childs.length == 0){
                    html +=  '<li class="dd-item" data-id="'+data[i].id+'">'
                          +'<div class="dd-handle dd3-handle form-control"></div>'
                          +'<div class=" form-control dd3-content"><a href="#" class="edit" data-id="'+data[i].id+'">'+data[i].title+'</a></div>'
                          +'</li>' ;
                  }else{
                    var child = '';
                    for(var j = 0; j < data[i].childs.length; j++){
                      child +=  '<li class="dd-item" data-id="'+data[i].childs[j].id+'">'
                          +'<div class="dd-handle dd3-handle form-control"></div>'
                          +'<div class=" form-control dd3-content"><a href="#" class="edit" data-id="'+data[i].childs[j].id+'">'+data[i].childs[j].title+'</div>'
                          +'</li>' ;
                    }
                    html += '<li class="dd-item" data-id="'+data[i].id+'">'
                          +'<div class="dd-handle dd3-handle form-control"></div>'
                           +'<div class=" form-control dd3-content"><a href="#" class="edit" data-id="'+data[i].id+'">'+data[i].title+'</a></div>'
                           +'<ol class="dd-list">'
                           +child                             
                           + '</ol>'
                           +'</li>'
                  }
                }
                $("#list_menu").html(html);
              }
            }
          });
        }
   
   
      function updateOutput(data) {           
           $.ajax({
               method: "post",
               url: "{{ route('ajax_update_list_menu') }}",
               data: {
                _token: '{{csrf_token()}}',
                   data: data
               },
               success:function(data){
               toastr.success(data,'Success !!');       
            }
           })         
       };
       $("#update").on('click',function(e){
        var data = $('.dd').nestable('serialize');
        updateOutput(data); 
       });        
       
   
       $("#new").on('click',function(){
        $(".modal-title").text("Add Menu Item");
        $("input[name='title']").val('');
        $("input[name='url']").val('');
        $("input[name='class_icon']").val('');
        $("input[name='action']").val("insert");
        $(".delete").attr("hidden",true);
        $(".delete").attr("data-id",false);
        $("#menu_Modal").modal("show");
       });
   
       $("#menu_item").on("submit",function(e){
        e.preventDefault();
        var form = $(this)[0];
        var form_data = new FormData(form);
        $.ajax({
          url:"{{ route('ajax_new_and_update_menu_item') }}",
          method:"post",
          data:form_data,
          cache:false,
          contentType:false,
          processData:false,
          dataType:"json",
          success:function(data){
          // console.log(data);          
            if(data.error.length > 0){
              toastr.error(data.error,'Error !!');
            }else{
              if(data.success){
                toastr.success(data.success,'Success !!');
                ajax_load_menu();
                $("#menu_Modal").modal("hide");
              }              
            }             
          }
        });
       });
   
       
   
       $(".delete").on("click",function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        if(confirm("Are you sure want to delete this data?")){
        $.ajax({
          url:"{{ route('ajax_delete_menu_item') }}",
          data:{
            _token:'{{csrf_token()}}',
            id:id,
          },
          method:"post",
          success:function(data){
            if(data){
              toastr.success(data,'Success !!');
              ajax_load_menu();
            }           
          },
          error:function(){
            toastr.error('Error delete','Error !!');
          },
        });
        } else return false;
       });
   
       $(document).on("click",".edit",function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');        
        $.ajax({
          url:"{{ route('ajax_load_menu_item') }}",
          method:"get",
          data:{id:id},
          dataType:"json",
          success:function(data){
            if(data){
              $(".delete").attr("hidden",false);              
              $(".delete").attr("data-id",data.id);              
              $(".modal-title").text("Edit Menu Item");
              $("input[name='title']").val(data.title);
              $("input[name='url']").val(data.url);              
              $("select[name='target']").val(data.target).find("option[value=" + data.target +"]").attr('selected', true);
              $("input[name='class_icon']").val(data.class_icon);
              $("input[name='action']").val("update");
              $("input[name='id']").val(data.id);
              $("#menu_Modal").modal("show");
            }
          }
        });
      });
   
   
   
   });
</script>
@endsection