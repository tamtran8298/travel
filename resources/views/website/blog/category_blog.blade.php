@extends("website.layouts.master")
@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
<link href="{{ asset('admin/vendor/summernote/summernote-lite.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_4">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <h3>blog</h3>
          <p>Pixel perfect design with awesome contents</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ bradcam_area  -->


<!--================Blog Area =================-->
<section class="blog_area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="blog_left_sidebar">
          <div id="loadHere"></div>



          <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
              {{-- <li class="page-item">
                <a href="#" class="page-link" aria-label="Previous">
                  <i class="ti-angle-left"></i>
                </a>
              </li> --}}

              <?php
              $cout = 0; 
              for($i=0;$i<($count/3);$i++)
              {
                ?>
                <li class="page-item active">
                  <a href="#" class="page-link pageblog" page="{{ $i }}" topic="{{ $topic }}"  >{{ $i+1 }}</a>
                </li>
              <?php }
              ?>

              {{-- <li class="page-item">
                <a href="#" class="page-link" aria-label="Next">
                  <i class="ti-angle-right"></i>
                </a>
              </li> --}}
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="blog_right_sidebar">


          <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category</h4>
            <ul class="list cat-list">
              <li>
                @foreach( $category as $value)
                <a href="{{ route('loadCategoryBlog',$value->id_blog_category) }}" class="d-flex blogCategory">
                  <p>{{ $value->name }} </p>
                  <?php $num = 0; ?>
                  @foreach($blog as $key)

                  <?php


                  if (($key->topic)==($value->id_blog_category))
                  {
                    $num++ ;
                  } 
                  ?>

                  @endforeach
                  <p>  ({{ $num }})</p>
                </a>
                @endforeach
              </li>

            </ul>
          </aside>
          <aside class="single_sidebar_widget search_widget">
            <form action="{{ route('searchblog') }}" method="get">
              <div class="form-group">
                <div class="input-group mb-3">
                  <input type="text" name="key" class="form-control" placeholder='Search Keyword'
                  onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Search Keyword'">
                  <div class="input-group-append">
                    <button class="btn" type="button"><i class="ti-search"></i></button>
                  </div>
                </div>
              </div>
              <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
              type="submit">Search</button>
            </form>
          </aside>



          {{-- <aside class="single_sidebar_widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>

            <form action="#">
              <div class="form-group">
                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
              </div>
              <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
              type="submit">Subscribe</button>
            </form>
          </aside> --}}
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

@section('scripts')
<script>

  $(document).ready(function (){
    window.onload = callclick();

 });



  $(document).on('click','.pageblog',function(){

    var topic = $(this).attr('topic');
    var page = $(this).attr('page');

    loadblog(page,topic);



  });
  function callclick()
  {
    $('.pageblog').trigger('click');
  }



  function loadblog(num,topicid)
  {


    $.ajax({
      url:"{{ route('loadBlogBycategory') }}",
      method:'get',
      dataType:'json',
      data:{
        page:num,
        topicid:topicid
      },
      success : function(data){

        if(data.status ==1){
          var html ="";
          var month = new Array();
          month[0] = "January";
          month[1] = "February";
          month[2] = "March";
          month[3] = "April";
          month[4] = "May";
          month[5] = "June";
          month[6] = "July";
          month[7] = "August";
          month[8] = "September";
          month[9] = "October";
          month[10] = "November";
          month[11] = "December";
          for(var i = 0 ; i < data.data.length ; i++){
           var date =  new Date(data.data[i].updated_at);
           html+=`
           <article class="blog_item"> 
           <div class="blog_item_img">
           <img class="card-img rounded-0" src="../`+ data.data[i].img+` " alt="">

            
           <a href="#" class="blog_item_date"> 
           <h3>`+date.getDate()+`</h3> <p>`+month[date.getMonth()]+`</p></a>
           </div> 
           <div class="blog_details"> 
           <a class="d-inline-block" href="/single/`+data.data[i].id+`">
           <h2>`+ data.data[i].title +`</h2> </a>
           <p>`+ data.data[i].description+`</p>
           <ul class="blog-info-link"> 
           <li><a href="#"><i class="fa fa-list-alt"></i>`+data.data[i].category_blog+`</a></li>

           </ul> 
           </div>
           </article>`;
         }
       }
       document.getElementById("loadHere").innerHTML = html;
     },

   });
  }
</script>
@endsection

