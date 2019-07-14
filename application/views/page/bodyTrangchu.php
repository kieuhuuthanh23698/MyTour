<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url()?>public/images/banner/5.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
        </div>
    </div>
    <div class="container banner-content">
        <div>
            <h1>To Travel is to live</h1>
            <p>You Don't Need Magic To Disappear. All you need is a destination</p>
            <div class="button">
                <a href="#">Thông Tin Liên Hệ</a>
                <a href="#">more info</a>
            </div>
        </div>
    </div>
    <div class="searchDest">
        <div class="container text-center">
            <div>
                <i class="fas fa-bed"></i>
                <input type="text" placeholder="Đà Nẵng">
            </div>
            <div>
                <i class="far fa-calendar"></i>
                <input type="text" />
                <i class="far fa-calendar"></i>
                <input type="text" />
            </div>
            <div>
                <input type="number" value="1"/>
                <span>Phòng</span>
            </div>
            <div>
                <a href="#">Search</a>
            </div>
            
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<style>
    .slide{
        position: relative;
    }
    .slide .banner-content{
        position: absolute;
        width: 100%;
        height: 70%;
        left: 0;
        top: 0;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #ffffff;
    }
    .slide .banner-content>div{
        width: 100%;
        font-size: 18px;
    }
    .slide .banner-content h1{
        font-size: 60px;
        font-weight: 900;
        text-transform: uppercase;
    }
    .slide .banner-content .button{
        margin-top: 50px;
    }
    .slide .banner-content .button a{
        padding: 14px 20px;
        text-decoration: none;
        color: #ffffff;
        font-size: 18px;
        text-transform: uppercase;
        border-radius: 5px;
        font-weight: 500;
    }
    .slide .banner-content .button a:first-child{
        background-color: #19d3af;
        border: 0;
        box-shadow: 3px 3px 5px #ccc;
        margin-right: 10px;
    }
    .slide .banner-content .button a:last-child{
        box-shadow: 3px 3px 5px #fff;
        border: 1px solid #fff;
    }
    .slide .searchDest{
        background-color: #2d3d4e;
        position: absolute;
        width: 100%;
        height: 100px;
        bottom: 0;
        left: 0;
    }
    .slide .searchDest>div{
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .slide .searchDest>div>div{
        background-color: #fff;
        padding: 5px 20px;
        margin-right: 10px;
        border-radius: 2px;
    }
    .slide .searchDest>div>div i{
        font-size: 22px;
        
    }
    .slide .searchDest>div>div input{
        padding: 6px;
        border: 0;
    }
    .slide .searchDest>div>div:last-child{
        border: 1px solid green;
        padding: 10px 25px;
        background-color: #19d3af;
    }
    .slide .searchDest>div>div:last-child a{
        color: #ffffff;
        font-weight: 500;
        text-decoration: none;
    }
    
</style>
<!--**************************************** dedicate to you ********************************************************-->
<div class="dedicate pt-5">
    <div class="dedicate-heading text-center">
        <h1>Dành Riêng Cho Bạn</h1>
        <p>Địa điểm nổi bật có giá tốt nhất</p>
    </div>
    <div class="dedicate-content">
        <div class="dedicate-item-bg">
            <div class="dedicate-item">
                <img width="100%" src="<?php echo base_url()?>public/images/dedicate/1.png"/>
                <div class="dedicate-item-content">
                    <div class="content">
                        <h2>Khách sạn Dani Vania</h2>
                        <span>631.000 đ</span><span>700.000 đ</span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="dedicate-item-bg">
            <div class="dedicate-item">
                <img width="100%" src="<?php echo base_url()?>public/images/dedicate/2.png"/>
                <div class="dedicate-item-content">
                    <div class="content">
                        <h2>Khách sạn Dani Vania</h2>
                        <span>631.000 đ</span><span>700.000 đ</span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="dedicate-item-bg">
            <div class="dedicate-item">
                <img width="100%" src="<?php echo base_url()?>public/images/dedicate/3.png"/>
                <div class="dedicate-item-content">
                    <div class="content">
                        <h2>Khách sạn Dani Vania</h2>
                        <span>631.000 đ</span><span>700.000 đ</span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="dedicate-item-bg">
            <div class="dedicate-item">
                <img width="100%" src="<?php echo base_url()?>public/images/dedicate/4.png"/>
                <div class="dedicate-item-content">
                    <div class="content">
                        <h2>Khách sạn Dani Vania</h2>
                        <span>631.000 đ</span><span>700.000 đ</span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="dedicate-item-bg">
            <div class="dedicate-item">
                <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                <div class="dedicate-item-content">
                    <div class="content">
                        <h2>Khách sạn Dani Vania</h2>
                        <span>631.000 đ</span><span>700.000 đ</span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
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
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="highlight-item">
                    <img width="100%" src="<?php echo base_url()?>public/images/dedicate/5.png"/>
                    <div class="content text-center">
                        <h2>Phan Thiết</h2>
                    </div>
                </div>
            </div>
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
        background-color: #2d3d4e;
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