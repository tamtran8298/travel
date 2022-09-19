@extends('admin.layouts.app')
@section('title','Category '.$name)
@section('style')
@stop
@section('content')
<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">{{$name}} Danh mục</h6>
      </div>
      <div class="card-body">
         <form role="form" method="post" >
            @csrf
            <div class="row">
               <div class="col-lg-9">
                  <div class="form-group row">
                     <label class="col-lg-2 col-form-label form-control-label">Tên danh mục</label>
                     <div class="col-lg-6">                     
                        <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{isset($category->name) ? $category->name : old('name')}}" placeholder="Tên danh mục" />
                     </div>
                  </div>
               </div>

            </div>
            <div class="row">
               
               <div class="col-lg-9">      
                  <label class="col-lg-2 col-form-label form-control-label"></label>               
                  <a href="{{ route('category') }}" class="btn btn-secondary">Hủy</a>
                  <input type="submit" class="btn btn-primary" value="Lưu danh mục" />
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('script')

@stop