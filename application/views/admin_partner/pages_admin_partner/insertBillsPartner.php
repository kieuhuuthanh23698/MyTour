<div class="back-page">
    <ul>
        <li><a href="<?php echo base_url()?>admin_partner/billsAdminPartner">Hóa Đơn Đặt Phòng</a></li>>
        <li>Thêm Hóa Đơn Đặt Phòng</li>
    </ul>
</div>
<hr/>
<style>
    .back-page{
        padding-top: 20px;
        color: black;
        font-weight: 500;
    }
    .back-page ul{
        list-style: none;
        padding-left: 0;
    }
    .back-page ul li{
        display: inline-block;
        color: greenyellow;
    }
    .back-page ul a{
        text-decoration: none;
        color: green;
    }
</style>
<div class="discount-inf">
    <h1>Thông Tin Khách Hàng</h1>
    <div class="discount-inf-content">
        <table class="table table-bordered text-center">
            <tr>
                <td>Tên Khách Hàng</td>
                <td><input id="name" type="text" class="form-control"/></td>
                <td>Số Điện Thoại</td>
                <td>
                    <input id="phone" type="text" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input id="mail" type="text" class="form-control"/></td>
                <td>Địa Chỉ</td>
                <td><input id="address" type="text" class="form-control"/></td>
            </tr>
        </table>
    </div>
</div>
<style>
    .discount-inf h1{
        font-size: 30px;
        margin-top: 20px;
        margin-bottom: 30px;
    }
</style>
<div class="products-heading">
    <h1>Danh Sách Phòng Đặt</h1>
    <button onclick="loadAddRoom()" class="btn btn-success" data-toggle="modal" data-target="#addRoom" >Thêm Phòng</button>
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
<div class="room-list">
    <table class="table table-bordered text-center" id="">
        <thead style="background-color: #37474f; color: #ffffff;">
            <th>ID</th>
            <th>Loại Phòng</th>
            <th>Giá</th>
            <th>Số Lượng Phòng</th>
            <th>Từ Ngày</th>
            <th>Đến Ngày</th>
            <th>Thành Tiền</th>
            <th></th>
        </thead>
        <tbody style="font-weight: 500">
            
        </tbody>
        
    </table>
    <p><strong>Thành Tiền: </strong><span id="total-money">0</span> đ</p>
    
</div>
<div class="order mt-5">
    <button id="orderRoom">Đặt Phòng</button>
</div>
<style>
    .order{
        display: flex;
        justify-content: center;
    }
    .order button{
        padding: 12px 20px;
        background-color: red;
        color: #ffffff;
        font-weight: 500;
        border: 0;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<!--****************************************************** MODAL ADDROOM **********************************************************-->
<div class="modal fade" id="addRoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm Phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select id="listRoomSelect" class="form-control">
              
                </select>
                <div class="room-inf mt-4">
                    <p class="area"><strong>Diện Tích: </strong><span></span> m<sup>2</sup></p>
                    <p class="view"><strong>View: </strong><span></span></p>
                    <p class="bed"><strong>Giường: </strong><span></span></p>
                    <p class="price"><strong>Giá: </strong><span></span> đ</p>
                    
                </div>
                <div class="room-time mt-4">
                    <p>Từ Ngày: </p>
                    <input type="text" id="timeCheckIn" class="form-control"/>
                    <p>Đến Ngày: </p>
                    <input type="text" id="timeCheckOut" class="form-control"/>
                    <p class="roomCanOrder"><strong>Số lượng Phòng Còn: </strong><span></span> Phòng</p>
                </div>
                <div class="quantumRoom mt-4">
                    <p><strong>Số Lượng phòng: </strong></p>
                    <input id="quantum" class="form-control" type="number" min="1"/>
                    <p class="mt-5 money"><strong>Thành Tiền: </strong><span></span> đ</p>
                </div>
          
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="add" type="button" class="btn btn-primary">Thêm Phòng</button>
            </div>
        </div>
    </div>
</div>
<style>
    #addRoom .modal-dialog{
        max-width: 50%;
    }
/*
    #addRoom .form-control{
        width: 50%;
    }
*/
    #addRoom .room-inf{
        display: flex;
        flex-wrap: wrap;
    }
    #addRoom .room-inf>p{
        width: 50%;
    }
    #addRoom .room-time input{
        width: 50%;
    }
</style>
<script>
    $(function(){
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        $('#timeCheckIn').val(now.getDate() + '/' + (now.getMonth() + 1) + '/' +  now.getFullYear());
        $('#timeCheckOut').val((now.getDate()) + '/' + (now.getMonth() + 1) + '/' +  now.getFullYear());
        $('#timeCheckIn').datepicker({
            dateFormat: "dd/mm/yy",
            minDate: new Date(),
            onSelect: function(date) {
                $( "#timeCheckOut" ).datepicker( "option", "minDate", date );
                getRoomInf();
            }
        });
        $('#timeCheckOut').datepicker({
            dateFormat: "dd/mm/yy",
            minDate: new Date(),
            onSelect: function(date) {
                getRoomInf();
            }
        });
        
        $("#listRoomSelect").change(function(){
            getRoomInf();
        });
        
        $(".quantumRoom #quantum").change(function(){
            changeQuantum();
        })
        $("#add").on("click",function(){
            var id_roomType = $("#listRoomSelect").find(':selected').val();
            var roomName = $("#listRoomSelect").find(':selected').text();
            var price = $(".room-inf .price span").text();
            var quantum = $(".quantumRoom input").val();
            var money = $(".quantumRoom .money span").text();
            var dateFrom = $( "#timeCheckIn" ).val();
            var dateTo = $( "#timeCheckOut" ).val()
            
            $item = $('<tr id="id'+id_roomType+'"><td class="id">'+id_roomType+'</td><td>'+roomName+'</td><td>'+price+'đ</td><td class="roomQuantum">'+quantum+'</td><td class="dateFrom">'+dateFrom+'</td><td class="dateTo">'+dateTo+'</td><td class="money"><span>'+money+'</span> đ</td><td>'+
                    '<button onclick="deleteRoom('+id_roomType+')" class="btn btn-warning">Xóa</button></td></tr>    ');
            $(".room-list tbody").append($item);
            
//            var totalMoney = Number($("#total-money").text().replaceAll(',', ''));
//            price = Number(price.replaceAll(',', ''));
//            var updateTotalMoney = totalMoney + price;
//            $("#total-money").text(formatCurrency(updateTotalMoney.toString()));
            loadTotalMoney();
            
            loadAddRoom();
            alert("Phòng đã được thêm vào danh sách");
        });
            
        $("#orderRoom").on("click",function(){
            
            var name = $("#name").val();
            var phone = $("#phone").val();
            var mail = $("#mail").val();
            var address = $("#address").val();
            var totalMoney = $("#total-money").text().replaceAll(',', '');
            
            var listRoom = [];
            for(var i=0; i<$(".room-list tbody tr").length; i++){
                var roomItem = {};
                roomItem.idRoom = $(".room-list .id")[i].innerHTML;
                roomItem.roomQuantum = $(".room-list .roomQuantum")[i].innerHTML;
                var dateF = $(".room-list .dateFrom")[i].innerHTML.split("/");
                roomItem.dateFrom = dateF[2]+"/"+dateF[1]+"/"+dateF[0];
                
                var dateT = $(".room-list .dateTo")[i].innerHTML.split("/");
                roomItem.dateTo = dateT[2]+"/"+dateT[1]+"/"+dateT[0];
                
                roomItem.money = $(".room-list .money span")[i].innerHTML.replaceAll(',', '');
                
                listRoom.push(roomItem);
            }
            $.ajax({
                url: '<?php echo base_url()?>admin_partner/insertBillsPartner/insertBill',
                type: 'POST',
                dataType: 'html',
                data: {
                    listRoom: JSON.stringify(listRoom),
                    name: name,
                    phone: phone,
                    mail: mail,
                    address: address,
                    totalMoney: totalMoney
                }
            })
            .done(function(data){
                alert(data);
                window.location.href='<?php echo base_url()?>admin_partner/billsAdminPartner';
            })   
        })
        
    })
    function loadTotalMoney(){
        var totalMoney = 0;
        for(var i=0; i<$(".room-list tbody tr").length; i++){
            var money = Number($(".room-list .money span")[i].innerHTML.replaceAll(',', ''));
            totalMoney += money;
        }
        $("#total-money").text(formatCurrency(totalMoney.toString()));
    }
    function loadAddRoom(){
        $("#listRoomSelect").children().remove();
        // load dữ liệu lên model add room
        $.get( "<?php echo base_url()?>admin_partner/insertBillsPartner/getListRoom", function( data ) {
            var obj = jQuery.parseJSON(data);
            
            // mảng chứa id các id room đã thêm
            var roomAdded = [];
            for(var i=0; i<$(".room-list .id").length; i++){
                roomAdded.push($(".room-list .id")[i].innerHTML);
            }
            for(var room of obj) {
                if(roomAdded.indexOf(room.id_roomType)== -1){ // kiểm tra id phòng đã thêm vào hay chưa
                    $option = $('<option value="'+room.id_roomType+'">'+room.roomTypeName+'</option>');
                    $("#listRoomSelect").append($option);
                }
            }
            getRoomInf();
            
        });
    }
    function getRoomInf(){
        var id_roomType = $("#listRoomSelect").find(':selected').val();
        var timeIn = $( "#timeCheckIn" ).val().split("/");
        var timeCheckIn = timeIn[2]+"/"+timeIn[1]+"/"+timeIn[0];
        var timeOut = $( "#timeCheckOut").val().split("/");
        var timeCheckOut = timeOut[2]+"/"+timeOut[1]+"/"+timeOut[0];
        $.ajax({
            url: '<?php echo base_url()?>admin_partner/insertBillsPartner/getRoomInf',
            dataType: 'json',
            data: {
                "id_roomType":id_roomType,
                "timeCheckIn": timeCheckIn,
                "timeCheckOut": timeCheckOut
            },
            type: 'POST',
            success: function (data) {
                $(".room-inf .area span").text(data[0].area);
                $(".room-inf .view span").text(data[0].view);
                $(".room-inf .bed span").text(data[0].bed);
                $(".room-inf .price span").text(formatCurrency(data[0].price.toString()));

                var roomCanOrder = data[0].quantum;
                if(data[0].total != null){
                    roomCanOrder = data[0].quantum - data[0].total;
                }
                $(".room-time .roomCanOrder span").text(roomCanOrder);
                $(".quantumRoom input").val(1);
                $(".quantumRoom input").attr("max",roomCanOrder);
                changeQuantum();
            }
        });
        
         
    }
    function changeQuantum(){
        var maxQuantum = parseInt($(".room-time .roomCanOrder span").text());
        if($(".quantumRoom #quantum").val() > maxQuantum){
            alert("Đã vượt quá số lượng phòng có thể đặt!");
            $(".quantumRoom #quantum").val(maxQuantum);
        }
        if($(".quantumRoom #quantum").val() < 1){
            $(".quantumRoom #quantum").val(1);
        }
        var price = $(".room-inf .price span").text().replaceAll(',', '');
        var quantum = $(".quantumRoom #quantum").val();
        
        var timeIn = $( "#timeCheckIn" ).val().split("/");
        var dateFrom = new Date(timeIn[2],timeIn[1],timeIn[0]);
        var timeOut = $( "#timeCheckOut" ).val().split("/");
        var dateTo = new Date(timeOut[2],timeOut[1],timeOut[0]);
        var offset = dateTo.getTime() - dateFrom.getTime();
        
        var totalDays = Math.round(offset / 1000 / 60 / 60 / 24)+1; 
        
        var money = price*quantum*totalDays;
        $(".quantumRoom .money span").text(formatCurrency(money.toString()));
        
    }
    function deleteRoom($id){
        var answer = window.confirm("Bạn Có Muốn Xóa Phòng Này");
        if(answer){
            $("#id"+$id).remove();
        }
        loadTotalMoney();
    }
    
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('');
    }
    String.prototype.replaceAll = function(strTarget,strSubString){
        var strText = this;
        var intIndexOfMatch = strText.indexOf( strTarget );
        while (intIndexOfMatch != -1){
            strText = strText.replace( strTarget, strSubString );
            intIndexOfMatch = strText.indexOf( strTarget );
        }
        return( strText );
    }
</script>

