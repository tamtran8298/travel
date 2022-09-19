@extends('admin.layouts.app')
@section('title','User '.$name)
@section('style')
@stop
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$name}} User</h6>
        </div>
        <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label">Full name</label>
                            <div class="col-lg-4">
                                <input required="" class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname" value="{{isset($user->fullname) ? $user->fullname : old('fullname')}}" placeholder="Fullname" />
                            </div>
                            <label class="col-lg-2 col-form-label form-control-label">DOB</label>
                            <div class="col-lg-4">
                                <input required="" class="form-control @error('birthday') is-invalid @enderror" type="date" name="birthday" value="{{isset($user->birthday) ? $user->birthday : old('birthday')}}" placeholder="Birthday" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-4">
                                <input required="" class="form-control @error('phone') is-invalid @enderror" type="text" onkeypress="return isNumberKey(event)" name="phone" value="{{isset($user->phone) ? $user->phone : old('phone')}}" placeholder="Phone" />
                            </div>
                            <label class="col-lg-2 col-form-label form-control-label">Start date</label>
                            <div class="col-lg-4">
                                <input required="" class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" value="{{isset($user->start_date) ? $user->start_date : old('start_date')}}" placeholder="Start date" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label">Username</label>
                            <div class="col-lg-4">
                                <input required="" class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{isset($user->username) ? $user->username : old('username')}}" placeholder="Username" />
                            </div>
                            <label class="col-lg-2 col-form-label form-control-label">Email</label>
                            <div class="col-lg-4">
                                <input required="" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email" type="email" value="{{isset($user->email) ? $user->email : old('email')}}" />
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label">Position</label>
                            <div class="col-lg-4">
                                <select required="" class="form-control" name="position">
                                    <option value="">Select Position</option>
                                    @foreach ($position as $element)
                                    <option @if(isset($user)) {{($element->id == $user->user_position_id) ? 'selected' : ''}} @endif value="{{$element->id}}">{{$element->position_name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <label class="col-lg-2 col-form-label form-control-label">Department</label>
                            <div class="col-lg-4">
                                <select required="" class="form-control" name="department">
                                    <option value="">Select Department</option>
                                    @foreach ($department as $element)
                                    <option @if(isset($user)) {{($element->id == $user->user_department_id) ? 'selected' : ''}} @endif value="{{$element->id}}">{{$element->department_name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{--
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label">Address</label>
                            <div class="col-lg-10">
                                <input required="" class="form-control @error('address') is-invalid @enderror" type="text" value="{{isset($user->state_address) ? $user->state_address : old('address')}}" name="address" placeholder="Address" />
                            </div>
                            {{-- <label class="col-lg-1 col-form-label form-control-label">City</label> --}}
                            {{-- <div class="col-lg-3">
                                <select class="form-control" name="city">
                                    <option>Select City</option>
                                    <option>Hồ Chí Minh</option>
                                    <option>Đồng Nai</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col-lg-12 text-xs-center">
                            <img style="width: 150px;height: 150px;" src="@if(isset($user->image))
                       {{($user->image =='null') ? '//placehold.it/150/' : 'upload/user_profile/'.$user->image}}
                     @else {{'//placehold.it/150/'}} @endif" class="m-x-auto img-fluid img-circle" alt="avatar" />
                            <h6 class="m-t-2">Upload a different photo</h6>
                            <label class="custom-file col-md-8">
                                <span id="choose_file" class="form-control">Choose file</span>
                                <input accept="image/*" type="file" id="file" name="avatar" class="custom-file-input">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <a href="{{ route('user-list') }}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" class="btn btn-primary" value="Save Changes" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/js/upload_avatar.js') }}"></script>
{{-- <script>
$(document).ready(function() {
    $("#sms_send_event_template_id").change(function(event) {
        var id = $("#sms_send_event_template_id option:selected").val();
        $.ajax({
                url: '{{route('
                get - content - template ')}}',
                type: 'GET',
                dataType: 'html',
                data: { id: id },
            })
            .done(function(data) {
                $("#sms_message").text(data);
                console.log(data);
            })
            .fail(function() {
                console.log("error");
            });
    });
});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

</script> --}}
@stop
