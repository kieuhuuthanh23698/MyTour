<div id="carouselExampleControls" class="carousel slide max-width" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url()?>public/images/banner/5.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url()?>public/images/banner/5.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url()?>public/images/banner/5.png" class="d-block w-100" alt="...">
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
    
    <a class="carousel-control-prev" style="width: 8%" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" style="width: 8%;" href="#carouselExampleControls" role="button" data-slide="next">
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
        height: 100%;
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
    
</style>