<div class="des-heading pt-5">
    <div class="container">
        <h1>Khách sạn Magonia Đà Nẵng</h1>
        <span></span>
        <a href="#">06 Lê Lợi, Phường Thạch Thang, Hải Châu, Đà Nẵng</a>
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
            <img width="100%" src="<?php echo base_url() ?>public/images/banner/polynesia-3021072_1280.jpg"/>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img width="100%" src="<?php echo base_url() ?>public/images/banner/polynesia-3021072_1280.jpg"/>
                </div>
                <div class="col-md-6">
                    <img width="100%" src="<?php echo base_url() ?>public/images/banner/polynesia-3021072_1280.jpg"/>
                </div>
                <div class="col-md-6">
                    <img width="100%" src="<?php echo base_url() ?>public/images/banner/polynesia-3021072_1280.jpg"/>
                </div>
                <div class="col-md-6">
                    <img width="100%" src="<?php echo base_url() ?>public/images/banner/polynesia-3021072_1280.jpg"/>
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
<div class="des-order pt-5">
    <div class="container">
        <table class="table table-bordered">
            <thead style="background-color: #2d3d4e; color: #fff">
                <tr>
                    <th>Loại Phòng</th>
                    <th>Tối Đa</th>
                    <th>Giá 1 Đêm</th>
                    <th>Số Lượng</th>
                    <th>Đặt Phòng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5">Standard Double</td>
                </tr>
                <tr>
                    <td>
                        <img width="300px" src="<?php echo base_url() ?>public/images/banner/polynesia-3021072_1280.jpg"/>
                        <span>20 m<sup>2</sup></span>
                        <span>Hướng Phố</span>
                        <span>1 giường Đôi Lớn</span>
                        <span class="quantum">Còn 3 Phòng</span>
                        <button class="detail-room">Xem Chi Tiết Phòng</button>
                    </td>
                    <td>
                        2 người
                    </td>
                    <td>
                        764.000 đ
                    </td>
                    <td>
                        <input type="number"/>
                    </td>
                    <td>
                        <button class="btn btn-primary">Đặt Ngay</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">Standard Double</td>
                </tr>
                <tr>
                    <td>
                        <img width="300px" src="<?php echo base_url() ?>public/images/banner/polynesia-3021072_1280.jpg"/>
                        <span>20 m<sup>2</sup></span>
                        <span>Hướng Phố</span>
                        <span>1 giường Đôi Lớn</span>
                        <span class="quantum">Còn 3 Phòng</span>
                        <button class="detail-room">Xem Chi Tiết Phòng</button>
                    </td>
                    <td>
                        2 người
                    </td>
                    <td>
                        764.000 đ
                    </td>
                    <td>
                        <input type="number"/>
                    </td>
                    <td>
                        <button class="btn btn-primary">Đặt Ngay</button>
                    </td>
                </tr>
            </tbody>
            
        </table>
    </div>
</div>
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
        <table class="table table-bordered">
            <thead  style="text-align: center;background-color: #2d3d4e; color: #fff">
                <tr>
                    <th>Loại Phòng</th>
                    <th>Giá 1 Đêm</th>
                    <th>Số Lượng</th>
                    <th>Thời Gian</th>
                    <th>Thành Tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
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
                    <td>
                        <button class="btn btn-warning">Xóa</button>
                    </td>
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
                    <td>
                        <button class="btn btn-warning">Xóa</button>
                    </td>
                </tr>
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
</style>
<div class="info-custom">
    <div class="container">
        <div class="info-content">
            <p>Tổng Tiền: 200.000 đ</p>
            <input class="form-control" type="text" placeholder="Họ Và Tên">
            <input class="form-control" type="text" placeholder="Số Điện Thoại">
            <button>Đặt Phòng</button>
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