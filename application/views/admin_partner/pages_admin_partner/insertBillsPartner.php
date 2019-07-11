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
                <td><input type="text" class="form-control"/></td>
                <td>Số Điện Thoại</td>
                <td>
                    <input type="text" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" class="form-control"/></td>
                <td>Địa Chỉ</td>
                <td><input type="text" class="form-control"/></td>
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
    <button class="btn btn-success" data-toggle="modal" data-target="#addRoom" >Thêm Phòng</button>
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
<div class="product-list">
    <table class="table table-bordered text-center" id="">
        <thead style="background-color: #37474f; color: #ffffff;">
            <th>Loại Phòng</th>
            <th>Giá</th>
            <th>Số Lượng Phòng</th>
            <th>Thành Tiền</th>
            <th></th>
        </thead>
        <tbody style="font-weight: 500">
            <tr>
                <td>Standard Double</td>
                <td>2.000.000 đ</td>
                <td>2</td>
                <td>4.000.000 đ</td>
                <td>
                    <button class="btn btn-warning">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>
<div class="order mt-5">
    <button>Đặt Phòng</button>
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
                <select class="form-control">
              
                </select>
                <div class="room-inf mt-4">
                    <p><strong>Diện Tích: </strong><span>20 m<sup>2</sup></span></p>
                    <p><strong>View: </strong><span>Hướng Phố</span></p>
                    <p><strong>Giường: </strong><span>2 giường đôi lớn</span></p>
                    <p><strong>Giá: </strong><span>2.000.000 đ</span></p>
                    
                </div>
                <div class="room-time mt-4">
                    
                    <p><strong>Số lượng Phòng Còn: </strong><span>6 Phòng</span></p>
                </div>
                <div class="mt-4">
                    <p><strong>Số Lượng phòng: </strong></p>
                    <input class="form-control" type="number" min="1"/>
                    <p class="mt-5"><strong>Thành Tiền: </strong><span>2.000.000 đ</span></p>
                </div>
          
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Thêm Phòng</button>
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
</style>