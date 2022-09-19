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