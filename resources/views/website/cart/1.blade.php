html +=`
            
            
            <div class="col-xs-12 mg-bot30 list">
<div>
        <div class="cus-num">Khách hàng `;
        html += cout;
        html += `</div>
        <div class="frame-cus">
            <div class="form-horizontal">
                <div class="row mg-bot10">
                    <div class="col-lg-4 ">
                        <label class="mg-bot5">Họ tên (<span class="star">*</span>)</label>
                        <div>
                            <input class="form-control" style="width = 100%" name="[`;html += cout;
                                 html += `].fullname" required="" type="text" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 " style="padding-right:10px;">
                        <label class="mg-bot5">Giới tính</label>
                        <div>
                            <select class="form-control" name="[`;html += cout;
html += `].gender"><option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <label class="mg-bot5">Ngày sinh (<span class="star">*</span>)</label>
                        <div >
                            <input data-val="true" data-val-date="The field dateofbirth must be a date." id="dateofbirth0" name="[`;html += cout;
html += `].dateofbirth" type="hidden" value="">
                            <div class="date-dropdowns"><input type="hidden" id="dob0" name="dob0"><select style="width: 33.3333%; float: left; padding-left: 5px; padding-right: 5px" class="day hideArow form-control dateDDL" name="dob`;html += cout; html +=`_[day]" id="dob0_day"><option value="">Ngày</option><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select style="width: 33.333%; float: left;" class="month hideArow form-control dateDDL" name="dob`;html += cout; html +=`_[month]" id="dob0_month"><option value="">Tháng</option><option value="01">Tháng 1</option><option value="02">Tháng 2</option><option value="03">Tháng 3</option><option value="04">Tháng 4</option><option value="05">Tháng 5</option><option value="06">Tháng 6</option><option value="07">Tháng 7</option><option value="08">Tháng 8</option><option value="09">Tháng 9</option><option value="10">Tháng 10</option><option value="11">Tháng 11</option><option value="12">Tháng 12</option></select><select style="width: 33.33333%; float: left;" class="year hideArow form-control dateDDL" name="dob0_[year]" id="dob`;html += cout; html +=`_year"><option value="">Năm</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option></select></div>
                            
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="mg-bot5">Độ tuổi</label>
                        <div>
<select class="form-control" id="personkind`;html += cout;
html += `" name="[`;html += cout;
html += `].personkind" onchange="Changechoose(`;html += cout;
html += `);">
<option value="1">Người lớn</option>
<option value="0.8">Trẻ em</option>
<option value="0.1">Trẻ nhỏ</option>
<option value="0.05">Em bé</option>
</select></div>
</div>
                    <div class="col-lg-6">
                        <label class="mg-bot5">Phòng đơn</label>
                        <div>
<select class="form-control" id="loaiphuthuphongdon.`;html += cout;
html += `" name="[`;html += cout;
html += `].loaiphuthuphongdon" onchange="ChangeChoose1(`;html += cout+ ',' + price;
html += `);"><option selected="selected" value="0">Không</option>
<option value="600000">Có</option>
</select>                        </div>
                    </div>
                </div>
                <br>
                <div class="row total">
                    <div class="col-md-12 col-sm-12 text-right">
                        Trị giá: <span class="price" id="spanprice`;html += cout;
html += `">10</span>
                        
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
                Tổng cộng: <span class="price" id="spanTotalPrice">`;
                        html += totalPrice;
                        html+=`</span>
                <input type="hidden" id="TotalPrice" disabled="disabled" class="form-control" />
            </div>
        </div>

    </div>`;
    document.getElementById("result").innerHTML = html;