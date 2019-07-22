
<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i>Khách Sạn Chờ Xét Duyệt</h1>
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
            <th>Tên Khách Sạn</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
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

<!--************************************************* SCRIPT **************************************************************-->


<script>
    $(document).ready( function () {
        $('#billsTable').DataTable();
        
        var t = $('#billsTable').DataTable();
        $.get( "<?php echo base_url()?>admin/reviewList/listDes", function( data ) {
            console.log(data);
            var obj = jQuery.parseJSON(data);
            for(var des of obj) {
                t.row.add( [
                    des.destinationName,
                    des.destinationPhone,
                    des.destinationEmail,
                    '<button class="btn btn-primary" onclick="confirm('+des.id_destination+')" >Xác Nhận</button>'
                ] ).draw( false );
            }
        });
        
        function confirm($id){
            var answer = window.confirm("Bạn Chắc Muốn Xác Nhận !");
            if(answer){
                $.ajax({
                    url: '<?php echo base_url()?>admin/reviewList/confirmDes',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        id: $id
                    }
                })
                .done(function(data){
                    alert(data);

                })   
            }
        }
        
        
    } );
    
    
</script>
