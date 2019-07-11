
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
<!--******************************************** MODAL Thêm Hóa đơn ****************************************-->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Đơn Đặt Phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<style>
    
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
                    '<button onclick="detail('+bill.id_bills+')" class="btn btn-primary">Chi Tiết</button>'
                    
                ] ).draw( false );
            }
        });
    } );
</script>