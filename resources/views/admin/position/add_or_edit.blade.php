@extends('admin.layouts.app')
@section('title','Position '.$name)
@section('style')
@stop
@section('content')
<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">{{$name}} Position</h6>
      </div>
      <div class="card-body">
         <form role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-lg-12">
                  <div class="form-group row">
                     <label class="col-lg-2 col-form-label form-control-label">Name</label>
                     <div class="col-lg-9">                     
                        <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{isset($position->position_name) ? $position->position_name : old('name')}}" placeholder="name" />
                     </div>                                 
                  </div>
                  
                 {{--  @if ($name == 'Edit')                     
                  
                  <div class="form-group row">
                     <label class="col-lg-2 col-form-label form-control-label">Manager</label>
                     <div class="col-lg-9">                     
                        <select name="manager" id="" class="form-control">
                           @foreach ($position->user as $element)                             
                          
                           <option {{$element->id == $position->manager_user_id ? 'selected' : ''}} value="{{$element->id}}">{{$element->fullname}}</option>   

                           @endforeach                        
                        </select>
                     </div>                 
                  </div>

                  @endif --}}                   
                  
               </div>               
            </div>
            <div class="form-group row">
               <label class="col-lg-2 col-form-label form-control-label"></label>
               <div class="col-lg-9">                     
                  <a href="{{ route('position-list') }}" class="btn btn-secondary">Cancel</a>
                  <input type="submit" class="btn btn-primary" value="Save Changes" />
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="js/upload_avatar.js"></script>
@stop