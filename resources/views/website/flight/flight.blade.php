
@extends("website.layouts.master")

@section("content")

{{-- <iFrame src= "https://sanvemaybay.vn/" width="100%" height="480" allowfullscreen></iFrame> --}}
<iFrame src= "{{ $flight->url }}" width="100%" height="480" allowfullscreen></iFrame>

@endsection