<html>
<head> 
	<meta charset="utf-8">
	<title>Hệ thống quản lý khách sạn trực tuyến</title>
    
</head> 
<body>
    <div class="login-box">
        <div class="login-box-body">
            <h1>ĐĂNG KÝ</h1> 
            <p >Bạn Đã có tài khoản? 
                <a href="<?php echo base_url()?>admin_partner/loginpartner" class="text-blue" style="font-weight: 700">Đăng Nhập</a> ngay</p>
            <form id="signIn" method="POST" action="<?php echo base_url();?>admin_partner/signinPartner/signIn"> 
                <div class="form-control"> 
                    <label>Tên Khách Sạn</label>
                    <input type="text" id="desName" name="desName" value="" autofocus="">
                </div>
                <div class="form-control"> 
                    <label>Email</label>
                    <input type="email" id="email" name="email" value="" autofocus="">
                </div>
                <div class="form-control"> 
                    <label>Số Điện Thoại</label>
                    <input type="tel" id="phone" name="phone" value="" autofocus="">
                </div>
                <div class="form-control"> 
                    <label>Tên Đăng Nhập</label>
                    <input type="text" id="userName" name="userName" value="" autofocus="">
                </div>
                <div class="form-control"> 
                    <label>Mật Khẩu</label>
                    <input type="password" id="password" name="password" value="" autofocus="">
                </div>
                <div class="form-control"> 
                    <label>Nhập Lại Mật Khẩu</label>
                    <input type="password" id="repassword" name="password" value="" autofocus="">
                </div>
                
            </form>
            <div class="form-button">
                    <div>
                        <button id="signin" class="btn btn-primary">ĐĂNG KÝ</button>
                    </div>
                </div> 
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
            height: 70%;
            background-color: #f9fbfd;
            padding: 20px 20px;
            overflow-y: auto;
            
        }
        .login-box-body::-webkit-scrollbar{
            display: none;
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
    <script src="<?php echo base_url() ?>public/js/jquery-3.3.1.min.js"></script>
    <script>
        // kiểm tra thông tin nhập
        
        $("#signin").on("click",function(){
            if($("#desName").val() == null || $("#email").val() == null || $("#phone").val() == null ||  $("#userName").val() == null ||  $("#password").val() == null){
                alert("Hãy Nhập Đầy Đủ Thông tin !");
                return;
            }
            if($("#password").val() != $("#repassword").val()){
                alert("Mật Khẩu Không Trùng Nhau !");
                return;
            }
            $( "#signIn" ).submit();
        })
        
        
    </script>
    
    </body>
		
</html>