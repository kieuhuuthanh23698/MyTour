
<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i>Hóa Đơn Đặt Phòng</h1>
    <a class="btn btn-success" href="<?php echo base_url()?>admin_partner/insertBillsPartner">Thêm Mới</a>
</div>
<style>
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
</style>
<div class="list-bills mt-3">
    <table class="table table-bordered text-center" id="billsTable">
        <thead style="background-color: #37474f; color: #ffffff">
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Ngày Đặt</th>
            <th>Trạng Thái</th>
            <th></th>
        </thead>
        <tbody style="font-weight: 500">
            
        </tbody>
    </table>
</div>
<style>
    .list-bills button{
        display: inline;
    }
</style>
<!--******************************************** MODAL chi tiết ****************************************-->
<div class="modal fade" id="billDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Hóa Đơn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center" id="detailBill">
                    <thead style="background-color: #37474f; color: #ffffff;">
                        <th>Loại Phòng</th>
                        <th>Giá</th>
                        <th>Số Lượng Phòng</th>
                        <th>Từ Ngày</th>
                        <th>Đến Ngày</th>
                        <th>Thành Tiền</th>
                    </thead>
                    <tbody style="font-weight: 500">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    #billDetailModal .modal-dialog{
        max-width: 80%;
    } 
</style>

<!--************************************************* SCRIPT **************************************************************-->

<script>
    $(document).ready( function () {
        $('#billsTable').DataTable();
        
        var t = $('#billsTable').DataTable();
        $.get( "<?php echo base_url()?>admin_partner/billsAdminPartner/listbill", function( data ) {
            var obj = jQuery.parseJSON(data);
            for(var bill of obj) {
                var status = "";
                if(bill.bill_status == 0){
                    status = "Đã Đặt"
                }else if(bill.bill_status ==1){
                    status = "Hủy";
                }
                t.row.add( [
                    bill.name_cus,
                    bill.phone_cus,
                    bill.email_cus,
                    bill.address_cus,
                    bill.date_createbill,
                    status,
                    '<button onclick="detail('+bill.id_bills+')" class="btn btn-primary" data-toggle="modal" data-target="#billDetailModal">Chi Tiết</button>'
                    
                ] ).draw( false );
            }
        });
        
        
    } );
    function detail($id){
        $.ajax({
                url: '<?php echo base_url()?>admin_partner/billsAdminPartner/getBillDetail',
                type: 'POST',
                dataType: 'json',
                data: {
                    idBill: $id
                }
            })
            .done(function(data){
                console.log(data);
                $("#billDetailModal tbody").children().remove();
                for(var item of data){
                    $item = $('<tr><td>'+item.roomTypeName+'</td><td>'+item.price+'</td>'+
                    '<td>'+item.roomquantum+'</td><td>'+item.dateFrom+'</td><td>'+item.dateTo+'</td><td>'+item.money+'</td></tr>');
                    
                    
                    $("#billDetailModal tbody").append($item);
                }
            })   
    }
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('');
    }
</script>