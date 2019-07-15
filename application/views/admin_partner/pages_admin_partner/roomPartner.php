<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i>Loại phòng</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddRoom"><i class="fas fa-plus-circle"></i>Thêm Mới</button>
</div>
<style>
    .form-group .has-info label{
        margin-top: 50px;
        color: blue;
        max-width: 100%;
        /*font-weight: 400;*/
    }

    .products-heading{
        padding-top: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid gray;
        display: flex;
        justify-content: space-between;
        padding-right: 20px;
    }
    .products-heading i{
        margin-right: 20px;
    }
    .products-heading h1{
        font-size: 30px;
    }

    #tablePolicy thead{
        margin-top: 5px;
        background-color: #f2fbfe;
    }
    #tablePolicy{
        border-bottom: 2px gray solid;
    }
</style>

<style type="text/css">
    .form-group.has-info input, .form-group.has-info select, .form-group.has-info textarea {
        border-color: #72aec2;
        color: #4B89AA;
        -webkit-box-shadow: none;
        box-shadow: none;
        width: -webkit-fill-available;  
    }
    /*
    .col-sm-8 div{
        float: left;
    } */
    .col-sm-6 .control-label .no-padding-right{
        min-height: 20px;
        margin-top: 5px;
    }
</style>

<style type="text/css">

    #addchinhsachPhuThu, #addchinhsachHuy, #addListLuuY{
        float: right;    
    }
    #chinhsachPhuThu, #chinhsachHuy, #luuY{
        width: 692px;
        height: 35px;
        padding-left: 5px;
    }

    #dieuKien, #mucPhi{
        width: 345px;
        height: 35px;
        float: left;
        margin-right: 2px;
        padding-left: 5px; 
        margin-bottom: 10px;
    }

    #tablePolicy tbody tr td:last-child{
        width: 20px;
        text-align: center;
        padding-right: 0px;
    }

    #listLuuY ul, #listChinhSachHuy ul{
        margin-top: 20px;
        list-style-type: circle;
        line-height: 2em;
        text-align: justify;
        display: block;
    }

    #listLuuY li i, #listChinhSachHuy li i, #tablePolicy tbody tr td:last-child i{
        color: red;
        float: right;
    }

    #listLuuY li{
        margin-top: 5px;
    }

    .modal-dialog{
        max-width: 800px;
        width: 800px;
    }

    #roomType, #imageRoom, #area, #view, #bed, #quantum, #price{
        margin-top: 5px;
        margin-bottom: 5px;
        height: 30px;
    }

</style>

<style type="text/css">
                .detail-amenities-list{
                    list-style-type: none;
                }
                .li-air-conditioner:before{
                    content:"\e9eb";
                }
                #dichvu ul{
                    display: flex;
                    flex-wrap: wrap;
                }
                #dichvu li{
                    width: 50%;
                    
                }
</style>

<div class="list-bills mt-3">
    <table class="table table-bordered text-center" id="roomsTable">
        <thead>
            <th>Tên Loại Phòng</th>
            <th>Images</th>
            <th>Diện Tích</th>
            <th>Hướng</th>
            <th>Gường</th>
            <th>Số Người Tối Đa</th>
            <th>Giá 1 Đêm</th>
            <th>Chức Năng</th>
        </thead>
        <tbody>
            <?php foreach ($room as $key) {?>
            <tr id="<?php echo $key['id_room']?>">
                <td><?php echo $key['roomTypeName']?></td>
                <td><img width="200" src="<?php echo base_url()?>/public/images/products/<?php echo $key['imageRoom']?>"></td>
                <td><?php echo $key['area']?> m<sup>2</sup></td>
                <td><?php echo $key['view']?></td>
                <td><?php echo $key['bed']?></td>
                <td><?php echo $key['quantum']?> Người</td>
                <td><?php echo $key['price']?> đ</td>
                <td>
                    <button class="btn btn-primary"><i class="fas fa-info-circle"></i></button>
                    <button class="btn btn-success"><i class="fas fa-wrench"></i></button>
                    <button class="btn btn-danger" onclick="del(<?php echo $key['id_room']?>)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready( function () {
        $('#roomsTable').DataTable();
    } );
</script>

<!-- MODAL THÊM LOẠI PHÒNG MỚI -->
<div id="modalAddRoom" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Thêm loại phòng mới</h4>
                <button type="button" class="close" data-dismiss="modal">&times;<i class="fas fa-tractor"></i></button>
            </div>

            <div class="modal-body">

                <!-- Tab panes -->

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#thongtin" role="tab" data-toggle="tab">Thông tin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dichvu" role="tab" data-toggle="tab">Dịch vụ</a>
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
                                    <?php foreach ($roomType as $key) {?>
                                        <option value="<?php echo $key['id_roomType']?>"><?php echo $key['roomTypeName']?></option>
                                    <?php }?>
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
                            <label class="col-sm-6 control-label no-padding-right">Số người tối đa</label>
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
                                    <input name="dv" value="<?php echo $key['id_convenience']?>" type="checkbox">
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
                                <input id="dieuKien" type="text" name="dieuKien" placeholder="Điều kiện">
                                <input id="mucPhi" type="text" name="mucPhi" placeholder="Mức phí">
                                <button id="addchinhsachPhuThu" class="btn btn-success"><i class="fas fa-plus-circle"></i></button>

                                <table id="tablePolicy" class="table" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50%">Điều kiện</th>
                                            <th width="50%">Mức phí (1 đêm)</th>
                                            <th width="50%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Từ 10 đến 12 tuổi</td>
                                            <td>100,000 VNĐ</td>
                                            <td><i class="fas fa-trash-alt fa-sm"></td>
                                        </tr>

                                        <tr>
                                            <td>Người lớn</td>
                                            <td>100,000 VNĐ</td>
                                            <td><i class="fas fa-trash-alt fa-sm"></td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Lưu ý</label>
                            <div class="col-sm-12">
                                <input id="luuY" type="text" multiple="multiple" name="luuY" placeholder="Lưu ý">
                                <button id="addListLuuY"class="btn btn-success"><i class="fas fa-plus-circle"></i></button>
                                <div id="listLuuY">
                                    <ul>
                                        <li><i class="fas fa-trash-alt fa-sm"></i>Các mức phí trên đã bao gồm thuế phí</li>
                                        <li><i class="fas fa-trash-alt fa-sm"></i>Giường phụ không áp dụng cho loại phòng FAMILY ( 4 khách) (Private Sales)</li>
                                        <li><i class="fas fa-trash-alt fa-sm"></i>1 phòng được thêm tối đa 1 người lớn (tuỳ vào loại phòng)</li>
                                        <li><i class="fas fa-trash-alt fa-sm"></i>Vui lòng nhập các yêu cầu đặc biệt vào mục Yêu cầu khác bên dưới Thông tin liên hệ để được hỗ trợ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Chính sách hủy</label>
                            <div class="col-sm-12">
                                <input id="chinhsachHuy" type="text" multiple="multiple" name="chinhsachHuy" placeholder="Chính sách hủy">
                                <button id="addchinhsachHuy"class="btn btn-success"><i class="fas fa-plus-circle"></i></button>
                                <div id="listChinhSachHuy">
                                    <ul>
                                        <li><i class="fas fa-trash-alt fa-sm"></i>Huỷ miễn phí trước 20 ngày so với ngày nhận phòng.</li>
                                        <li><i class="fas fa-trash-alt fa-sm"></i>Khách không đến hoặc huỷ trong vòng 20 ngày so với ngày nhận phòng, tính phí 100% giá trị đơn phòng.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>

            </div>

            <div class="modal-footer">
                <button id="addRoom" type="button" class="btn btn-default" data-dismiss="modal">Thêm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">

    $('#addRoom').on('click', function () 
    {
        var file_data = $('#image').prop('files')[0];
            //lấy ra kiểu file
            var typeF = file_data.type;
            //Xét kiểu file được upload
            var match = ["image/png", "image/jpg", "image/jpeg"];
            //kiểm tra kiểu file
            if (typeF == match[0] || typeF == match[1] || typeF == match[2]) 
            {
                //khởi tạo đối tượng form data
                var form_data = new FormData();
                //thêm file picture và data vào trong form data
                $('.detail-amenities-list input').each(function(){ alert($(this).attr('value')) });
                form_data.append('roomType', $("#roomType").val());
                form_data.append('imageRoom', file_data);
                form_data.append('area', $("#area").val());
                form_data.append('view', $("#view").val());
                form_data.append('bed', $("#bed").val());
                form_data.append('quantum', $("#quantum").val());
                form_data.append('price', $("#price").val());
                //sử dụng ajax post gửi form data đến server
                $.ajax({
                    url: '<?php echo base_url()?>admin_partner/roomPartner/addRoom', 
                    // gửi đến file, data đến serve
                    dataType: 'json',
                    //3 option sau cần thiết cho việc gửi form data
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (res) {
                    alert(res[0].roomTypeName);
                    var table = $('#roomsTable').DataTable();
                    table.row
                            .add( [
                                    res[0].roomTypeName,
                                    "<img width='200' src=" + "<?php echo base_url()?>public/images/products/"+ res[0].imageRoom+">",
                                    res[0].area,
                                    res[0].view,
                                    res[0].bed,
                                    res[0].quantum,
                                    res[0].price,
                                    "<button class='btn btn-primary'><i class='fas fa-info-circle'></i></button>"+
                                    "<button class='btn btn-success'><i class='fas fa-wrench'></i></button>"+
                                    "<button class='btn btn-danger' onclick='del(" + res[0].id_roomType + ")'>"+
                                    "<i class='fas fa-trash-alt'></i></button>",
                                ] , )
                            .draw( false );
                    $('#roomsTable tr').last().attr('id', res[0].id_roomType );
//                 alert($('#roomsTable tr:last').attr('class'));
                    }
                });
            }
            else 
            {
                alert('Chỉ được upload file ảnh đuôi jpg, jpeg hoặc png !!');
            } 

    });

    function del(id_room){
            $.ajax({
                    url: '<?php echo base_url()?>admin_partner/roomPartner/delete', 
                    dataType: 'html',
                    data: {id : id_room},
                    type: 'post',
                    success: function (res) {
                    $('#' + id_room).remove();
                    alert(res);
                    }
                }); 
    }

    $('#addchinhsachPhuThu').on('click', function(){
        if ($('#dieuKien').val() == '' || $('#mucPhi').val() == '') {
            alert("Bạn nhập thiếu thông tin chính sách phụ thu !");
        }
        else
        {
            $("#tablePolicy tbody").append("<tr><td>" + $('#dieuKien').val() + "</td><td>" + $('#mucPhi').val() + "</td></tr>");
            $('#dieuKien').val('');
            $('#mucPhi').val('');
        }
        // $('#listLuuY ul li').each(function(){
        //         alert($(this).text());
        // });
    });


    $('#addListLuuY').on('click', function(){
        if ($('#luuY').val() == '') {
            alert("Bạn nhập thiếu thông tin lưu ý !");
        }
        else
        {
            $("#listLuuY ul").append("<li><i class='fas fa-trash-alt fa-sm'></i>" + $('#luuY').val() + "</li>");
            //để phần tử mới dc  thêm cũng có sự kiện remove thì phải có những lệnh sau
            $('#listLuuY ul li:last-child i').bind('click', function(){
                                                               $(this).parent().remove();
                                                           });
            $('#luuY').val('');;
            //$("#listLuuY ul").prepend("<li><i class='fas fa-trash-alt'></i>" + $('#luuY').val() + "</li>");
            //$("#listLuuY ul").after("<li><i class='fas fa-trash-alt'></i>" + $('#luuY').val() + "</li>");
        }
        // $('#listLuuY ul li').each(function(){
        //         alert($(this).text());
        // });
    });

    $('#listLuuY li i').on('click', function(){
       //alert($(this).parent().text());
       $(this).parent().remove();
       //alert($(this).text());
    });


    $('#addchinhsachHuy').on('click', function(){
        if ($('#chinhsachHuy').val() == '') {
            alert("Bạn nhập thiếu thông tin chính sách hủy !");
        }
        else
        {
            $("#listChinhSachHuy ul").append("<li><i class='fas fa-trash-alt fa-sm'></i>" + $('#chinhsachHuy').val() + "</li>");
            $('#listChinhSachHuy ul li:last-child i').bind('click', function(){
                                                               $(this).parent().remove();
                                                           });
            $('#chinhsachHuy').val('');
        }
    });


    $('.dichvu input').on('click',function(){
         var checkbox_Gia = document.getElementsByName('dv');
                            var check_gia = [];
                            for (var i = 0; i < checkbox_Gia.length; i++){
                                if (checkbox_Gia[i].checked === true){
                                    check_gia.push(checkbox_Gia[i].value);
                                }
                            }
                            alert(check_gia);
    });

</script>