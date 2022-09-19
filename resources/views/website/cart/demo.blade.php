@extends("website.layouts.master")
@section("content")

{{-- <script src="{{asset('website/js/jquery-1.11.3.min.js')}}"></script> --}}
{{-- <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="jquery.date-dropdowns.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
 --}}

    <div class="destination_details_tour_info">

        <div class="container">
            <div class="col-xs-12 mg-bot30">
            <div class="single_content">CHI TIẾT TOUR</div>
        </div>
            <div class="row {{-- justify-content-center --}}">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="destination_info">
                        <img src="{{asset($ValueTour->image)}}" width="262"  height="176">
                    </div>
                </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="destination_price">
                    <h4 class="ten_sp" style="padding: 13px; border-top:1px dotted #eae8e8; border-bottom: 1px dotted #eae8e8;">{!!$ValueTour->name!!}</h4>
                    <div style="margin-bottom: 20px;">

                    
                    <div class="row ">
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                    <p><i class="fa fa-barcode" aria-hidden="true"></i> MÃ TOUR: {{ $ValueTour->tour_id }}</p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Thời gian: {{ $ValueTour->tour_date }} Ngày</p>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> Ngày khởi hành: 
                        {{ $ValueTour->date_start }}</p>
                    </div>
                    <div class="col-sm-6 p5">
                    {{-- <p><i class="fa fa-car" aria-hidden="true"></i> Phương tiện di chuyển: {{ $ValueTour->transport }}</p> --}}
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> Nơi khởi hành: {{ $ValueTour->place_start }}</p>
                    <p><i class="fa fa-calendar-o" aria-hidden="true"></i> <a href="https://hoangkhoitravel.com/index.php?com=search&textsearch=tour-du-lich-phu-quoc-3-ngay-2-dem"><b>Ngày khác</b></a></p>
                    <p style="margin-bottom: 0px;"><b>GIÁ TOUR:</b> <strong class="gia-tour">  {{ number_format($ValueTour->price) }}</strong> vnđ<br>
                    </p>
                    </div>
                    </div>

                   {{--  <hr style="margin-top: 10px;margin-bottom: 10px;border-color: #eae8e8;">
                    <div class="row m-10">
                    <div class="col-sm-8">
                    <p style="margin-bottom: 0px;"><b>GIÁ TOUR:</b> <strong class="gia-tour">  {{ number_format($ValueTour->price) }}</strong> vnđ<br>
                    
                    </div> --}}
                    <div class="col-sm-4">
                    
                    </div>
                    </div>
                    
                    
                    
                    </div>

                    </div>
                    </div>
                    <p style=" border-left-color: red; background-color:  #eae8e8; padding-bottom: 20px;padding-top:15px;padding-left: 15px;   ">
                        Khách nữ từ 55 tuổi trở lên, khách nam từ 60 tuổi trở lên đi tour một mình và khách mang thai trên 4 tháng (16 tuần) vui lòng đăng ký tour trực tiếp tại văn phòng của Vietravel. Không áp dụng đăng ký tour online đối với khách từ 70 tuổi trở lên
                    </p>
                </div>
            
        </div>
   
   <div class="destination_details_tour_info">
   <div class="container">
            {{-- <div class="row justify-content-center"> --}}
        <div class="col-xs-12 mg-bot30">
            <div class="single_content">GIÁ TOUR CƠ BẢN</div>
        </div>
        <div class="col-xs-12 mg-bot30">
            <table class="table table-bordered">
                <thead>
                    <tr class="tb-title">
                        <td>Người lớn (Từ 12 tuổi trở l&#234;n)</td>
                        <td>Trẻ em (Từ 5 tuổi đến dưới 12 tuổi)</td>
                        <td>Trẻ nhỏ (Từ 2 tuổi đến dưới 5 tuổi)</td>
                        <td>Em b&#233; (Dưới 2 tuổi)</td>
                        <td>Phụ thu ph&#242;ng đơn</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-title="Người lớn">{{ number_format($ValueTour->price) }}<span> đ</span></td>
                        <td data-title="Trẻ em">{{ number_format(($ValueTour->price)*0.8) }}<span> đ</span></td>
                        <td data-title="Trẻ nhỏ">{{ number_format(($ValueTour->price)*0.1) }}<span> đ</span></td>
                        <td data-title="Em bé;">{{ number_format(($ValueTour->price)*0.05) }}<span> đ</span></td>
                        <td data-title="Phụ thu ph&#242;ng đơn">600,000<span> đ</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <div class="destination_details_tour_info">

        <div class="container">
            <div class="col-xs-12 mg-bot30">
            <div class="single_content">THÔNG TIN LIÊN LẠC</div>
        </div>
        <form role="form" method="post" enctype="multipart/form-data">
            @csrf
        <div class="col-xs-12 form-input mg-bot30">
            
            <div class="row">
                
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Họ tên (<span class="star">*</span>)</label>
                        <div>
                            <input class="form-control" id="contact_name" name="contact_name" required="required" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Di động (<span class="star">*</span>)</label>
                        <div>
                            <input class="form-control" id="mobilephone" name="mobilephone" onchange="CheckMobile();" onkeypress="return funCheckInt(event)" required="required" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <div>
                            <input class="form-control" id="address" name="address" type="text" value="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Email (<span class="star">*</span>)</label>
                        <div>
                            <input class="form-control" id="email" name="email" required="required" type="email" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Điện thoại</label>
                        <div>
                            <input class="form-control" id="phone" name="phone" onkeypress="return funCheckInt(event)" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row" >
                            <div class="col-md-3 col-sm-2 col-xs-6 mg-bot15">
                                <label>Người lớn</label>
                                <div>
                                    <input class="form-control" id="adult" name="adult" type="text" value="1" onkeyup="sum()" onclick="sum()" />
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-6  mg-bot15">
                                <label>Trẻ em</label>
                                <div>
                                    <input class="form-control" id="children11" name="children11" type="text" value="0" onkeyup="sum()" />
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6  mg-bot15">
                                <label>Trẻ nhỏ</label>
                                <div>
                                    <input class="form-control" id="children" name="children" type="text" value="0" onkeyup="sum()"/>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-6 mg-bot15">
                                <label>Em bé</label>
                                <div>
                                    <input class="form-control" id="small_children" name="small_children" type="text" value="0" onkeyup="sum()" />
                                </div>
                            </div>
                            {{-- <div class="col-md-2 col-sm-2 col-xs-6 mg-bot15">
                                <label>Em bé</label>
                                <div>
                                    <input class="form-control" id="small_children" name="small_children" onblur="javascript:clear_text(this);" onclick="javascript:show_text(&#39;Dưới 2 tuổi&#39;,this)" onkeypress="return funCheckInt(event)" type="text" value="0" />
                                </div>
                            </div> --}}

                            <?php
                                $numpeople =0;
                            ?>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Số khách</label>
                                    
                                <div >
                                    <input class="form-control" id="guests" name="guests" readonly="readonly" type="text" value="1"  />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <div>
                            <textarea class="form-control" cols="20" id="note" name="note" rows="4" value="">
                            </textarea>
                        </div>
                    </div>
                      
                    <div>
                        <input type="text" name="idtour" value="{{  $ValueTour->id}}" hidden>
                    </div>
                </div>
                {{-- </form> --}}
                <div class="container">
    <div  id="result"></div>
</div>
            </div>
        </div>
    </div>




{{-- add table customer --}}


{{-- add bnt submit --}}

<script type="text/javascript">
    
window.onload = function()
{
    sum();
};
    function sum() 
    {
        var adult = document.getElementById("adult");
        var children11 = document.getElementById("children11");
        var children = document.getElementById("children");
        var small_children = document.getElementById("small_children");
        var guests = document.getElementById("guests");
        

        var SumValue= parseInt(adult.value)+parseInt(children11.value)+parseInt(children.value)+parseInt(small_children.value);


        if (!isNaN(SumValue)){
          guests.value = SumValue;
        }
        showform();
    }
    function sumprice()
    {   
        var guests = document.getElementById("guests");
        var totalPrice = parseFloat('0');
        var count = parseInt('1');
        while (count<=guests.value)
        {
        
        var id = 'spanprice'+count;
        var value = document.getElementById(id).innerHTML;

        value = parseFloat(value);
        totalPrice = totalPrice+value;
        count++;
        }
        var total = document.getElementById("TotalAllPrice");
        if (!isNaN(totalPrice)){
          total.value = totalPrice;
        }
        $('#spanTotalPrice').html(totalPrice);
    }
    function SelectBox(num){

        var personkind = '#personkind'+num;
        var spanprice = '#spanprice'+num;
        var idroom = 'loaiphuthuphongdon'+num;
        var hiddenspanprice = 'spanprice1'+num;
        document.getElementById(idroom).value =0;
        var option = personkind+' option:selected';
        var total = document.getElementById(hiddenspanprice);
        

        var price = parseFloat({{$ValueTour->price}});
        
        $(personkind).change(function(){
            
            var a = $(option);
            a = parseFloat(a.val());
            price= price* a;
            $(spanprice).html(price);
            if (!isNaN(price)){
          total.value = price;
        }

        });
        
        
        sumprice();
         
        }
    function SelectRoom(num){
    
    var idroom = '#loaiphuthuphongdon'+num;
    var hiddenspanprice = 'spanprice1'+num;
    var spanprice = '#spanprice'+num;
    var option = idroom+' option:selected';
    var total = document.getElementById(hiddenspanprice);
    var price = total.value;
    price = parseFloat(price);
    $(idroom).change(function(){
        
        var a = $(option);
        a = parseFloat(a.val());
        price= price + a;
        $(spanprice).html(price);
        if (!isNaN(price)){
          total.value = price;
      }
    });
    
    
    sumprice();
     
    }
    
    function showform(){
        var guests = document.getElementById("guests");
        var count =0;
        var price = parseFloat({{$ValueTour->price}});
        var totalPrice = parseFloat('0');
        var html = '';
        if(guests.value != 0)
        {
        var html ='';
        html +=`
        
        <div class="destination_details_tour_info" style="padding-bottom: 15px";>
        <div class="col-xs-12 mg-bot30">
                <div class="single_content">DANH SÁCH KHÁCH HÀNG ĐI TOUR</div>
            </div>`;
        }
        var sumall =0;
        sumall = parseInt(sumall);
        while (count<guests.value)
        {
            count += 1;
            html +=`
            
            
            <div class="col-xs-12 mg-bot30 list">
<div>
        <div class="cus-num">Khách hàng `;
        html += count;
        html += `</div>
        <div class="frame-cus">
            <div class="form-horizontal">
                <div class="row mg-bot10">

                    <div class="col-lg-4 ">
                        <label class="mg-bot5">Họ tên (<span class="star">*</span>)</label>
                        <div>
                            <input class="form-control" style="width = 100%" name="fullname`;html += count;
                                 html += `" required="" type="text" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 " style="padding-right:10px;">
                        <label class="mg-bot5">Giới tính</label>
                        <div>
                            <select class="form-control" name="gender`;html += count;
html += `"><option value="Nữ">Nữ</option>
                                <option value="Nam">Nam</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <label class="mg-bot5">Ngày sinh (<span class="star">*</span>)</label>
                        <div >
                            <input data-val="true" data-val-date="The field dateofbirth must be a date." id="dateofbirth0" name="dateofbirth`;html += count;
html += `" type="hidden" value="">
                            <div class="date-dropdowns"><input type="hidden"  id="dob0" name="dob0"><select style="width: 33.3333%; float: left; padding-left: 5px; padding-right: 5px" required="required" class="day hideArow form-control dateDDL" name="dobday`;html += count; html +=`" id="dob0_day">
                            <option value="">Ngày</option>
                            <option value="01">1</option>
                            <option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select style="width: 33.333%; float: left;" required="required" class="month hideArow form-control dateDDL" name="dobmonth`;html += count; html +=`" id="dob0_month"><option value="">Tháng</option><option value="01">Tháng 1</option><option value="02">Tháng 2</option><option value="03">Tháng 3</option><option value="04">Tháng 4</option><option value="05">Tháng 5</option><option value="06">Tháng 6</option><option value="07">Tháng 7</option><option value="08">Tháng 8</option><option value="09">Tháng 9</option><option value="10">Tháng 10</option><option value="11">Tháng 11</option><option value="12">Tháng 12</option></select>
                            <select style="width: 33.33333%; float: left;" required="required" class="year hideArow form-control dateDDL" id="dob0_[year]" name="dobyear`;html += count; html +=`"><option value="">Năm</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option></select></div>
                            
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="mg-bot5">Độ tuổi</label>
                        <div>
<select onclick="SelectBox(`;html += count;
html += `);" class="form-control" id="personkind`;html += count;
html += `" name="personkind`;html += count;
html += `" >
<option value="1">Người lớn</option>
<option value="0.8">Trẻ em</option>
<option value="0.1">Trẻ nhỏ</option>
<option value="0.05">Em bé</option>
</select></div>
</div>
                    <div class="col-lg-6">
                        <label class="mg-bot5">Phòng đơn</label>
                        <div>
<select  onclick="SelectRoom(`;html += count;
html += `);" class="form-control" id="loaiphuthuphongdon`;html += count;
html += `" name="loaiphuthuphongdon`;html += count;
html += `" ><option selected="selected" value="0">Không</option>
<option value="600000">Có</option>
</select>                        </div>
                    </div>
                </div>
                <br>
                <div class="row total">
                    <div class="col-md-12 col-sm-12 text-right">
                        Trị giá: <span onchange="totalAllPrice()" class="price" id="spanprice`;html += count;
html += `" name="spanprice`;html += count;
html += `">`; html+= price;html+=`</span>

<input type="text" hidden="" id="spanprice1`;html += count;html += `" name="spanprice1`;html += count;html += `" value=`;
                        
                        html += price;
                        html+=`>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>`;
totalPrice += price;
        }
        html += `<div class="frame-cus">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-right">
                Tổng cộng: <span class="price" id="spanTotalPrice" name="spanTotalPrice">`;
                        
                        html += totalPrice;
                        html+=`</span>
                <input type="text" hidden="" id="TotalAllPrice" name="TotalAllPrice"  class="form-control" value=`;
                        
                        html += totalPrice;
                        html+=`>
            </div>
        </div>

    </div>
    <div class="button_submit_add">
    <div class="submit_btn" style="text-align: center;">
        <input type="submit" class="boxed-btn4" value="Thêm Tour" />                
    </div>
</div>
    </form>`;
    document.getElementById("result").innerHTML = html;

}



</script>

{{-- <script type="text/javascript">
    $("#postform").on("submit", function(e) {
        e.preventDefault();
        var form = $('#editForm')[0];
        var form_data = new FormData(form);
        $.ajax({
            url: "{{ route('postEdittour') }}",
            method: "post",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    $("#editModal").modal("hide");
                    toastr.success("Edit tour Success!");
                    table.draw();
                }
            },
            error: function() {
                toastr.error("Failed to edit tour!");
            }
        });
    });
</script>   --}}

      



@endsection