<style type="text/css">
    .form-control{
        height: 35px !important;
    }
    .title-page{
        margin-top: 125px;
    }
    .date{
        border: 1px solid #ccc;
        border-radius: 3px;
        padding: 3px;
        display: flex;
        justify-content: space-between;

    }
    .date input{
        border: 0;
        padding: 3px;
        width: 250px;
    }
</style>
<form name="infor" onsubmit="return validateForm()" method="POST" action="<?php echo base_url()?>/admin_partner/inforPartner/update">
    <h2 class="title-page"><b>Quản lý khách sạn</b></h2>
    <div class="row">
        <div class="col-xs-12">
            <hr class="dark header">
        </div>
    </div>

    <div class="box">
        <div class="box-header" style="text-align: center;">
            <h3>Thông tin khách sạn</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-8 col-info-basic">
                    <div class="form-horizontal mg-l-20 mg-t-20">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Họ và tên:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nameEdit" value="<?php echo $partner['destinationName'];?>">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="use_email" value="<?php echo $partner['destinationEmail'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Số điện thoại:</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" name="phoneEdit" value="<?php echo $partner['destinationPhone'];?>">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Địa chỉ:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="addressEdit" value="<?php echo $partner['destinationAddress'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tỉnh/Thành phố:</label>
                            <div class="col-sm-5 select-df">
                                <select class="form-control select2-hidden-accessible"  id="cityEdit" name="cityEdit" tabindex="-1" aria-hidden="true">
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Quận/Huyện:</label>
                            <div class="col-sm-5 select-df">
                                <select class="form-control select2-hidden-accessible" id="ditrictEdit" name="ditrictEdit" tabindex="-1" aria-hidden="true">
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Xã/Phường:</label>
                            <div class="col-sm-5 select-df">
                                <select class="form-control select2-hidden-accessible" id="wardEdit" name="wardEdit" tabindex="-1" aria-hidden="true">
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Hạng sao:</label>
                            <div class="col-sm-5 select-df">
                                <ul class="list-unstyled">
                                    <li>
                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="1" 
                                            <?php if($partner['star'] == '1') echo 'checked'?>
                                            id-convenience="10" filter="filter">
                                            <i class="icon-checkbox"></i> 1
                                            <span class="star">
                                                <span class="star-1"></span>
                                            </span>
                                        </label>

                                    </li>
                                    <li>

                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="2"
                                            <?php if($partner['star'] == '2') echo 'checked'?>
                                             id-convenience="11" filter="filter">
                                            <i class="icon-checkbox"></i> 2
                                            <span class="star">
                                                <span class="star-2"></span>
                                            </span>
                                        </label>

                                    </li>
                                    <li>

                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="3" 
                                            <?php if($partner['star'] == '3') echo 'checked'?>
                                             id-convenience="12" filter="filter">
                                            <i class="icon-checkbox"></i> 3
                                            <span class="star">
                                                <span class="star-3"></span>
                                            </span>
                                        </label>

                                    </li>
                                    <li>

                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="4" 
                                            <?php if($partner['star'] == '4') echo 'checked'?>
                                             id-convenience="13" filter="filter">
                                            <i class="icon-checkbox"></i> 4
                                            <span class="star">
                                                <span class="star-4"></span>
                                            </span>
                                        </label>

                                    </li>
                                    <li>

                                        <label class="checkbox">
                                            <input type="radio" name="starRatings" value="5" 
                                            <?php if($partner['star'] == '5') echo 'checked'?>
                                             id-convenience="14" filter="filter">
                                            <i class="icon-checkbox"></i> 5
                                            <span class="star">
                                                <span class="star-5"></span>
                                            </span>
                                        </label>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Thời gian hủy đặt phòng:</label>
                            <div class="col-sm-8">
                                <div class="date">
                                    <input type="number" min="1"  name="cancelTime"value="<?php echo $partner['cancelTime']?>">
                                    <label>Ngày</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-info-basic">
                    <div class="form-horizontal mg-l-20 mg-t-20">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Username : </label>
                            <div class="col-sm-8">
                                <input title="Username không thể thay đổi nhé !!!" disabled="disabled" type="text" class="form-control" name="usename" value="<?php echo $partner['destinationUser'];?>">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Password : </label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">RePassword : </label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="repassword">
                                <p class="help-block red"></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border-top-gray">
        <div class="mg-t-20 pd-l-0 col-sm-8">
            <div class="form-horizontal mg-t-20 mg-l-20">
                <div class="form-group">
                    <div class="col-sm-8 pull-right">
                        <button type="submit" class="btn change-info">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
function validateForm() {
    //khi submit form đề cập nhật, nếu 2 ô pass có dữ liệu thì
        //kiểm tra xem có giống nhau không, nếu giống thì cho submit
            //nếu không thì không cho submit và alert nofication
    //nếu cả 2 ô đều trống thì cho submit
    if (document.forms["infor"]["password"].value != '' || document.forms["infor"]["repassword"].value != '') {
        if(document.forms["infor"]["password"].value == document.forms["infor"]["repassword"].value)
            {
                //alert("Cập nhật password !");
                return true;
            }
        else
            {
                alert("Password phải giống RePassword !");
                return false;
            }
    }
    else
    {
        //alert('Không cập nhật password !')
        return true;
    }
}

window.onload = function(){
    //alert("Load select");
    //debugger;
    //láy tất cả các city add vào select
    var URL = 'https://thongtindoanhnghiep.co/api/city';
    $.ajax({
        dataType: 'json',
        url : '<?php echo base_url()?>admin_partner/inforPartner/getAPI',
        data: {url : URL},
        type: 'GET',
        success : function(e){
                    for (var i = 0; i < e.LtsItem.length; i++) {
                        $('#cityEdit').append('<option value=' + e.LtsItem[i].ID + '>' + e.LtsItem[i].Title + '</option>');
                    }
                    //lấy id city của partner, cho option có val = id selected
                    var city = <?php echo $partner['destinationCounty'];?>;
                    $('#cityEdit option').each(function(){
                        if($(this).val() == city)
                            $(this).prop('selected','selected');
                    });

                    //LẤY TẤT CẢ DISTRICT CỦA CITY CỦA PARTNER ADD VÀO SELECT
                    URL = 'https://thongtindoanhnghiep.co/api/city/' + city + '/district';
                    $.ajax({
                            dataType: 'json',
                            url: '<?php echo base_url()?>admin_partner/inforPartner/getAPI',
                            data: {url : URL},
                            type: 'GET',
                            success : function(e){
                                        for (var i = 0; i < e.length; i++) {
                                            $('#ditrictEdit').append('<option value=' + e[i].ID + '>' + e[i].Title + '</option>');
                                        }
                                        var dt = <?php echo $partner['destinationDistrice'];?>;
                                        $('#ditrictEdit option').each(function(){
                                            if($(this).val() == dt)
                                                $(this).prop('selected','selected');
                                        });

                                        //LẤY TẤT CẢ CÁC WARD CỦA DISTRICT ADD VÀO SELECT
                                        URL = 'https://thongtindoanhnghiep.co/api/district/' + dt + '/ward';
                                        $.ajax({
                                            dataType: 'json',
                                            url: '<?php echo base_url()?>admin_partner/inforPartner/getAPI',
                                            data: {url : URL},
                                            type: 'GET',
                                            success : function(e){
                                                        for (var i = 0; i < e.length; i++) {
                                                            $('#wardEdit').append('<option value=' + e[i].ID + '>' + e[i].Title + '</option>');
                                                        }
                                                        var ward = <?php echo $partner['destinationWard'];?>;
                                                        $('#wardEdit option').each(function(){
                                                            if($(this).val() == ward)
                                                                $(this).prop('selected','selected');
                                                        });
                                            }
                                        });
                            },
                    });           
        }
    });
}

//hàm load district theo id city
function district(idCity){
    //khi select city change, reset lại select district, load lại những district của city đã chọn
    $('#ditrictEdit').text('');
    var URL = 'https://thongtindoanhnghiep.co/api/city/' + idCity + '/district';
    $.ajax({
        dataType: 'json',
        data: {url : URL},
        url: '<?php echo base_url()?>admin_partner/inforPartner/getAPI',
        type: 'GET',
        success : function(e){
                    for (var i = 0; i < e.length; i++) {
                        $('#ditrictEdit').append('<option value=' + e[i].ID + '>' + e[i].Title + '</option>');
                    }
                    $('#ditrictEdit option:first-child').prop('selected',"selected");
                    ward($('#ditrictEdit option:first-child').val());
        },
    });
}

function ward(idDistrict){
    $('#wardEdit').text('');
    var URL = 'https://thongtindoanhnghiep.co/api/district/' + idDistrict + '/ward';
    $.ajax({
        dataType: 'json',
        url: '<?php echo base_url()?>admin_partner/inforPartner/getAPI',
        data : {url : URL},
        type: 'GET',
        success : function(e){
                    for (var i = 0; i < e.length; i++) {
                        $('#wardEdit').append('<option value=' + e[i].ID + '>' + e[i].Title + '</option>');
                    }
                    $('#wardEdit option:first-child').prop('selected',"selected");
        }
    });
}


$('#cityEdit').on('change',function(){
    district($(this).val());
});

$('#ditrictEdit').on('change',function(){
    //alert($(this).find('option:selected').text());
    ward($(this).find('option:selected').val());
});

</script>