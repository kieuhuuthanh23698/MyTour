
<!-- HEADER ROOMS PARTNER -->
<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i>DANH SÁCH TIỆN NGHI KHÁCH SẠN</h1>
    <button id="addNewService" class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm Mới</button>
    <button id="addNewService2" style="display: none" class="btn btn-danger"><i class="fas fa-times-circle"></i> Hủy Thêm Mới</button>
</div>

<!-- TABLE ROOM -->
<div class="list-bills mt-3">


    <div class="discount-inf" style="display: none">
        <h1>Thông tin tiện nghi</h1>
        <div class="discount-inf-content">
            <table class="table table-bordered text-center">
                <tbody>
                    <tr>
                        <td>Tên Tiện Nghi</td>
                        <td><input id="nameConven" type="text" class="form-control"></td>
                        <td><button class="btn btn-success"><i class="fas fa-plus-circle"></i>Thêm</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <table class="table table-bordered text-center" id="serviceTable">
        <thead>
            <th>Tên Tiện Nghi</th>
            <th>Trạng Thái</th>
            <th>Xóa</th>
        </thead>
        <tbody>
            <?php foreach ($service as $i) {?>
            <tr>
                <td><?php echo $i['serviceExtraName']?></td>
                <td><input type="checkbox" name="status" <?php if($i['status_service_des_partner'] == 0) echo 'checked'?>></td>
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
    $('#serviceTable').DataTable();
} );

$('#addNewService').on('click',function(){
    $('#addNewService').hide();
    $('#addNewService2').show();
    $('.discount-inf').show('fast');
});
$('.discount-inf button, #addNewService2').on('click',function(){
    $('#addNewService').show();
    $('#addNewService2').hide();
    $('.discount-inf').hide('fast');
});
</script>