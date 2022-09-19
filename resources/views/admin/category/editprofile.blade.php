@extends('admin.layouts.app')
@section('title','Edit profile')
@section('content')
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
   </div>
   <!-- Content Row -->
   <div class="container-fluid">
      <div class="row m-y-2">
         <!-- edit form column -->
         <div class="col-lg-4 text-lg-center">
            {{-- 
            <h2>Edit Profile</h2>
            --}}
         </div>
         <div class="col-lg-8">
            
         </div>
         <div class="col-lg-8 push-lg-4 personal-info">
            <form role="form" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Full name</label>
                  <div class="col-lg-6">                     
                     <input required="" class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname" value="{{$user->fullname}}" placeholder="Fullname" />
                  </div>
                  <div class="col-lg-3">
                     <input required="" class="form-control @error('date') is-invalid @enderror" type="date" name="birthday" value="{{$user->birthday}}" placeholder="Birthday" />
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Email</label>
                  <div class="col-lg-9">
                     <input disabled="" class="form-control" type="email" value="{{$user->email}}" />
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Address</label>
                  {{-- 
                  <div class="col-lg-9">
                     <input class="form-control" type="text" value="" placeholder="Street" />
                  </div>
                  --}}
                  <div class="col-lg-6">
                     <input required="" class="form-control @error('city_address') is-invalid @enderror" type="text" value="{{$user->city_address}}" name="city_address" placeholder="City" />
                  </div>
                  <div class="col-lg-3">
                     <input required="" class="form-control @error('state_address') is-invalid @enderror" type="text" value="{{$user->state_address}}" name="state_address" placeholder="State" />
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Username</label>
                  <div class="col-lg-9">
                     <input disabled="" class="form-control" type="text" value="{{$user->username}}" />
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Password</label>
                  <div class="col-lg-9">
                     <input class="form-control @error('password') is-invalid @enderror" type="password" value="" name="password" />                     
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                  <div class="col-lg-9">
                     <input class="form-control @error('new_password') is-invalid @enderror" type="password" value="" name="new_password" />
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Confirm New Password</label>
                  <div class="col-lg-9">
                     <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" value="" name="confirm_password" />
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"></label>
                  <div class="col-lg-9">                     
                     <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                     <input type="submit" class="btn btn-primary" value="Save Changes" />
                  </div>
               </div>
         </div>
         <div class="col-lg-4 pull-lg-8 text-xs-center">
         <img style="width: 150px;height: 150px;" src="{{($user->image =='null') ? '//placehold.it/150/' : 'upload/user_profile/'.$user->image}}" class="m-x-auto img-fluid img-circle" alt="avatar" />
         <h6 class="m-t-2">Upload a different photo</h6>
         <label class="custom-file col-md-8">
         <span id="choose_file" class="form-control">Choose file</span>
         <input accept="image/*" type="file" id="file" name="avatar" class="custom-file-input">
         </label>
         </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="js/upload_avatar.js"></script>
@endsection