@extends("website.layouts.master")
@section('content')
<div class="ro-section ro-padding-top ro-reservation-bg">
    <div class="container">
        <div class="col-xs-12 ro-reservation-heading">
            <h3 class="ro-hr-heading ro-section-mb">RESERVATION</h3>
        </div>
        <div class="ro-reservation clearfix">
            <div class="row">
                <div class="col-xs-12 text-center ro-font-size-4 ro-light-text ro-section-mb"><i>
                        Please book in advance to get the best service from us. We wishing you a great day.
                        <br>
                        Thanks!</i></div>
                <div class="col-md-10 col-md-offset-1 col-xs-12 ro-section-mb-small">
                    <form name="special-form" method="post" class="ro-form ro-reservation-form clearfix">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Name" name="name" required="required" />
                                <input type="email" placeholder="Email" name="email" required="required" />
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Phone" name="phone" required="required" />
                                    </div>
                                    {{-- <div class="col-md-7">
                                        <input type="text" name="date" placeholder="Date" required="required" class="ro-date-picker" />
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="date" placeholder="Date" required="required" class="ro-date-picker" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea placeholder="Description" name="description" required="required"></textarea>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="SEND" class="ro-btn-2 ro-submit" />
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="col-xs-12 ro-section-mb-big">
                    <div class="ro-font-size-4 text-center"><b>Opentime:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8:00am -11:30am&nbsp;&nbsp;/&nbsp;&nbsp;2:00pm-5:30pm&nbsp;&nbsp;/&nbsp;&nbsp;7:00pm-10:00pm</b></div>
                </div> --}}
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="load-post">
            </div>
            <div class="col-lg-12">
                <div class="ro-blog-article">
                    <div class="ro-loading"><a href="#" class="btn-load-more" page="1">LOAD MORE ...</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    var slug = null;
    var page = 0;
    getByPage(page, slug);
    $(".btn-load-more").on('click', function(e) {
        e.preventDefault();
        page = $(this).attr('page');
        getByPage(page, slug);
        page++;
        $(this).attr('page', page);
    })


    $("form[name='special-form']").on('submit', function(e) {
        e.preventDefault();
        var form = $(this)[0];
        var formData = new FormData(form);

        $.ajax({
            url: "{{route('website.special.postForm')}}",
            method: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.status) {
                    form.reset();
                    alert("Send successfully!");
                } else {
                    alert('Failed to send');
                }
            }
        })
    })
});

function getByPage(page, slug) {
    $.ajax({
        url: "{{ route('website.special.getPostByPage') }}",
        data: { page, slug },
        dataType: "json",
        success: function(data) {
            if (data.status) {
                var html = '';
                for (var i = 0; i < data.data.length; i++) {
                    html += '<div class="col-lg-12">' +
                        '<div class="ro-blog-article ro-preview"><a href="blog-article1.html" class="ro-title">' + data.data[i].title + '</a>' +
                        data.data[i].description +
                        '<div class="ro-detail">' +
                        '<span>Posted:&nbsp;<a >' + data.data[i].created_at + '</a></span>' +
                        // '<span>By:&nbsp;<a href="#">admin</a></span><span>Comment:&nbsp;<a href="#">20</a></span>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                }
                $(".load-post").append(html);
            }
        }
    })
}

</script>
@endsection
