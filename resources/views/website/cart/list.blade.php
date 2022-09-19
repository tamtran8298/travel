<div class="destination_details_tour_info" id="aaa">

        <div class="container">
        
        <div id="DanhSachKhach">
            <div class="col-xs-12 mg-bot30">
                <div class="single_content">DANH SÁCH KHÁCH HÀNG ĐI TOUR 1</div>
                
            </div>
            <div class="col-xs-12 mg-bot30 list">
                


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="jquery.date-dropdowns.min.js"></script>

<div>
        <div class="cus-num">Khách hàng</div>
        <div class="frame-cus">
            <div class="form-horizontal">
                <div class="row mg-bot10">
                    <div class="col-lg-3 col-md-8 col-sm-6 col-xs-12 mg-bot10">
                        <label class="mg-bot5">Họ tên (<span class="star">*</span>)</label>
                        <div>
                            <input class="form-control-of-tour" name="[0].fullname" required="required" type="text" value="" />
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                        <label class="mg-bot5">Giới tính</label>
                        <div>
                            <select class="form-control-of-tour" name="[0].gender">
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                        <label class="mg-bot5">Ngày sinh (<span class="star">*</span>)</label>
                        <div>
                            <input data-val="true" data-val-date="The field dateofbirth must be a date." id="dateofbirth0" name="[0].dateofbirth" type="hidden" value="" />
                            <input type="hidden" id="dob0" />
                            <script>
                                    $("#dob" + '0').dateDropdowns({
                                        submitFieldName: 'dob' + '0',
                                        submitFormat: "dd/mm/yyyy",
                                        maxAge: 68
                                        //,required: true
                                    });
                                    $('#dob' + '0').change(function () {
                                        $('#dateofbirth' + '0').val($('#dob' + '0').val());
                                        CheckDOBByPersonkind();
                                    });
                            </script>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                        <label class="mg-bot5">Độ tuổi</label>
                        <div>
                    <select class="form-control-of-tour" id="personkind0" name="[0].personkind" onchange="ChangeChoose();"><option value="0">Người lớn</option>
                    </select>


                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mg-bot10" style="display:none;">
                        <label class="mg-bot5">Loại kh&#225;ch:</label>
                        <div>
                            <select class="form-control" id="loaikhachnoidia0" name="[0].loaikhachnoidia" onchange="ChangeChoose();"><option value="0">Việt Nam</option>
                            <option value="1">Việt kiều</option>
                            <option value="2">Nước ngo&#224;i</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                        <label class="mg-bot5">Phòng đơn</label>
                        <div>
                        <select class="form-control-of-tour" id="loaiphuthuphongdon0" name="[0].loaiphuthuphongdon" onchange="ChangeChoose();"><option selected="selected" value="0">Kh&#244;ng</option>
                        <option value="1">C&#243;</option>
                        </select>                        
                        </div>
                    </div>
                </div>
                <div class="row total">
                    <div class="col-md-12 col-sm-12 text-right">
                        Trị gi&#225;: <span class="price" id="spanprice0"></span>
                        <input class="form-control" disabled="disabled" id="price0" name="price0" type="hidden" value="" />
                    </div>
                </div>
            </div>
        </div>
    <div class="frame-cus">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-right">
                Tổng cộng: <span class="price" id="spanTotalPrice"></span>
                <input type="hidden" id="TotalPrice" disabled="disabled" class="form-control" />
            </div>
        </div>

    </div>
</div>


<script>
    //$(function () {
        ChangeChoose();
    //});

    function CheckDOBByPersonkind() {
        var totalMember = parseInt('1');
        var end_date = new Date('2020', parseInt('6') - 1, '7', '0', '0', '0');

        for (var i = 0; i < totalMember; i++) {
            var dateofbirth = $("#dateofbirth" + i).val();
            var personkind = $("#personkind" + i).val();//(0 : NguoiLon,1:TreNho, 2:EmBe, 3: TreEm)

            var ldob = dateofbirth.split("/");

            if (personkind == 0)//Nguoi lon >= 12 tuổi
            {
                //var year = parseInt(ldob[2]) + 12;
                var dobNew = new Date(parseInt(ldob[2]) + 12 + "-" + ldob[1] + "-" + ldob[0]);//Them 12 nam so với chọn ngày sinh

                if (dobNew > end_date) {
                    alert('Ngày sinh & loại khách không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : ' + '07/06/20 00:00:00'.toString() + ')')
                    $("#dateofbirth" + i).val("");
                    $("#dateofbirth" + i).focus();

                    $("#dob" + i).val("");
                    $("#dob" + i + "_day").val("");
                    $("#dob" + i + "_month").val("");
                    $("#dob" + i + "_year").val("");
                }
            }
            if (personkind == 3)//5 tuoi <= Tre em < 12 tuoi
            {
                var dobMin = new Date(parseInt(ldob[2]) + 5 + "-" + ldob[1] + "-" + ldob[0]);
                var dobMax = new Date(parseInt(ldob[2]) + 12 + "-" + ldob[1] + "-" + ldob[0]);

                if (dobMin > end_date || dobMax < end_date) {
                    alert('Ngày sinh & loại khách không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : ' + '07/06/20 00:00:00'.toString() + ')')
                    $("#dateofbirth" + i).val("");
                    $("#dateofbirth" + i).focus();

                    $("#dob" + i).val("");
                    $("#dob" + i + "_day").val("");
                    $("#dob" + i + "_month").val("");
                    $("#dob" + i + "_year").val("");
                }
            }
            if (personkind == 1)//2 tuoi <= Tre Nhỏ < 5 tuoi
            {
                var dobMin = new Date(parseInt(ldob[2]) + 2 + "-" + ldob[1] + "-" + ldob[0]);
                var dobMax = new Date(parseInt(ldob[2]) + 5 + "-" + ldob[1] + "-" + ldob[0]);

                if (dobMin > end_date || dobMax < end_date) {
                    alert('Ngày sinh & loại khách không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : ' + '07/06/20 00:00:00'.toString() + ')')
                    $("#dateofbirth" + i).val("");
                    $("#dateofbirth" + i).focus();

                    $("#dob" + i).val("");
                    $("#dob" + i + "_day").val("");
                    $("#dob" + i + "_month").val("");
                    $("#dob" + i + "_year").val("");
                }
            }
            if (personkind == 2)//Em bé <= 2 tuoi
            {
                var dobNew = new Date(parseInt(ldob[2]) + 2 + "-" + ldob[1] + "-" + ldob[0]);

                if (dobNew < end_date) {
                    alert('Ngày sinh & loại khách không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : ' + '07/06/20 00:00:00'.toString() + ')')
                    $("#dateofbirth" + i).val("");
                    $("#dateofbirth" + i).focus();

                    $("#dob" + i).val("");
                    $("#dob" + i + "_day").val("");
                    $("#dob" + i + "_month").val("");
                    $("#dob" + i + "_year").val("");
                }
            }
        }
    }

    function ChangeChoose() {
        var CurrencyName = 'đ';
        var Rate = '1';

        var totalMember = parseInt('1');
        var totalAdult = parseInt('1');

        var totalPrice = 0;
        for (var i = 0; i < totalMember; i++) {
            var amount_vn = 0;
            var loaikhachnoidia = $("#loaikhachnoidia" + i).val();//(0 : VietNam, 1: Viet kiều, 2: Nuoc ngoài)
            var personkind = $("#personkind" + i).val();//(0 : NguoiLon,1:TreNho, 2:EmBe, 3: TreEm)
            var loaiphuthuphongdon = $("#loaiphuthuphongdon" + i).val();//(0:Không, 1 : Có)

            $("#loaikhachnoidia" + i).change(function () {
                loaikhachnoidia = $("#loaikhachnoidia" + i).val();
            });

            $("#personkind" + i).change(function () {
                personkind = $("#personkind" + i).val();
            });

            $("#loaiphuthuphongdon" + i).change(function () {
                loaiphuthuphongdon = $("#loaiphuthuphongdon" + i).val();
            });

            if (totalAdult == 1) {
                $("#loaiphuthuphongdon0").val('1');

            }
            loaiphuthuphongdon = $("#loaiphuthuphongdon" + i).val();

            amount_vn = CalPrice(loaikhachnoidia, personkind, loaiphuthuphongdon);

            //$("#price" + i).val(formatnumber(amount_vn.toString()) + ' đ');
            $("#price" + i).val((amount_vn / Rate).toFixed(0) + ' ' + CurrencyName);
            $("#spanprice" + i).text(formatnumber((amount_vn / Rate).toFixed(0)) + ' ' + CurrencyName);

            totalPrice += amount_vn;
        }

        //$("#TotalPrice").val(formatnumber(totalPrice.toString()) + ' đ');
        $("#TotalPrice").val((totalPrice / Rate).toFixed(0) + ' ' + CurrencyName);
        $("#spanTotalPrice").text(formatnumber((totalPrice / Rate).toFixed(0)) + ' ' + CurrencyName);
    }

    function CalPrice(loaikhachnoidia, personkind, loaiphuthuphongdon) {

        //Gia tri cua tour

        //NguoiLon
        var adult_price = parseFloat('2390000');//VietNam
        var adult_o_price = parseFloat('2390000');//VietKieu
        var adult_f_price = parseFloat('2390000');//NuocNgoai

        //TreNho
        var child_price = parseFloat('0');//VietNam
        var child_o_price = parseFloat('0');//VietKieu
        var child_f_price = parseFloat('0');//NuocNgoai

        //EmBe
        var child_price5 = parseFloat('0');//VietNam
        var pretty_o_price = parseFloat('0');//VietKieu
        var pretty_f_price = parseFloat('0');//NuocNgoai

        //TreEm
        var child_price11 = parseFloat('1195000');//VietNam
        var child_o_price11 = parseFloat('1195000');//VietKieu
        var child_f_price11 = parseFloat('1195000');//NuocNgoai

        var phuthuphongdon_vn = parseFloat('700000');//VietNam
        var phuthuphongdon_vk = parseFloat('1200000');//VietKieu
        var phuthuphongdon_nn = parseFloat('1200000');//NuocNgoai

        //Gia tri cua tour

        var amount_vn = 0;

        /* Xử lý tính giá tiền theo độ tuổi,loại khách, phụ thu phòng đơn */
        switch (personkind)//Độ tuổi
        {
            case "0"://Người lớn
                switch (loaikhachnoidia)//loại khách
                {
                    case "0": amount_vn = adult_price;//VietNam
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vn;
                        }
                        break;
                    case "1": amount_vn = adult_o_price;//Vietkieu
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vk;
                        }
                        break;
                    case "2": amount_vn = adult_f_price;//Nuocngoai
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_nn;
                        }
                        break;
                }
                break;

            case "1"://Trẻ nhỏ
                switch (loaikhachnoidia)//loại khách
                {
                    case "0": amount_vn = child_price;//VietNam
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vn;
                        }
                        break;
                    case "1": amount_vn = child_o_price;//Vietkieu
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vk;
                        }
                        break;
                    case "2": amount_vn = child_f_price;//Nuocngoai
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_nn;
                        }
                        break;
                }
                break;

            case "2"://Em bé
                switch (loaikhachnoidia)//loại khách
                {
                    case "0": amount_vn = child_price5;//VietNam
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vn;
                        }
                        break;
                    case "1": amount_vn = pretty_o_price;//Vietkieu
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vk;
                        }
                        break;
                    case "2": amount_vn = pretty_f_price;//Nuocngoai
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_nn;
                        }
                        break;
                }
                break;

            case "3"://Trẻ em
                switch (loaikhachnoidia)//loại khách
                {
                    case "0": amount_vn = child_price11;//VietNam
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vn;
                        }
                        break;
                    case "1": amount_vn = child_o_price11;//Vietkieu
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vk;
                        }
                        break;
                    case "2": amount_vn = child_f_price11;//Nuocngoai
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_nn;
                        }
                        break;
                }
                break;
        }
        /* End Xử lý tính giá tiền theo độ tuổi,loại khách, phụ thu phòng đơn */
        return amount_vn;
    }

    var datenow = '27/05/2020';
    var datemin = '27/05/1950';
    var yearmin = '1950';
    var yearmax = '2020';
    $(".date").datepicker({
        dateFormat: 'dd/mm/yy',
        defaultDate: '01/01/1980',
        inline: true,
        changeMonth: true,
        changeYear: true,
        maxDate: datenow,
        minDate: datemin,
        yearRange: yearmin + ':' + yearmax
    });
<script>
    //$(function () {
        ChangeChoose();
    //});

    function CheckDOBByPersonkind() {
        var totalMember = parseInt('1');
        var end_date = new Date('2020', parseInt('6') - 1, '7', '0', '0', '0');

        for (var i = 0; i < totalMember; i++) {
            var dateofbirth = $("#dateofbirth" + i).val();
            var personkind = $("#personkind" + i).val();//(0 : NguoiLon,1:TreNho, 2:EmBe, 3: TreEm)

            var ldob = dateofbirth.split("/");

            if (personkind == 0)//Nguoi lon >= 12 tuổi
            {
                //var year = parseInt(ldob[2]) + 12;
                var dobNew = new Date(parseInt(ldob[2]) + 12 + "-" + ldob[1] + "-" + ldob[0]);//Them 12 nam so với chọn ngày sinh

                if (dobNew > end_date) {
                    alert('Ngày sinh & loại khách không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : ' + '07/06/20 00:00:00'.toString() + ')')
                    $("#dateofbirth" + i).val("");
                    $("#dateofbirth" + i).focus();

                    $("#dob" + i).val("");
                    $("#dob" + i + "_day").val("");
                    $("#dob" + i + "_month").val("");
                    $("#dob" + i + "_year").val("");
                }
            }
            if (personkind == 3)//5 tuoi <= Tre em < 12 tuoi
            {
                var dobMin = new Date(parseInt(ldob[2]) + 5 + "-" + ldob[1] + "-" + ldob[0]);
                var dobMax = new Date(parseInt(ldob[2]) + 12 + "-" + ldob[1] + "-" + ldob[0]);

                if (dobMin > end_date || dobMax < end_date) {
                    alert('Ngày sinh & loại khách không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : ' + '07/06/20 00:00:00'.toString() + ')')
                    $("#dateofbirth" + i).val("");
                    $("#dateofbirth" + i).focus();

                    $("#dob" + i).val("");
                    $("#dob" + i + "_day").val("");
                    $("#dob" + i + "_month").val("");
                    $("#dob" + i + "_year").val("");
                }
            }
            if (personkind == 1)//2 tuoi <= Tre Nhỏ < 5 tuoi
            {
                var dobMin = new Date(parseInt(ldob[2]) + 2 + "-" + ldob[1] + "-" + ldob[0]);
                var dobMax = new Date(parseInt(ldob[2]) + 5 + "-" + ldob[1] + "-" + ldob[0]);

                if (dobMin > end_date || dobMax < end_date) {
                    alert('Ngày sinh & loại khách không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : ' + '07/06/20 00:00:00'.toString() + ')')
                    $("#dateofbirth" + i).val("");
                    $("#dateofbirth" + i).focus();

                    $("#dob" + i).val("");
                    $("#dob" + i + "_day").val("");
                    $("#dob" + i + "_month").val("");
                    $("#dob" + i + "_year").val("");
                }
            }
            if (personkind == 2)//Em bé <= 2 tuoi
            {
                var dobNew = new Date(parseInt(ldob[2]) + 2 + "-" + ldob[1] + "-" + ldob[0]);

                if (dobNew < end_date) {
                    alert('Ngày sinh & loại khách không tương ứng. Quý khách cần kiểm tra lại ngày sinh( so với ngày về của tour : ' + '07/06/20 00:00:00'.toString() + ')')
                    $("#dateofbirth" + i).val("");
                    $("#dateofbirth" + i).focus();

                    $("#dob" + i).val("");
                    $("#dob" + i + "_day").val("");
                    $("#dob" + i + "_month").val("");
                    $("#dob" + i + "_year").val("");
                }
            }
        }
    }

    function ChangeChoose() {
        var CurrencyName = 'đ';
        var Rate = '1';

        var totalMember = parseInt('1');
        var totalAdult = parseInt('1');

        var totalPrice = 0;
        for (var i = 0; i < totalMember; i++) {
            var amount_vn = 0;
            var loaikhachnoidia = $("#loaikhachnoidia" + i).val();//(0 : VietNam, 1: Viet kiều, 2: Nuoc ngoài)
            var personkind = $("#personkind" + i).val();//(0 : NguoiLon,1:TreNho, 2:EmBe, 3: TreEm)
            var loaiphuthuphongdon = $("#loaiphuthuphongdon" + i).val();//(0:Không, 1 : Có)

            $("#loaikhachnoidia" + i).change(function () {
                loaikhachnoidia = $("#loaikhachnoidia" + i).val();
            });

            $("#personkind" + i).change(function () {
                personkind = $("#personkind" + i).val();
            });

            $("#loaiphuthuphongdon" + i).change(function () {
                loaiphuthuphongdon = $("#loaiphuthuphongdon" + i).val();
            });

            if (totalAdult == 1) {
                $("#loaiphuthuphongdon0").val('1');

            }
            loaiphuthuphongdon = $("#loaiphuthuphongdon" + i).val();

            amount_vn = CalPrice(loaikhachnoidia, personkind, loaiphuthuphongdon);

            //$("#price" + i).val(formatnumber(amount_vn.toString()) + ' đ');
            $("#price" + i).val((amount_vn / Rate).toFixed(0) + ' ' + CurrencyName);
            $("#spanprice" + i).text(formatnumber((amount_vn / Rate).toFixed(0)) + ' ' + CurrencyName);

            totalPrice += amount_vn;
        }

        //$("#TotalPrice").val(formatnumber(totalPrice.toString()) + ' đ');
        $("#TotalPrice").val((totalPrice / Rate).toFixed(0) + ' ' + CurrencyName);
        $("#spanTotalPrice").text(formatnumber((totalPrice / Rate).toFixed(0)) + ' ' + CurrencyName);
    }

    function CalPrice(loaikhachnoidia, personkind, loaiphuthuphongdon) {

        //Gia tri cua tour

        //NguoiLon
        var adult_price = parseFloat('2390000');//VietNam
        var adult_o_price = parseFloat('2390000');//VietKieu
        var adult_f_price = parseFloat('2390000');//NuocNgoai

        //TreNho
        var child_price = parseFloat('0');//VietNam
        var child_o_price = parseFloat('0');//VietKieu
        var child_f_price = parseFloat('0');//NuocNgoai

        //EmBe
        var child_price5 = parseFloat('0');//VietNam
        var pretty_o_price = parseFloat('0');//VietKieu
        var pretty_f_price = parseFloat('0');//NuocNgoai

        //TreEm
        var child_price11 = parseFloat('1195000');//VietNam
        var child_o_price11 = parseFloat('1195000');//VietKieu
        var child_f_price11 = parseFloat('1195000');//NuocNgoai

        var phuthuphongdon_vn = parseFloat('700000');//VietNam
        var phuthuphongdon_vk = parseFloat('1200000');//VietKieu
        var phuthuphongdon_nn = parseFloat('1200000');//NuocNgoai

        //Gia tri cua tour

        var amount_vn = 0;

        /* Xử lý tính giá tiền theo độ tuổi,loại khách, phụ thu phòng đơn */
        switch (personkind)//Độ tuổi
        {
            case "0"://Người lớn
                switch (loaikhachnoidia)//loại khách
                {
                    case "0": amount_vn = adult_price;//VietNam
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vn;
                        }
                        break;
                    case "1": amount_vn = adult_o_price;//Vietkieu
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vk;
                        }
                        break;
                    case "2": amount_vn = adult_f_price;//Nuocngoai
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_nn;
                        }
                        break;
                }
                break;

            case "1"://Trẻ nhỏ
                switch (loaikhachnoidia)//loại khách
                {
                    case "0": amount_vn = child_price;//VietNam
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vn;
                        }
                        break;
                    case "1": amount_vn = child_o_price;//Vietkieu
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vk;
                        }
                        break;
                    case "2": amount_vn = child_f_price;//Nuocngoai
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_nn;
                        }
                        break;
                }
                break;

            case "2"://Em bé
                switch (loaikhachnoidia)//loại khách
                {
                    case "0": amount_vn = child_price5;//VietNam
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vn;
                        }
                        break;
                    case "1": amount_vn = pretty_o_price;//Vietkieu
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vk;
                        }
                        break;
                    case "2": amount_vn = pretty_f_price;//Nuocngoai
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_nn;
                        }
                        break;
                }
                break;

            case "3"://Trẻ em
                switch (loaikhachnoidia)//loại khách
                {
                    case "0": amount_vn = child_price11;//VietNam
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vn;
                        }
                        break;
                    case "1": amount_vn = child_o_price11;//Vietkieu
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_vk;
                        }
                        break;
                    case "2": amount_vn = child_f_price11;//Nuocngoai
                        if (loaiphuthuphongdon == 1)//Phụ thu phòng đơn
                        {
                            amount_vn = amount_vn + phuthuphongdon_nn;
                        }
                        break;
                }
                break;
        }
        /* End Xử lý tính giá tiền theo độ tuổi,loại khách, phụ thu phòng đơn */
        return amount_vn;
    }

    var datenow = '27/05/2020';
    var datemin = '27/05/1950';
    var yearmin = '1950';
    var yearmax = '2020';
    $(".date").datepicker({
        dateFormat: 'dd/mm/yy',
        defaultDate: '01/01/1980',
        inline: true,
        changeMonth: true,
        changeYear: true,
        maxDate: datenow,
        minDate: datemin,
        yearRange: yearmin + ':' + yearmax
    });
    
    
</script>
            </div>
        </div>
        </div>
</div>