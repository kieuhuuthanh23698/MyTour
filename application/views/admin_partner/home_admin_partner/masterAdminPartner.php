<?php if(isset($_SESSION['partner'])) {?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Tour</title>
        <link type="image/x-icon" rel="shortcut icon" href="<?php echo base_url()?>public/images/logo/favicon.ico" />
        <link type="image/x-icon" rel="icon" href="<?php echo base_url()?>public/images/logo/favicon.ico"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.css"/>
            
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/fontawesome-all.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/jquery-ui.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/styleAdminPartner.css"/>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        
        <script src="<?php echo base_url() ?>public/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>public/js/jquery-ui.min.js"></script>
        
        <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url()?>public/js/jquery.dataTables.min.js"></script>

    </head>
    <body>
        <style type="text/css">
            .sub-list{
                margin-top: 35px;
            }
        </style>
        <header>
            <nav>
                <div class="logo">
                    <img width="172px" src="<?php echo base_url()?>public/images/logo/logo.png"/>
                    <span id="listfunction-btn"><i class="fas fa-bars"></i></span>
                </div>
                <div class="menu">
                    <ul style="top: 70px">
                        <li><a href="<?php echo base_url()?>"><span class="home"><i class="fas fa-home"></i></span>Trang Chủ</a></li>
                        <li><a href="#"><span class="admin"><i  class="fas fa-user-tie"></i></span > <?php echo isset($_SESSION["partner"])?$_SESSION["partner"]["username"]:"" ?></a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <div class="main">
            <div class="main-bg">
                <div class="item">
                    <?php echo isset($body)?$body:"" ?>
                </div>
            </div>
            
                <div class="listfunction">
                    <ul>
                        <li>
                            <ul class="sub-list">
                                <li><i class="fas fa-user-tie"></i></li>
                                <li>Admin<br/>Quản Trị Viên</li>
                                <li><a href="#"><i class="fas fa-cogs"></i></a></li>
                            </ul>
                        </li>
                        <li id="gray">Chức Năng Quản Trị</li>
                        <li><a href="<?php echo base_url()?>admin_partner/inforPartner"><span><i class="fas fa-cart-plus"></i></span>Thông Tin Khách Sạn</a></li>
                        <li><a class="" href="<?php echo base_url()?>admin_partner/billsAdminPartner"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Đơn Đặt Phòng</a></li>
                        <li><a href="<?php echo base_url()?>admin_partner/roomPartner"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Phòng</a></li>
                        <li><a href="<?php echo base_url()?>admin_partner/convenPartner"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Dịch vụ</a></li>
                        <li><a href="<?php echo base_url()?>admin_partner/servicePartner"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Tiện Nghi</a></li>
                        <li><a style="background: lightseagreen" href="<?php echo(base_url())?>/admin_partner/loginpartner/logout" class='text-center'>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        
        <style>
            .a{
                pointer-events: none;
                cursor: default;
                opacity: 0.6;
            }
        </style>
        
    </body>
    <script>
        $("#listfunction-btn").on("click",function(){
            $(".listfunction").toggleClass("d-block");
        })
    </script>
</html>
<?php } 
    else
        redirect(base_url('admin_partner/loginpartner'));
?>