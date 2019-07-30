<script type="text/javascript">
    //ĐỊNH DẠNG TIỀN
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return  n2.split('').reverse().join('');
    }
</script>
<div class="des-heading pt-5">
    <div class="container">
        <h1><?php echo $destination['destinationName']?></h1>
        <p>
            <?php for($j = 0; $j < $destination['star']; $j++){?>
            <i class="fas fa-star"></i>
            <?php }?>
        </p>
        <span></span>
        <a href="#"><?php echo $destination['destinationAddress'].' '.$destination['district'].' '.$destination['city']?></a>
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
                    <th>Giá 1 Đêm</th>
                    <th>Số Lượng</th>
                    <th>Đặt Phòng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $i) {?>
                <tr>
                    <td colspan="5" style="font-weight: 700; color: aqua;"><?php echo $i['roomTypeName']?></td>
                </tr>
                <tr>
                    <td>
                        <img width="300px" src="<?php echo base_url() ?>public/images/dedicate/<?php echo $i['imageRoom']?>"/>
                        <span><?php echo $i['area']?> m<sup>2</sup></span>
                        <span><?php echo $i['view']?></span>
                        <span><?php echo $i['bed']?></span>
                        <span class="quantum">Còn <?php echo $i['EmptyRoom']?> Phòng</span>
                        <button class="detail-room">Xem Chi Tiết Phòng</button>
                    </td>
                    <td style="text-align: center; color: red">
                        <script type="text/javascript"> document.write(formatCurrency(<?php echo $i['price'];?> + ''));</script> đ
                    </td>
                    <td style="text-align: center;">
                        <!-- <span><input type="number" required value="1" min="1" max="<?php echo $i['EmptyRoom']?>" /></span><span>Phòng</span> -->
                        <!-- <div style="padding:20px;height: 50px;"> -->
                        <select onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' class="form-control">
                            <?php for($j=0; $j < $i['EmptyRoom'];$j++){?>
                                <option value="<?php echo $j;?>"><?php echo $j;?> phòng</option>
                            <?php }?>
                        </select>
                        <!-- </div> -->
                    </td>
                    <td style="text-align: center;">
                        <button class="btn btn-primary" onclick="bookRoom(<?php echo $i['id_room']?>)">Đặt Ngay</button>
                    </td>
                </tr>
                <?php }?>
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
    .fa-star {
        color: yellow;
    }
</style>
<div class="info-custom">
    <div class="container">
        <div class="info-content">
            <p id="sumCost">Tổng Tiền: 200.000 đ</p>
            <p id="sumCost">Tổng Tiền: 200.000 đ</p>
            <p id="sumCost">Tổng Tiền: 200.000 đ</p>
            <input class="form-control" type="text" placeholder="Họ Và Tên">
            <input class="form-control" type="text" placeholder="Số Điện Thoại">
            <input class="form-control" type="text" placeholder="Email">
            <input class="form-control" type="text" placeholder="Địa chỉ">
            <button id="bookRoom">Đặt Phòng</button>
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
<script type="text/javascript">
    function bookRoom(id){
        alert('hello');
        //$(this).parent().hide();
    }
</script>