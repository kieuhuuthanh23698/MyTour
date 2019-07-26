
<!-- HEADER ROOMS PARTNER -->
<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i> DANH SÁCH DỊCH VỤ</h1>
    <button id="addNewConven" class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm Mới</button>
    <button id="addNewConven2" style="display: none" class="btn btn-danger"><i class="fas fa-times-circle"></i> Hủy Thêm Mới</button>
</div>

<!-- TABLE ROOM -->
<div class="list-bills mt-3">


    <div class="discount-inf" style="display: none">
        <h1>Thông tin dịch vụ</h1>
        <div class="discount-inf-content">
            <table class="table table-bordered text-center">
                <tbody>
                    <tr>
                        <td>Tên dịch vụ</td>
                        <td><input id="nameConven" type="text" class="form-control"></td>
                        <td><button class="btn btn-success"><i class="fas fa-plus-circle"></i>Thêm</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="form-group has-info">
        <h1 class="col-sm-6" style="padding-left: 0px;"><i class="fas fa-shopping-bag"></i> Thêm dịch vụ</h1>
        <div class="col-sm-12" style="padding-left: 0px;">
            <select id="roomType" class="select-size" name="roomType" style=" margin-top: 5px;
    margin-bottom: 5px; height: 30px; width: -webkit-fill-available; float: left; ">
                <option value="4">Deluxe Double</option>
            </select>
            <button style="float: right;"><i class="fas fa-times-circle"></i></button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="convenTable">
        <thead>
            <th>Tên Dịch Vụ</th>
            <th>Trạng Thái</th>
            <th>Xóa</th>
        </thead>
        <tbody>
            <?php foreach ($conven as $i) {?>
            <tr>
                <td><?php echo $i['name_convenDes']?></td>
                <td><input type="checkbox" name="status" <?php if($i['status_conven_des'] == 0) echo 'checked'?>></td>
                <td>
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#convenTable').DataTable();
} );

$('#addNewConven').on('click',function(){
    $('#addNewConven').hide();
    $('#addNewConven2').show();
    $('.discount-inf').show('fast');
});
$('.discount-inf button, #addNewConven2').on('click',function(){
    $('#addNewConven').show();
    $('#addNewConven2').hide();
    $('.discount-inf').hide('fast');
});
</script>