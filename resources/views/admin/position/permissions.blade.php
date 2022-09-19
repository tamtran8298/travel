@extends('admin.layouts.app')
@section('title','Permission')
@section('style')

@stop
@section('content')
@php
$arr_permission = [
  'read'=>'Read',
  'insert'=>'Insert',
  'update'=>'Update',
  'delete'=>'Delete'
];
@endphp

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
    </div>
    <div class="card-body">
      <form action="" id="permission_form" method="post">
        @csrf
      <div class="form-group row">
        <label class="col-lg-2 col-form-label form-control-label">Permission name</label>
        <div class="col-lg-4">                     
           <input required="" class="form-control @error('permission_name') is-invalid @enderror" type="text" name="permission_name" id="permission_name" value="{{$position->position_name}}" placeholder="Permission name" />
           <span id="btn-save" class="text-danger" style="float: right;position: relative;top: -30px;right: 10px;display:none;z-index: 1111"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
        </div>
        <label class="col-lg-1 col-form-label form-control-label">Status</label>
        <div class="col-lg-2"> 
            <input {{$position->position_permission_status == 1 ? 'checked' : ''}} type="checkbox" data-toggle="toggle" data-id="{{$position->id}}" data-on="Enabled" data-off="Disabled">
        </div>
        {{-- <div class="col-lg-1"> 
          <input type="submit" class="btn btn-danger" value="Save Changes" />
        </div> --}}
      </div>
      </form>

      <table class="table table-hover">
          <thead>
              <tr>
                <th class="col-lg-4">Permission</th>
                @foreach($arr_permission as $permission)
                <th class="col-lg-1">{{$permission}}</th>
                @endforeach
              </tr>
          </thead>
          @php
          $menu_parents = collect($menu_item_list);
          $menu_parents = $menu_parents->where('parent_id',0);
          @endphp

          @foreach($menu_parents as $menu_parent)

          @php
            $menu_children = collect($menu_item_list);
            $menu_children = $menu_children->where('parent_id',$menu_parent->id);
            $count = $menu_children->count();
          @endphp

          @if($count == 0)
          <tbody>
              <tr class="clickable" data-toggle="collapse" data-target="#{{preg_replace("/[^A-Za-z0-9\-]/",'_',$menu_parent->title)}}" aria-expanded="false" aria-controls="group-of-rows-1">

                  <td><i class="fa fa-minus-square " aria-hidden="true"></i> {{$menu_parent->title}}</td>
                  @foreach($arr_permission as $key => $permission)
                  <td><input type="checkbox" name="{{$menu_parent->title}}" permission="{{$key}}" {{(isset($permission_list[$menu_parent->title][$key])&&$permission_list[$menu_parent->title][$key]==1)?"checked":""}} data-toggle="toggle" data-size="sm"></td>
                  @endforeach

              </tr>
          </tbody>
          @else
          <tbody>
              <tr class="clickable" data-toggle="collapse" data-target="#{{preg_replace("/[^A-Za-z0-9\-]/",'_',$menu_parent->title)}}" onclick="foggleElement(this,{{preg_replace("/[^A-Za-z0-9\-]/",'_',$menu_parent->title)}})" aria-expanded="false" aria-controls="group-of-rows-1">
                  <td><i class="fa fa-plus-square " aria-hidden="true"></i> {{$menu_parent->title}}</td>
              </tr>
          </tbody>
          <tbody id="{{preg_replace("/[^A-Za-z0-9\-]/",'_',$menu_parent->title)}}" class="collapse">
            
            @foreach($menu_children as $child)

              <tr>
                  <td>-{{$child->title}}</td>
                  @foreach($arr_permission as $key => $permission)
                  <td><input type="checkbox" name="{{$child->title}}" permission="{{$key}}" {{(isset($permission_list[$child->title][$key])&&$permission_list[$child->title][$key]==1)?"checked":""}}  data-toggle="toggle" data-size="sm"></td>
                  @endforeach
              </tr>

            @endforeach
          </tbody>
          @endif
        @endforeach
          {{-- <tbody>
              <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-2" aria-expanded="false" aria-controls="group-of-rows-2">
                  <td><i class="fa fa-plus" aria-hidden="true"></i> Setting</td>
                  
              </tr>
          </tbody>
          <tbody id="group-of-rows-2" class="collapse">
              <tr>
                  <td>- Departments</td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>  
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
              </tr>
              <tr>
                  <td>- Group</td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>  
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
              </tr>
              <tr>
                  <td>- Permission</td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>  
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
                  <td><input type="checkbox" checked data-toggle="toggle" data-size="sm"></td>
              </tr>
          </tbody> --}}
          
      </table>
    </div>
  </div>

</div>
@endsection
@section('script')
  <script>
    $("input[type='checkbox']").on('change',function(e){
      var id = $(this).attr('data-id');
      var status = '';      
      if(this.checked){
        status = 1;
      }else{
        status = 0;
      }
      $.ajax({
        url:"{{ route('ajax_update_status_permissions') }}",
        method:"post",
        data:{
          _token:"{{csrf_token()}}",
          id:id,
          status:status
        },
        success:function(data){
            if(data){
              toastr.success(data,'Success !!');              
            }
          },
          error:function(){
          toastr.error('Update Error','Error !!');
          },
      });

    });
    $(document).on('click','.toggle',function(){

      var permission = $(this).children('input').attr('permission');
      var name = $(this).children('input').attr('name');
      if($(this).children('input').prop('checked')==true){
        var checked = 1;
      }else
        checked = 0;
          
      var id = {{$id}};

      $.ajax({
        url: '{{route('set-permission')}}',
        type: 'post',
        dataType: 'html',
        data: {permission: permission,name:name,id:id,_token:"{{csrf_token()}}",checked:checked},
      })
      .done(function(data) {
        // console.log(data);
        if(data){
          toastr.success(data,'Success !!');              
        }
      })
      .fail(function() {
        toastr.error('Update Error','Error !!');
      });

      
      
    });

    $("#btn-save").click(function(){
        var name = $("#permission_name").val();
        $.ajax({
          url: '{{route('change-position-name')}}',
          type: 'POST',
          dataType: 'html',
          data: {name: name,_token:'{{csrf_token()}}',id:'{{$id}}'},
        })
        .done(function(data) {
          //console.log("success");
          if(data){
            toastr.success(data,'Success !!');              
          }
        })
        .fail(function() {
          toastr.error('Update Error','Error !!');
        });
        
      });
    $("#permission_name").keyup(function(event) {

      var name = $(this).val();
      var old_name = '{{$position->position_name}}';
      if(name === old_name)
        $("#btn-save").css('display', 'none');
      else
        $("#btn-save").css('display', 'inline');
    });


    function foggleElement(that,class_element){
      //$("#"+class_element).slideToggle(500);
      $(that).children().children('i').toggleClass('fa-plus-square fa-minus-square');
    }

  </script>
@stop