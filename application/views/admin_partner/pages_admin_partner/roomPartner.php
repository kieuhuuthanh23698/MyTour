
<!-- HEADER ROOMS PARTNER -->
<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i>DANH SÁCH PHÒNG</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddRoom" onclick="addRoom()"><i class="fas fa-plus-circle"></i>Thêm Mới</button>
</div>

<!-- TABLE ROOM -->
<div class="list-bills mt-3">
    <table class="table table-bordered text-center" id="roomsTable">
        <thead>
            <th>Tên Loại Phòng</th>
            <th>Images</th>
            <th>Diện Tích</th>
            <th>Hướng</th>
            <th>Gường</th>
            <th>Số Lượng Phòng</th>
            <th>Giá 1 Đêm</th>
            <th>Chức Năng</th>
        </thead>
        <tbody>
            <?php foreach ($room as $key) {?>
            <tr id="<?php echo $key['id_room']?>">
                <td><?php echo $key['roomTypeName']?></td>
                <td><img width="200" src="<?php echo base_url()?>/public/images/dedicate/<?php echo $key['imageRoom']?>"></td>
                <td><?php echo $key['area']?> m<sup>2</sup></td>
                <td><?php echo $key['view']?></td>
                <td><?php echo $key['bed']?></td>
                <td><?php echo $key['quantum']?> phòng</td>
                <td><?php echo number_format($key['price']);?> VNĐ</td>
                <td>
                    <button data-toggle="modal" data-target="#modalAddRoom"  onclick="roomDetail(<?php echo $key['id_room']?>)" class="btn btn-primary" ><i class="fas fa-info-circle"></i></button>
                    <button class="btn btn-success"><i class="fas fa-wrench"></i></button>
                    <button class="btn btn-danger" onclick="del(<?php echo $key['id_room']?>)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<!-- MODAL ROOM -->
<div id="modalAddRoom" class="modal fade" role="dialog">
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
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Lưu ý</label>
                            <div class="col-sm-12">
                                <textarea id="listLuuY" rows="10">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group has-info">
                            <label class="col-sm-6 control-label no-padding-right">Chính sách hủy</label>
                            <div class="col-sm-12">
                                <textarea id="listChinhSachHuy" rows="30">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </textarea>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/roomPartner.css">
<script src="<?php echo base_url()?>public/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#roomsTable').DataTable();
} );


function addRoom(){
    //$('#addRoom').text('Thêm');
    $('#addRoom').show();
    $('#image').show();
    $('#image + img').remove();
    clearModal();
    setRoomType();
    // $('.nav-item a').each(function(){ $(this).prop('class', 'nav-link');});
    // $('.nav-item:first-child a').prop('class','nav-link active');

    // $('.nav-item a').each(function(){ $(this).prop('aria-selected', 'false');});
    // $('.nav-item:first-child a').prop('aria-selected','true');

    // $('#chinhsach #dichvu').prop('class', 'tab-pane fade');
    // $('#thongtin,').prop('class','tab-pane in active show');
}

function setRoomType(){
    $.ajax({
        url:'<?php echo base_url();?>/admin_partner/roomPartner/getRoomType',
        dataType : 'json',
        type: 'get',
        success:function(dataReturn){
            $('.modal-body select').text('');
            for(var i = 0 ; i < dataReturn.length; i++)
            {
                $('#roomType').append("<option value=" + dataReturn[i].id_roomType + ">" + dataReturn[i].roomTypeName + "</option>");
            }
            $('#roomType').attr('disabled',false);
        }
    });
}

$( document ).ready(function() {
    setRoomType();
});

/*
    SAU KHI THÊM , PHẢI XÓA ROOM TYPE VỪA THÊM, CLEAR CÁC INPUT
    $('#roomType').append('<option value="1">1</option>'); 
    KHI XEM DETAIL PHÒNG, ADD ROOM, CHO OPTION SELECTED VÀ SELECT DISABLE
    $('#roomType').attr('disabled',true/false);
    CÁC INPUT KHÁC THÌ CHO NHẬP VÀ CHỈNH SỬA
    BUTTON ADD ROOM CHUYỂN THÀNH LƯU VÀ NẾU
*/
function roomDetail(id){
    //$('#addRoom').text('Cập nhật');
    //hide nút Thêm, model dùng để xem chi tiết phòng
    $('#addRoom').hide();
    $.ajax({
        url:'<?php echo base_url();?>/admin_partner/roomPartner/getRoom',
        dataType : 'json',
        type: 'post',
        data: {id_room: id},
        success:function(dataReturn){
            try{

                // //SET CHÍNH SÁCH PHỤ THU
                for(var i = 0; i < dataReturn['chinhsachphuthu'].length; i++)
                {
                    $("#tablePolicy tbody").append("<tr><td>" + dataReturn['chinhsachphuthu'][i].dieukien + "</td><td>" + dataReturn['chinhsachphuthu'][i].mucphi + "</td><td><i class='fas fa-trash-alt fa-sm'></td></tr>");
                    $('#tablePolicy tr:last-child i').bind('click', function(){ $(this).parent().parent().remove();});
                }
                CKEDITOR.instances['listLuuY'].setData(dataReturn['luu_y'][0].noi_dung);
                CKEDITOR.instances['listChinhSachHuy'].setData(dataReturn['chinhsachhuy'][0].noi_dung);


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
            }catch(err)
            {
                alert('Xem room deatail bị lỗi !');
            }
        }
    });
}


// SAU KHI XEM DETAIL ROOM, RESET LẠI MODAL ĐỂ XEM LẠI HOẶC THÊM SẼ KHÔNG BỊ LỖI
$('#closeModal').on('click',function(){
    $('#addRoom').show();
    $('#image').show();
    $('#image + img').remove();
    $('#dichvu input').each(function(){ $(this).prop('checked',false)});
});

// THÊM PHÒNG MỚI
$('#addRoom').on('click', function () 
{
    var file_data = $('#image').prop('files')[0];
    if(file_data != null){
        //lấy ra kiểu file
        var typeF = file_data.type;
        //Xét kiểu file được upload
        var match = ["image/png", "image/jpg", "image/jpeg"];
        //kiểm tra kiểu file
        if (typeF == match[0] || typeF == match[1] || typeF == match[2]) {
            //khởi tạo đối tượng form data
            var form_data = new FormData();
            //thêm file picture và data vào trong form data
            form_data.append('roomType', $("#roomType").val());
            form_data.append('imageRoom', file_data);
            form_data.append('area', $("#area").val());
            form_data.append('view', $("#view").val());
            form_data.append('bed', $("#bed").val());
            form_data.append('quantum', $("#quantum").val());
            form_data.append('price', $("#price").val());

            //LẤY CÁC VALUE CỦA DỊCH VỤ PHÒNG
            var service = document.getElementsByName('service');
            var check_service = [];
            for (var i = 0; i < service.length; i++){
                if (service[i].checked === true){
                    check_service.push(service[i].value);
                }
            }
            form_data.append('service', JSON.stringify(check_service));

            //LẤY CÁC VALUE PHỤ THU
            var phuThu = new Array();
            $('#tablePolicy tbody tr').each(function(){
                phuThu.push(new Array( $(this).find('td:nth-child(1)').text(), $(this).find('td:nth-child(2)').text() ));
            });
            form_data.append('phuThu',JSON.stringify(phuThu));

            //value của text area lưu ý và chính sách hủy
            var luuY = CKEDITOR.instances['listLuuY'].getData();
            form_data.append('luuY', luuY);
            var chinhSachHuy = CKEDITOR.instances['listChinhSachHuy'].getData();
            form_data.append('chinhSachHuy', chinhSachHuy);
            //sử dụng ajax post gửi form data đến server

            var urlSend;
            //if($('#addRoom').text() == 'Thêm')
                urlSend = '<?php echo base_url()?>admin_partner/roomPartner/addRoom';
            // if($('#addRoom').text() == 'Cập nhật')
            //     urlSend = '<?php echo base_url()?>admin_partner/roomPartner/update';

            $.ajax({
                url: urlSend, 
                // gửi đến file, data đến serve
                dataType: 'json',
                //3 option sau cần thiết cho việc gửi form data
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    // if($('#addRoom').text() == 'Thêm')
                    // {
                        var table = $('#roomsTable').DataTable();
                        table.row.add( [
                            res[0].roomTypeName,
                            "<img width='200' src=" + "<?php echo base_url()?>public/images/dedicate/"+ res[0].imageRoom+">",
                            res[0].area + " m<sup>2</sup>",
                            res[0].view,
                            res[0].bed,
                            res[0].quantum + " phòng",
                            formatCurrency(res[0].price) + " VNĐ",
                            "<button class='btn btn-primary' data-toggle='modal' data-target='#modalAddRoom'  onclick='roomDetail(" + res[0].id_roomType + ")'><i class='fas fa-info-circle'></i></button>"+
                            "<button class='btn btn-success'><i class='fas fa-wrench'></i></button>"+
                            "<button class='btn btn-danger' onclick='del(" + res[0].id_roomType + ")'>"+
                            "<i class='fas fa-trash-alt'></i></button>",
                            ] , ).draw( false );
                        // $('#roomsTable tbody tr').each(function(){
                        //     if($(this).attr('class') == 'odd')
                        //         {
                        //             $(this).remove();
                        //             alert('hú hú');
                        //         }
                        // });
                        //SET ID CHO ROW VỪA THÊM TRONG BẢNG ROOM
                        $('#roomsTable tbody tr').each(function(){
                            if($(this).find('td:nth-child(1)').text() == res[0].roomTypeName)
                                $(this).attr('id', res[0].id_roomType );
                        });
                        //LÀM RỖNG MODAL
                        clearModal();
                        alert('Thêm phòng thành công !');
                    //}
                    // if($('#addRoom').text() == 'Cập nhật')
                    // {
                    //     alert('Update thành công');
                    // }
                }

            });
        }
        else 
        {
            alert('Chỉ được upload file ảnh đuôi jpg, jpeg hoặc png !!');
        } 
    }
    else
    {
        alert('Bạn chưa chọn ảnh cho phòng !');
    }
});

//XÓA PHÒNG
function del(id_room){
    var answer = window.confirm('Bạn muốn xóa phòng ?');
    if(answer){
        $.ajax({
            url: '<?php echo base_url()?>admin_partner/roomPartner/delete', 
            dataType: 'json',
            data: {id : id_room},
            type: 'post',
            success: function (res) {
                debugger;
            //xóa row trên client
            $('#roomsTable').DataTable().row('#' + id_room).remove().draw();
            //reset lại select room type
            $('#roomType').text('');
            for(var i = 0 ; i < res.length; i++){
                //console.log('<option value=' + res[i].id_roomType + '>'+ res[i].roomTypeName +'</option>');
                $('#roomType').append('<option value=' + res[i].id_roomType + '>'+ res[i].roomTypeName +'</option>');
            }
            alert('Xóa phòng thành công !');
        }
    }); 
    }
}


//XÓA ROW BẢNG PHỤ THU
$('#tablePolicy i').on('click',function(){
    $(this).parent().parent().remove();
});

//THÊM CHÍNH SÁCH PHỤ THU
$('#addchinhsachPhuThu').on('click', function(){
    if ($('#dieuKien').val() == '' || $('#mucPhi').val() == '') {
        alert("Bạn nhập thiếu thông tin chính sách phụ thu !");
    }
    else {
        $("#tablePolicy tbody").append("<tr><td>" + $('#dieuKien').val() + "</td><td>" + $('#mucPhi').val() + "</td><td><i class='fas fa-trash-alt fa-sm'></td></tr>");
        $('#tablePolicy tr:last-child i').bind('click', function(){ $(this).parent().parent().remove();});
        //reset input
        $('#dieuKien').val('');
        $('#mucPhi').val('');
    }
});


//ĐỊNH DẠNG TIỀN
function formatCurrency(number){
    var n = number.split('').reverse().join("");
    var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
    return  n2.split('').reverse().join('');
}

function clearModal(){
    //reset input
    $('.modal-body select').find(':selected').remove();
    $('.modal-body input').each(function(){
        if($(this).prop('name') != 'service')
            $(this).val('');
    });
    $('#dichvu input').each(function(){ $(this).prop('checked',false)});
    $('#tablePolicy tbody').text('');
    // $('#listLuuY').text('');
    // $('#listChinhSachHuy').text('');
    CKEDITOR.instances['listLuuY'].setData('<ul><li></li></ul>');
    CKEDITOR.instances['listChinhSachHuy'].setData('<ul><li></li></ul>');
}



//THÊM LƯU Ý PHÒNG
// $('#addListLuuY').on('click', function(){
//     if ($('#luuY').val() == '') {
//         alert("Bạn nhập thiếu thông tin lưu ý !");
//     }
//     else
//     {
//         $("#listLuuY ul").append("<li><i class='fas fa-trash-alt fa-sm'></i>" + $('#luuY').val() + "</li>");
//         //để phần tử mới dc  thêm cũng có sự kiện remove thì phải có những lệnh sau
//         $('#listLuuY ul li:last-child i').bind('click', function(){
//                                                            $(this).parent().remove();
//                                                        });
//         $('#luuY').val('');;
//         //$("#listLuuY ul").prepend("<li><i class='fas fa-trash-alt'></i>" + $('#luuY').val() + "</li>");
//         //$("#listLuuY ul").after("<li><i class='fas fa-trash-alt'></i>" + $('#luuY').val() + "</li>");
//     }
//     // $('#listLuuY ul li').each(function(){
//     //         alert($(this).text());
//     // });
// });


//XÓA LƯU Ý PHÒNG, CHÍNH SÁCH HỦY PHÒNG
// $('#listLuuY li i, #listChinhSachHuy li i').on('click', function(){
//    //alert($(this).parent().text());
//    $(this).parent().remove();
//    //alert($(this).text());
// });


// //THÊM CHÍNH SÁCH HỦY
// $('#addchinhsachHuy').on('click', function(){
//     if ($('#chinhsachHuy').val() == '') {
//         alert("Bạn nhập thiếu thông tin chính sách hủy !");
//     }
//     else
//     {
//         $("#listChinhSachHuy ul").append("<li><i class='fas fa-trash-alt fa-sm'></i>" + $('#chinhsachHuy').val() + "</li>");
//         $('#listChinhSachHuy ul li:last-child i').bind('click', function(){
//                                                            $(this).parent().remove();
//                                                        });
//         $('#chinhsachHuy').val('');
//     }
// });

CKEDITOR.replace('listLuuY',{
    filebrowserBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',    
    filebrowserFlashUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    removeButtons : 'About,Maximize,TextColor,Styles,Format,BGColor,ShowBlocks,Font,FontSize,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Link,Unlink,Anchor,Language,BidiLtr,BidiRtl,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Blockquote,CreateDiv,Outdent,Indent,NumberedList,CopyFormatting,RemoveFormat,Superscript,Subscript,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Scayt,SelectAll,Find,Replace,Templates,Save,NewPage,Preview,Print',
    toolbarGroups : [
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
    { name: 'forms', groups: [ 'forms' ] },
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
    '/',
    { name: 'links', groups: [ 'links' ] },
    { name: 'insert', groups: [ 'insert' ] },
    '/',
    { name: 'styles', groups: [ 'styles' ] },
    { name: 'colors', groups: [ 'colors' ] },
    { name: 'tools', groups: [ 'tools' ] },
    { name: 'others', groups: [ 'others' ] },
    { name: 'about', groups: [ 'about' ] },
    ],
    height : 100,
});

CKEDITOR.replace('listChinhSachHuy',{
    filebrowserBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',    
    filebrowserFlashUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    removeButtons : 'About,Maximize,TextColor,Styles,Format,BGColor,ShowBlocks,Font,FontSize,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Link,Unlink,Anchor,Language,BidiLtr,BidiRtl,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Blockquote,CreateDiv,Outdent,Indent,NumberedList,CopyFormatting,RemoveFormat,Superscript,Subscript,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Scayt,SelectAll,Find,Replace,Templates,Save,NewPage,Preview,Print',
    toolbarGroups : [
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
    { name: 'forms', groups: [ 'forms' ] },
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
    '/',
    { name: 'links', groups: [ 'links' ] },
    { name: 'insert', groups: [ 'insert' ] },
    '/',
    { name: 'styles', groups: [ 'styles' ] },
    { name: 'colors', groups: [ 'colors' ] },
    { name: 'tools', groups: [ 'tools' ] },
    { name: 'others', groups: [ 'others' ] },
    { name: 'about', groups: [ 'about' ] },
    ],
    height : 100,
});

</script>