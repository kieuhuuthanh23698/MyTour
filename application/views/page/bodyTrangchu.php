<script type="text/javascript">
    //ĐỊNH DẠNG TIỀN
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return  n2.split('').reverse().join('');
    }

    function sale(number)
    {
        number = number - number/10;
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return  n2.split('').reverse().join('');
    }
</script>
<!--**************************************** dedicate to you *****************************************************-->
<div class="dedicate pt-5 max-width">
    <div class="dedicate-heading text-center">
        <h1>Dành Riêng Cho Bạn</h1>
        <p>Địa điểm nổi bật có giá tốt nhất</p>
    </div>
    <div class="dedicate-content">
        <?php foreach ($des as $i) {?>
        <div class="dedicate-item-bg">
            <a href="<?php echo base_url()?>handling/destinationDetail?idDes=<?php echo $i['id_destination']?>">
            <div class="dedicate-item">
                <img width="100%" src="<?php echo base_url()?>public/images/des/<?php echo $i['img1']?>"/>
                <div class="dedicate-item-content">
                    <div class="content">
                        <h2><?php echo $i['destinationName']?></h2>
                        <span>
                            <script type="text/javascript"> document.write(formatCurrency(<?php echo $i['MinPrice']?> + ''));</script> đ
                        </span>
                        <span>
                            <script type="text/javascript"> document.write(formatCurrency(<?php echo $i['Sale']?> + ''));</script> đ
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <?php }?>
    </div>
    
</div>
<style>
    .dedicate-heading h1{
        font-size: 35px;
    }
    .dedicate-content{
        display: flex;
        justify-content: space-between;
    }
    .dedicate-item-bg{
        width: 20%;
        padding: 5px;
    }
    .dedicate-item{
        box-shadow: 3px 3px 10px #ccc;
    }
    .dedicate-item-content{
        background: #ccc;
        display: flex;
        font-weight: 500;
        padding: 5px;
    }
    .dedicate-item-content .content{
        width: 80%;
    }
    .dedicate-item-content .content h2{
        font-size: 20px;
    }
    .dedicate-item-content .content span{
        font-size: 16px;
        margin-right: 10px;
        color: red;
    }
    .dedicate-item-content .content span:last-child{
        text-decoration: line-through;
        color: gray;
    }
    .dedicate-item-content .icon{
        width: 20%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div class="highlight pt-5">
    <div class="highlight-heading text-center mb-4">
        <h1>Địa Điểm Nổi Bật</h1>
        <p>Những Địa Điểm nổi Bật Ở Việt Nam</p>
    </div>
    <div class="container highlight-content">
        <div class="row">

            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Đà Nẵng">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/danang.png"/>
                    <div class="content text-center">
                        <h2>Đà Nẵng</h2>
                    </div>
                </div>
            </a>
            </div>

            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Vũng Tàu">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/vungtau.png"/>
                    <div class="content text-center">
                        <h2>Bà Rịa - Vũng Tàu</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Lâm Đồng">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/dalat.png"/>
                    <div class="content text-center">
                        <h2>Đà Lạt</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=TP Hồ Chí Minh">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/tphcm.png"/>
                    <div class="content text-center">
                        <h2>Hồ Chí Minh</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/nhatrang.png"/>
                    <div class="content text-center">
                        <h2>Nha Trang</h2>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Bình Thuận">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/phanthiet.jpg"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Hà Nội">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/hanoi.png"/>
                    <div class="content text-center">
                        <h2>Hà Nội</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Kiên Giang">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/phuquoc.png"/>
                    <div class="content text-center">
                        <h2>Phú Quốc</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Lào Cai">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/sapa.png"/>
                    <div class="content text-center">
                        <h2>Sa Pa</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Quảng Nam">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/hoian.png"/>
                    <div class="content text-center">
                        <h2>Hội An</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Quảng Ninh">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/halong.png"/>
                    <div class="content text-center">
                        <h2>Hạ Long</h2>
                    </div>
                </div>
            </a>
            </div>


            <div class="col-md-3">
            <a href="<?php echo base_url()?>handling/search?search_box=Huế">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/city/hue.png"/>
                    <div class="content text-center">
                        <h2>Huế</h2>
                    </div>
                </div>
            </a>
            </div>

        </div>
    </div>
    <br>
    <div class="container highlight-content">
        <h1>KHÁCH SẠN THEO TỈNH THÀNH</h1>
        <hr>
        <div class='abc'>
        </div>
    </div>
</div>
<style>
    .highlight-heading h1{
        font-size: 35px;
    }
    .highlight-content .row>div{
        padding-left: 10px;
        padding-right: 10px;
    }
    .highlight-item{
        position: relative;
        border-radius: 10px;
        margin-top: 20px;
    }
    .highlight-item img{
        border-radius: 10px;
    }
    .highlight-item .content{
        position: absolute;
        left: 0;
        bottom: 0;
        background-color: rgba(0,174,239,.7);
        color: #ffffff;
        width: 100%;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    .highlight-item .content h2{
        color: #ffffff;
        font-size: 25px;
        padding: 5px;
        margin: 0;
    }
</style>
<script type="text/javascript">

    $('.row a').on('click',function(){
        //alert($(this).find('h2').text());
        localStorage.setItem("city", $(this).find('h2').text());
    });

</script>