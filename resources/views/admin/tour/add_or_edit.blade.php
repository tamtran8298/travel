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
         <h6 class="m-0 font-weight-bold text-primary">{{$name}} Tour Du Lịch</h6>
      </div>
      <div class="card-body">
         <form role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-lg-8 push-lg-4 personal-info">
            <div class="row">
               <div class="col-lg-12">
                  <div class="form-group row">
                     <label class="col-lg-2 col-form-label form-control-label">Tên</label>
                     <div class="col-lg-4">                     
                        <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{isset($tour->name) ? $tour->name : old('name')}}" placeholder="Tên Tour" />
                     </div>
                     
                     <label class="col-lg-2 col-form-label form-control-label">Danh mục</label>
                     <div class="col-lg-4">                     
                        <select class="form-control" name="type_tour" id="">
                           @foreach ($type_tour as $element)
                               <option 
                               @if(isset($tour->tour_type_tour_id))
                               @if ($tour->tour_type_tour_id == $element->id)
                                 {{'selected'}}
                               @endif 
                               @endif
                               value="{{$element->id}}">{{$element->name}}</option>
                           @endforeach
                        </select>
                     </div>

                     


                  </div>
               </div>
            </div>

            


            <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Mã Tour</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="tour_id" value="" placeholder="Mã Tour" />
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">PT Di Chuyển</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="transport" value="" placeholder="Phương Tiện Di Chuyển" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Thời Gian</label>
                                                <div class="col-lg-4">                     
                                                   <input required="" class="form-control @error('date') is-invalid @enderror" type="text" name="date" value="{{isset($tour->price) ? $tour->price : old('name')}}" placeholder="Số Ngày" />
                                                </div>
                                                <label class="col-lg-2 col-form-label form-control-label">Nơi Khởi Hành</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="place_start" value="" placeholder="Nơi Khởi Hành" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label form-control-label">Ngày Khởi Hành</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('name') is-invalid @enderror" type="text" name="date_start" value="" placeholder="Ngày Khởi Hành" />
                                                </div>

                                                
                                                <label class="col-lg-2 col-form-label form-control-label">Giá</label>
                                                <div class="col-lg-4">
                                                    <input required="" class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="" placeholder="Giá" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>


            
            </div>
            <div class="col-lg-4 pull-lg-8 text-xs-center">
               <img style="" src="{{(!isset($tour->image)) ? '//placehold.it/150/' : asset("upload/images").'/'.$tour->image}}" class="m-x-auto img-fluid " alt="avatar" />
               <h6 class="m-t-2">Upload a different photo</h6>
               <label class="custom-file col-md-8">
               <span id="choose_file" class="form-control">Chọn hình</span>
               <input accept="image/*" type="file" id="file" name="image" class="custom-file-input">
               </label>
            </div>
            </div>


            <div class="col-lg-12  personal-info">
               <label class="col-lg-12 col-form-label form-control-label">Giới thiệu</label>
               <div class="col-lg-12">                     
                        <textarea id="summernote" name="description" class="form-control" rows="12" cols="50" placeholder="Chi Tiết Về Tour Du Lịch"></textarea>
               </div>
               <br>
               <div class="form-group row">
               
               <div class="col-lg-9">  
               <label class="col-lg-2 col-form-label form-control-label"></label>                   
                  <a href="{{ route('tour') }}" class="btn btn-secondary">Hủy</a>
                  <input type="submit" class="btn btn-primary" value="Thêm Tour" />
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
