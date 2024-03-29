<header>
    <div class="container header-top">
        <div class="contact">
            <p><i class="fas fa-phone"></i><strong>Hà Nội: </strong>098477383883</p>
            <p><i class="fas fa-phone"></i><strong>TP Hồ Chí Minh: </strong>098477383883</p>
        </div>
        <ul>
            <li><i class="far fa-comments"></i></li>
            <li><a href="#"></a><i class="far fa-bell"></i></li>
            <li id="user-li"><button id="user"><i class="fas fa-user-circle"></i></button><span id="username"><?php echo isset($_SESSION["user"])?$_SESSION["user"]["username"]:"" ?></span>
                <?php if(isset($_SESSION["user"])){
                echo('
                <ul class="sub-menu">
                <li></li>
                <li><a href="'.base_url().'Handling/thongtintaikhoan">Thông Tin Tài Khoản</a></li>
                            <li><a href="#">Danh Sách Đơn Hàng</a></li>
                            <li><a href="'.base_url().'Handling/logout">Đăng Xuất</a></li>
                            
                        </ul>
                            ');
                        } ?>
                        
                        
                    </li>
                </ul>
            </div>
            <nav class="container logo-menu">
                <div class="logo">
                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>/public/images/logo/logo.png"/></a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a class="<?php echo isset($sanpham)? "active":" "; ?>" href="<?php echo base_url() ?>">Khách Sạn</a></li>
                        <li><a class="" href="">Ưu Đãi</a></li>
                        <li><a class="" href="#">Tour</a></li>
                        <li><a class="" href="#">Cẩm Nang Du Lịch</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Handling/lienhe">Liên hệ</a></li>
                    </ul>
                </div>
                <span id="list-icon">
                    <i class="fas fa-th-list"></i>
                </span>
            </nav>
        </header>
    <?php if(!isset($_SESSION["user"])){
        
        echo ('<div class="signin" id="signin">
            <div class="delete-btn">
                <button id="delete"><i class="fas fa-times"></i></button>
            </div>
            <h1 class="h2 text-center">Welcome Back</h1>
            <p class="text-center">Fill out the form to get started</p>
            <form class="mt-5" action ="'.base_url().'Handling/login" method = "post">
                <div>
                    <span><i class="fas fa-user"></i></span>
                    <input type="text" name="username" id="username" placeholder="username"/>
                </div>
                <div>
                    <span><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" id="password" placeholder="password"/>
                </div>
                <div class="forget">
                    <a href="#">forget password</a>
                </div>
                <input type="submit" class="login" value="Login"/>
            </form>
            <p class="text-center mt-1" style="font-size: 14px">Do not have an account?<button id="signup-btn" class="sign-btn"> Signup</button></p>
            <div class="signin-img">
                <img width="100%" src="'.base_url().'public/images/banner/signin-3.png"/>
            </div>
        </div>
        <div class="signin" id="signup">
            <div class="delete-btn">
                <button id="delete"><i class="fas fa-times"></i></button>
            </div>
            <div class="scroll">
            <h1 class="h2 text-center">Welcome To Front</h1>
            <p class="text-center">Fill out the form to get started</p>
            <form class="mt-5">
                <div>
                    <span><i class="fas fa-user"></i></span>
                    <input type="text" name="username" id="username" placeholder="username"/>
                </div>
                <div>
                    <span><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" id="password" placeholder="password"/>
                </div>
                <div>
                    <span><i class="fas fa-lock"></i></span>
                    <input type="password" name="repassword" id="repassword" placeholder="repassword"/>
                </div>
                <div>
                    <span><i class="fas fa-phone"></i></span>
                    <input type="text" name="phone" id="phone" placeholder="phone number"/>
                </div>
                <div>
                    <span><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" id="email" placeholder="email"/>
                </div>
                <input style="margin-top: 20px" type="submit" class="login" value="Signup"/>
                
            </form>
            <p class="text-center mt-1" style="font-size: 14px">Already have an account<button id="signin-btn" class="sign-btn"> Signin</button></p>
            
            </div>
            <div class="signin-img">
                <img width="100%" src="'. base_url().'public/images/banner/signin-3.png"/>
            </div>
        </div>');
            } ?>
