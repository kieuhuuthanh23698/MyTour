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
<style>
    .searchDest{
        background-color: #2d3d4e;
        height: 100px;
        
    }
    .searchDest>div{
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .searchDest>div>div{
        background-color: #fff;
        padding: 5px 20px;
        margin-right: 10px;
        border-radius: 2px;
    }
    .searchDest>div>div i{
        font-size: 22px;
        
    }
    .searchDest>div>div input{
        padding: 6px;
        border: 0;
    }
    .searchDest>div>div:last-child{
        border: 1px solid green;
        padding: 10px 25px;
        background-color: #19d3af;
    }
    .searchDest>div>div:last-child a{
        color: #ffffff;
        font-weight: 500;
        text-decoration: none;
    }
</style>
<!--************************************************* MAIN ********************************************-->
<div class="dest-main padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-12">
                        <div class="filter">
                            <h1 class="h2 text-center">Loại Hình</h1>
                            <ul>
                                <li>
                                    <input type="checkbox">Khách sạn
                                
                                </li>
                                <li><input type="checkbox">tour</li>
                            </ul>
                        </div>
                        <div class="filter">
                            <h1 class="h2 text-center">Hạng Sao</h1>
                            <ul>
                                <li>
                                    <input type="checkbox">
                                    <i class="fas fa-star"></i>
                                
                                </li>
                                <li><input type="checkbox">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><input type="checkbox">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><input type="checkbox">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li><input type="checkbox">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 dest-page">
                    <div class="dest-page-heading">
                            <h1>Khách sạn Đà Nẵng</h1>
                            <p>Có Tất cả 431 khách sạn</p>
                            <a href="#">xem Bản đồ</a>
                            <hr/>
                    </div>
                <div class="dest-page-content">
                    <div class="dest-item">
                        <div class="img">
                            <img width="100%" src="<?php echo base_url()?>public/images/dedicate/1.png"/>
                        </div>
                        <div class="content">
                            <h1>Khách Sạn Magnolia Đà Nẵng</h1>
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <a href="">06 Lê Lợi, Phường Thạch Thang, Đà Nẵng</a>
                            <p>Khách Sạn Magnolia Đà Nẵng có đội ngũ nhân viên thân thiện và phục vụ nhiệt tình, trang thiết bị hiện đại cùng nội thất bài trí rất bắt mắt. Khách sạn nằm ở trung tâm nên thuận tiện đi lại và tham quan.</p>
                            <p>760.000 đ</p>
                            <a class="button" href="#">Xem Phòng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .filter{
        box-shadow: 3px 3px 10px gray;
    }
    .filter h1{
        color: #ffffff;
        background-color: #19d3af;
        padding-top: 5px;
        padding-bottom: 5px;
        font-size: 30px;
    }
    .filter ul{
        list-style: none;
        padding: 10px;
        font-size: 18px;
    }
    .filter ul li span{
        margin-left: 10px;
    }
    .filter ul li input{
        padding: 20px;
        cursor: pointer;
    }
    .dest-page{
        padding-left: 40px;
        padding-right: 40px;
    }
    .dest-page-heading{
        width: 100%;
    }
    .dest-item{
        display: flex;
        padding: 10px;
        box-shadow: 0px 3px 5px #ccc;
    }
    .dest-item .img{
        width: 30%;
    }
    .dest-item .content{
        width: 70%;
        padding-left: 20px;
    }
    .dest-item .content h1{
        font-size: 30px;
        text-transform: capitalize;
    }
    .dest-item .content .button{
        color: #ffffff;
        background-color: red;
        text-decoration: none;
        padding: 16px 25px;
        margin-bottom: 10px;
        display: inline-block;
    }
    
</style>