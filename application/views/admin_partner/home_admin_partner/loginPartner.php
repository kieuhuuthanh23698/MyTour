<html>
<head> 
	<meta charset="utf-8"> 
<!--	<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
	<title>Hệ thống quản lý khách sạn trực tuyến</title>
<!--	<meta name="robots" content="noindex, nofollow"> -->
</head> 
<body>
    <div class="login-box">
        <div class="login-box-body">
            <h1>ĐĂNG NHẬP</h1> 
            <p >Chưa có tài khoản? 
                <a href="<?php echo base_url()?>admin_partner/signinPartner" class="text-blue" style="font-weight: 700">Đăng ký</a> ngay</p>
            <form method="POST" action="<?php echo base_url();?>admin_partner/loginpartner/login"> 
                <div class="form-control"> 
                    <label>TÀI KHOẢN</label>
                    <input type="text" name="use_login" value="" autofocus="">
                </div>
                <div class="form-control"> 
                    <label>MẬT KHẨU</label> 
                    <input type="password" name="password">
                </div> 
                <div class="form-button"> 
<!--
                    <div>
                        <a href=""> Quên mật khẩu</a> 
                    </div> 
-->
                    <div>
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ĐĂNG NHẬP</button>
                    </div>
                </div> 
            </form>
        </div> 
    </div>
    <style>
        .login-box{
            background-image: url("<?php echo base_url()?>public/images/banner/polynesia-3021072_1280.jpg");
            background-size: cover;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box-body{
            display: block;
            width: 420px;
            background-color: #f9fbfd;
            padding: 30px 20px;
        }
        .form-control{
            margin-bottom: 10px;
        }
        .form-control input{
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            margin-top: 10px;
        }
        .form-button button{
            width: 100%;
            padding: 10px;
            color: #ffffff;
            text-transform: uppercase;
            background-color: #00aaf7;
            cursor: pointer;
            font-size: 18px;
            margin-top: 10px;
            border: 0;
        }
    </style>
		</body>
		
		</html>