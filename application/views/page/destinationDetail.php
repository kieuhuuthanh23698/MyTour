<script type="text/javascript">
    var ID_DEST = <?php echo $destination['id_destination']?>;

    function totalDays()
    {
        var timeIn = $( "#timeCheckIn" ).val().split("/");
        var dateFrom = new Date(timeIn[2],timeIn[1],timeIn[0]);
        var timeOut = $( "#timeCheckOut" ).val().split("/");
        var dateTo = new Date(timeOut[2],timeOut[1],timeOut[0]);
        var offset = dateTo.getTime() - dateFrom.getTime();
        var totalDays = Math.round(offset / 1000 / 60 / 60 / 24)+1;
        return totalDays; 
    }

    function bookRoom(id){
        $.ajax({
            url: '<?php echo base_url()?>handling/bookRoom',
            dataType: 'json',
            data: {
                "id_room": id,
                "id_dest": ID_DEST,
                "totalDays": totalDays(),
                "dateFrom": $('#timeCheckIn').val(),
                "dateTo": $("#timeCheckOut").val(),
                "numRoom": $('#' + id).find('select').val(),
            },
            type: 'POST',
            success: function (data) {
                $("#listBookRooms tbody").text('');
                for(var i = 0 ;i < data.cart.length; i++)
                {
                    var item = "<tr><td>" + data.cart[i].roomName + "</td><td>"+ data.cart[i].price + " đ</td><td> " + data.cart[i].numRoom + "</td><td><div class='room-time'><div><i class='far fa-calendar'></i><input type'text'name='timeCheckIn' value='" + data.cart[i].dateFrom 
                        + "' readonly/></div><div><i class='far fa-calendar'></i><input type='text' " +
                     "name='timeCheckOut' value='" + data.cart[i].dateTo + "' readonly/></div></div></td><td>" + data.cart[i].totalCost + " đ</td><td><button class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></td></tr>";
                    $("#listBookRooms tbody").append(item);
                }
                $('#sumCost').text('Tổng tiền : ' + data.total);
                //$('#' + id).parent().remove();
            },
        });
    }

</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/roomPartner.css">
<script type="text/javascript">
    //ĐỊNH DẠNG TIỀN
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return  n2.split('').reverse().join('');
    }
</script>
<div class="des-heading pt-5">
    <div class="container">
        <h1><?php echo $destination['destinationName']?></h1>
        <p>
            <?php for($j = 0; $j < $destination['star']; $j++){?>
            <i class="fas fa-star"></i>
            <?php }?>
        </p>
        <span></span>
        <a href="#"><?php echo $destination['destinationAddress'].' '.$destination['district'].' '.$destination['city']?></a>
    </div>
</div>
<style>
    .des-heading h1{
        font-size: 35px;
        text-transform: capitalize;
        
    }
</style>
<div class="des-img pt-5">
    <div class = "row">
        <div class="col-md-6">
            <img width="100%" src="<?php echo base_url() ?>public/images/des/<?php echo $images['img1']?>"/>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img width="100%" src="<?php echo base_url() ?>public/images/des/<?php echo $images['img2']?>"/>
                </div>
                <div class="col-md-6">
                    <img width="100%" src="<?php echo base_url() ?>public/images/des/<?php echo $images['img3']?>"/>
                </div>
                <div class="col-md-6">
                    <img width="100%" src="<?php echo base_url() ?>public/images/des/<?php echo $images['img4']?>"/>
                </div>
                <div class="col-md-6">
                    <img width="100%" src="<?php echo base_url() ?>public/images/des/<?php echo $images['img5']?>"/>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .des-img .row{
        margin-left: 0;
        margin-right: 0;
    }
    .des-img .row>div{
        padding-left: 0;
        padding-right: 0;
    }
</style>
<form onsubmit="return false;">
<div class="des-order pt-5">
    <div class="container">
        <table class="table table-bordered">
            <thead style="background-color: #2d3d4e; color: #fff">
                <tr>
                    <th>Loại Phòng</th>
                    <th>Giá 1 Đêm</th>
                    <th>Số Lượng</th>
                    <th>Đặt Phòng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $i) {?>
                <tr>
                    <td colspan="5" style="font-weight: 700; color: aqua;"><?php echo $i['roomTypeName']?></td>
                </tr>
                <tr id="<?php echo($i['id_room'])?>">
                    <td>
                        <img width="300px" src="<?php echo base_url() ?>public/images/dedicate/<?php echo $i['imageRoom']?>"/>
                        <span><?php echo $i['area']?> m<sup>2</sup></span>
                        <span><?php echo $i['view']?></span>
                        <span><?php echo $i['bed']?></span>
                        <span class="quantum">Còn <?php echo $i['EmptyRoom']?> Phòng</span>
                        <input type="button" data-toggle="modal" data-target="#modalAddRoom" 
                         onclick="roomDetail(<?php echo $i['id_room']?>)" class="detail-room" value="Xem chi tiết phòng"></input>
                    </td>
                    <td style="text-align: center; color: red">
                        <script type="text/javascript"> document.write(formatCurrency(<?php echo $i['price'];?> + ''));</script> đ
                    </td>
                    <td style="text-align: center;">
                        <!-- <span><input type="number" required value="1" min="1" max="<?php echo $i['EmptyRoom']?>" /></span><span>Phòng</span> -->
                        <!-- <div style="padding:20px;height: 50px;"> -->
                        <select onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' class="form-control">
                            <?php for($j=0; $j < $i['EmptyRoom'];$j++){?>
                                <option value="<?php echo $j;?>"><?php echo $j;?> phòng</option>
                            <?php }?>
                        </select>
                        <!-- </div> -->
                    </td>
                    <td style="text-align: center;">
                        <input type="button" class="btn btn-primary" onclick="bookRoom(<?php echo $i['id_room']?>)" value="Đặt ngay">
                    </td>
                </tr>
                <?php }?>
            </tbody>
            
        </table>
    </div>
</div>
</form>
<style>
    .des-order span{
        display: block;
    }
    .des-order .detail-room{
        margin-top: 10px;
        border: 0;
        background-color: red;
        border-radius: 3px;
        color: #fff;
        padding: 5px 10px;
        cursor: pointer;
    }
    .des-order span.quantum{
        color: red;
        font-weight: 500;
    }
</style>
<div class="bill-order pt-5">
    <div class="container">
        <h1>Danh Sách Phòng Đặt</h1>
        <table class="table table-bordered" id="listBookRooms">
            <thead  style="text-align: center;background-color: #2d3d4e; color: #fff">
                <tr>
                    <th>Loại Phòng</th>
                    <th>Giá 1 Đêm</th>
                    <th>Số Lượng</th>
                    <th>Thời Gian</th>
                    <th>Thành Tiền</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>Standard Double</td>
                    <td>720.000 đ</td>
                    <td> 3</td>
                    <td>
                        <div class="room-time">
                            <div>
                                <i class="far fa-calendar"></i>
                                <input type="text" id="timeCheckIn" name="timeCheckIn"/>
                            </div>
                            <div>
                                <i class="far fa-calendar"></i>
                                <input type="text" id="timeCheckOut" name="timeCheckOut" />
                            </div>
                        </div>
                    </td>
                    <td>2.100.000 đ</td>
                    <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                </tr>

                <tr>
                    <td>Standard Double</td>
                    <td>720.000 đ</td>
                    <td> 3</td>
                    <td>
                        <div class="room-time">
                            <div>
                                <i class="far fa-calendar"></i>
                                <input type="text" id="timeCheckIn" name="timeCheckIn"/>
                            </div>
                            <div>
                                <i class="far fa-calendar"></i>
                                <input type="text" id="timeCheckOut" name="timeCheckOut" />
                            </div>
                        </div>
                    </td>
                    <td>2.100.000 đ</td>
                    <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                </tr>
                 -->
            </tbody>
        </table>
    </div>
</div>
<style>
    .bill-order h1{
        font-size: 35px;
        margin-bottom: 30px;
    }
    .room-time{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 20px;
        
    }
    .room-time input{
        margin-left: 5px;
        padding: 3px;
    }
    .room-time i{
        font-size: 18px;
    }
    .fa-star {
        color: yellow;
    }
</style>
<div class="info-custom">
    <div class="container">
        <div class="info-content">
            <p id="sumCost">Tổng Tiền: 0đ</p>
            <input class="form-control" type="text" placeholder="Họ Và Tên">
            <input class="form-control" type="text" placeholder="Số Điện Thoại">
            <input class="form-control" type="text" placeholder="Email">
            <input class="form-control" type="text" placeholder="Địa chỉ">
            <button id="bookRoom">Đặt Phòng</button>
        </div>
    </div>
</div>
<style>
    .info-content{
        width: 350px;
        padding: 20px;
        border: 1px solid #eee;
        box-shadow: 3px 3px 10px #ccc;
    }
    .info-content input{
        margin-bottom: 10px;
    }
    .info-content button{
        cursor: pointer;
        width: 100%;
        padding: 5px;
        background-color: red;
        color: #ffffff;
        font-size: 18px;
        border: 0;
        font-weight: 500;
    }
</style>
<!-- MODAL ROOM -->
<div style="color: #007bff" id="modalAddRoom" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Thêm loại phòng mới</h4>
                <button id="closeModal" type="button" class="close" data-dismiss="modal">&times;<i class="fas fa-tractor"></i></button>
            </div>

            <div class="modal-body">

                <!-- Tab panes -->

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#thongtin" role="tab" data-toggle="tab">Thông tin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dichvu" role="tab" data-toggle="tab">Tiện nghi phòng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#chinhsach" role="tab" data-toggle="tab">Chính sách</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane in active" id="thongtin">
              
                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Tên loại phòng</label>
                            <div class="col-sm-12">
                                <select id="roomType" class="select-size" name="roomType">
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Images</label>
                            <div class="col-sm-12">
                                <input id="image"type="file" name="imageRoom">
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Diện tích (m<sup>2</sup>)</label>
                            <div class="col-sm-12">
                                <input id="area" type="number" name="area" min="1">
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Hướng</label>
                            <div class="col-sm-12">
                                <input id="view" type="text" name="view">
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Giường</label>
                            <div class="col-sm-12">
                                <input id="bed" type="text" name="bed">
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Số lượng phòng</label>
                            <div class="col-sm-12">
                                <input id="quantum" type="text" name="quantum">
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Giá 1 đêm</label>
                            <div class="col-sm-12">
                                <input id="price" type="text" name="price">
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="dichvu">
                        <ul class="detail-amenities-list" style="margin-top:10px">
                            <?php foreach ($conven as $key) {?>
                            <li class="active">
                                <span  class="dichvu">
                                    <input name="service" value="<?php echo $key['id_convenience']?>" type="checkbox">
                                    <?php echo $key['icon_conven']?>
                                </span>
                                <span>
                                    <?php echo $key['convenienceName']?> 
                                </span>
                            </li>
                            <?php }?>
                        </ul>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="chinhsach">
              
                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Chính sách phụ thu</label>
                            <div class="col-sm-12">

                                <table id="tablePolicy" class="table" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50%">Điều kiện</th>
                                            <th width="50%">Mức phí (1 đêm)</th>
                                            <th width="50%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Lưu ý</label>
                            <div class="col-sm-12" id="listLuuY">
                                
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Chính sách hủy</label>
                            <div class="col-sm-12" id="listChinhSachHuy">
                                
                            </div>
                        </div>
                   </div>
                </div>

            </div>

            <div class="modal-footer">
                <button id="addRoom" type="button" class="btn btn-success" data-dismiss="modal">
                <i class="fas fa-plus-circle"></i> Thêm
                </button>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function roomDetail(id){
    //$('#addRoom').text('Cập nhật');
    //hide nút Thêm, model dùng để xem chi tiết phòng
    $('#addRoom').hide();
    $.ajax({
        url:'<?php echo base_url();?>/admin_partner/roomPartner/getRoom',
        dataType : 'json',
        type: 'post',
        data: {id_room: id, id_dest : ID_DEST},
        success:function(dataReturn){
            // try{

                // //SET CHÍNH SÁCH PHỤ THU
                for(var i = 0; i < dataReturn['chinhsachphuthu'].length; i++)
                {
                    $("#tablePolicy tbody").append("<tr><td>" + dataReturn['chinhsachphuthu'][i].dieukien + "</td><td>" + dataReturn['chinhsachphuthu'][i].mucphi + "</td><td></td></tr>");
                }
                $('#listLuuY').append(dataReturn['luu_y'][0].noi_dung);
                $('#listChinhSachHuy').append(dataReturn['chinhsachhuy'][0].noi_dung);

                //SET ROOM TYPE
                $('.modal-body select').text('');
                $('#dichvu input').each(function(){ $(this).prop('checked',false)});
                $('.modal-body select').append("<option value=" + dataReturn['roomtype'][0].id_roomType + ">" + dataReturn['roomtype'][0].roomTypeName + "</option>");
                $('#roomType').attr('disabled',true);
                //SET IMAGE
                $('#image').after("<img width='200' src=" + "<?php echo base_url()?>/public/images/dedicate/" + dataReturn['roomtypedetail'][0].imageRoom + ">");
                $('#image').hide();
                //SET AREA
                $('#area').val(dataReturn['roomtypedetail'][0].area); 
                //SET VIEW
                $('#view').val(dataReturn['roomtypedetail'][0].view); 
                //SET BED
                $('#bed').val(dataReturn['roomtypedetail'][0].bed); 
                //SET QUANTUM
                $('#quantum').val(dataReturn['roomtypedetail'][0].quantum + " phòng");  
                //SET PRICE
                $('#price').val(formatCurrency(dataReturn['roomtypedetail'][0].price) + "VNĐ");


                //SET CONVENICE
                for(var i = 0 ; i < dataReturn['conveniencedetail'].length; i++)
                {
                    $('#dichvu input').each(function()
                        { 
                            if($(this).val() === dataReturn['conveniencedetail'][i].id_conve) 
                            {
                                $(this).prop('checked', true);
                            }
                        });
                }
            // }catch(err)
            // {
            //     alert('Xem room deatail bị lỗi !');
            // }
        }
    });
}
</script>