<html>
<head> 
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng nhập tài khoản -  HMS Hệ thống quản lý khách sạn trực tuyến</title>
	<meta name="robots" content="noindex, nofollow"> 
	<link rel="stylesheet" href="https://betahms.mytour.vn/dist/app.2d290b316b5a2f7d1e30.css" type="text/css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:500,700&amp;subset=vietnamese" type="text/css">  
</head> 
<body class="hold-transition login-page skin-blue" background="<?php echo base_url()?>/public/images/beach.jpg" style="background-size: cover;">  
	<!-- <video id="bgvid" playsinline="" autoplay="" muted="" loop="">
		<source src="https://s3-ap-southeast-1.amazonaws.com/mytourcdn.com/video/bg-video-mp4.mp4" type="video/mp4"> 
	</video>  -->

<!-- 		<div class="video-bg"><img id = "bgvid" src="<?php echo base_url()?>/public/images/beach.jpg"></div>   -->
		 <div class="login-box">
			<div class="login-box-body">
				<h1>ĐĂNG NHẬP</h1> 
				<p class="login-box-msg" style="color: #8a98a6">Chưa có tài khoản? 
					<a href="" class="text-blue" style="font-weight: 700">Đăng ký</a> ngay</p>
					<form method="POST" action="<?php echo base_url();?>admin_partner/loginpartner/login"> 
						<div class="form-group has-feedback "> 
							<label style="color:#3f556b">TÀI KHOẢN</label>
							<input type="text" name="use_login" value="" autofocus="" class="form-control"> 
							<span class="fa fa-user form-control-feedback" style="color: #eaecef"></span> 
						</div>
						<div class="form-group has-feedback "> 
							<label style="color:#3f556b">MẬT KHẨU</label> 
							<input type="password" name="password" class="form-control">
							<span class="fa fa-lock form-control-feedback" style="color: #eaecef"></span> 
						</div> 
						<div class="row"> 
							<div class="col-xs-7"> 
								<div class="checkbox" style="margin-top: 0; margin-bottom: 24px;"> 
									<label>
										<input type="checkbox" name="remember"> 
										<span style="color:#8a98a6">Lưu tài khoản</span>
									</label>
								</div> 
							</div> 
							<div class="col-xs-5">
								<a href="" class="text-red pull-right"> Quên mật khẩu</a> 
							</div> 
							<div class="col-xs-12">
								<button type="submit" class="btn btn-primary btn-block btn-flat">ĐĂNG NHẬP</button>
							</div>
						</div> 
					</form>
				</div> 
			</div> 
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>  
		</body>
		<div style="position: absolute; top: 0px;">

		</div>
		</html>