
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <!-- <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300&display=swap" rel="stylesheet">
    
    <title>Garden UT</title>
</head>
<body>
    <div id="main">
        <!-- Header -->
        <div id="header">
            <div id="top" class="top-header row">
                <div class="top-header-left">

                    
                    <a href="https://ut.edu.vn/">
                        <i class="ti-email"></i>
                        <span>Email:ut.edu.vn</span>
                    </a>
                    <a href="">
                        <i class="ti-mobile"></i>
                        <span>0123456789</span>
                    </a>
                </div>
                <div class="top-header-right">
                    <?php
                        session_start();
                        if (!isset($_SESSION['username'])){
                            echo '<a class="login-btn" href="#">
                                    <i class="ti-user"></i>
                                    <span>Login</span>
                                </a>';
                        }
                        else {
                            $user = $_SESSION['username'];
                            echo '<a class="logout-btn" href="logout.php">
                                    <span style="color: #fff;margin-right: 20px;">Hi, ' .$user .' </span>
                                    <span>Logout</span>
                                </a>';
                        }
                    ?>
                    <a href="cart.php">
                        <i class="ti-shopping-cart"></i>
                        <span>Cart [ <span class="cart-quantity"> 0 </span> ]</span>
                    </a>
                </div>
            </div>

            <div class="bottom-header">
                <a class="header-logo" href="index.php"><img src="./assets/image/logo/logo.png" alt="">
                    <span>Garden UT</span></a>
                <div class="header-content">    
                    <ul class="nav">
                        <li><a class="menu-btn" href="#">Home</a></li>
                        <li><a class="menu-btn" href="#about">About</a></li>
                        <li>
                            <a class="menu-btn" href="shop.php">Shop
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul  class="subnav">
                                <li><a href="#new-arrival">Sản phẩm mới</a></li>
                                <li><a href="">Cây cảnh văn phòng</a></li>
                                <li><a href="">Cây cảnh trong nhà</a></li>
                                <li><a href="">Xương rồng</a></li>
                                <li><a href="">Sen đá</a></li>
                                <li>
                                    <a href="">Hoa
                                        <i class="ti-angle-right"></i>
                                    </a>
                                    
                                    <ul class="subnav-2">
                                        <li><a href="">Sinh nhật</a></li>
                                        <li><a href="">Đám cưới</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a class="menu-btn" href="#contact">Contact</a></li>
                        <li><a class="menu-btn search-btn" href=""><i class="ti-search"></i></a></li>
                    </ul>
                </div>
                <div class="menu-btn">
                    <i id="btn-menu"class="ti-menu"></i>
                </div>
            </div>

        </div>
        <!-- end-header -->
        <!-- Slider -->
        <div id="slider">
            <div class="silder-bg"></div>
            <div class="slider-text">
                <h1>Thực vật tồn tại trong thời tiết và những tia sáng <br> bao quanh chúng</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque ante nec ipsum iaculis, ac iaculis ipsum porttitor. Vivamus cursus nisl lectus, id mattis nisl lobortis eu. Duis diam augue, dapibus ut dolor at, mattis maximus dolor.</p>
                <div class="slider-btn">
                    <a href="" class="get-started">
                        GET STARTED                
                    </a>
                    <a href="" class="contact-us">
                        CONTACT US!
                    </a>
                </div>
            </div>
            </div>
        <!-- end-slider -->
        <!-- content -->
        <div id="content" >
            <div id="about" class="content-section">
                <div class="section-heading">ABOUT US</div>
                <div class="section-sub-heading">We are leading in the plants service fields</div>
                <p class="about-top">
                    Quisque orci quam, vulputate non commodo finibus, molestie ac ante. Duis in sceleri quesem. Nulla sit amet varius nunc. Maecenas dui, tempeu ullam corper in.
                </p>

                <div class="row about-list">
                    <div class="col-4 about-item">
                        <img class="about-img" src="./assets/image/about/b1.png" alt="">
                        <div>
                            <h5 class="about-heading">Quality Products</h5>
                            <p class="about-text">ntiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                        </div>
                    </div>
                    <div class="col-4 about-item">
                        <img class="about-img" src="./assets/image/about/b2.png" alt="">
                        <div>
                            <h5 class="about-heading">Quality Products</h5>
                            <p class="about-text">ntiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                        </div>
                    </div>
                    <div class="col-4 about-item">
                        <img class="about-img" src="./assets/image/about/b3.png" alt="">
                        <div>
                            <h5 class="about-heading">Quality Products</h5>
                            <p class="about-text">ntiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                        </div>
                    </div>
                    <div class="col-4 about-item">
                        <img class="about-img" src="./assets/image/about/b4.png" alt="">
                        <div>
                            <h5 class="about-heading">Quality Products</h5>
                            <p class="about-text">ntiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-section grid-image">
                <div class="grid-image-item item1"><img src="./assets/image/sanpham/phong-lado-bonsai29.jpg" alt=""></div>
                <div class="grid-image-item item2"><img src="./assets/image/sanpham/sen-da-thai-2.jpg" alt=""></div>
                <div class="grid-image-item item3"><img src="./assets/image/sanpham/cay-binh-an-3.jpg" alt=""></div>
                <div class="grid-image-item item4"><img src="./assets/image/sanpham/xuong-rong-astro-1.jpg" alt=""></div>
                <div class="grid-image-item item5"><img src="./assets/image/sanpham/hoa-sinh-nhat.jpg" alt=""></div>
                <div class="grid-image-item item6"><img src="./assets/image/sanpham/hoa-de-ban-dam-cuoi.jpg" alt=""></div>
            </div>

            <div id="new-arrival">
                <div class="content-section">
                    <div class="section-heading">NEW ARRIVALS</div>
                    <div class="section-sub-heading">We have the latest products, it must be exciting for you</div>
                    
                    <div class="row arrival-list">

                        <!-- <div id="item1" class="col-4 arrival-item">
                            <div class="arrival-img">
                                <img src="./assets/image/arrivals/9.jpg" alt="">
                            </div>
                            <div class="add-to-cart-btn">Thêm vào giỏ</div>
                            <div class="arrival-info">
                                <div class="arrival-name">Cactus Flower</div>
                                <div class="arrival-cost">100.000</div>
                            </div>
                        </div>

                        <div id="item2" class="col-4 arrival-item">
                            <div class="arrival-img">
                                <img src="./assets/image/arrivals/10.jpg" alt="">
                            </div>
                            <div class="add-to-cart-btn">Thêm vào giỏ</div>
                            <div class="arrival-info">
                                <div class="arrival-name">Cactus Flower</div>
                                <div class="arrival-cost">100.000</div>
                            </div>
                        </div>

                        <div id="item3" class="col-4 arrival-item">
                            <div class="arrival-img">
                                <img src="./assets/image/arrivals/11.jpg" alt="">
                            </div>
                            <div class="add-to-cart-btn">Thêm vào giỏ</div>
                            <div class="arrival-info">
                                <div class="arrival-name">Cactus Flower</div>
                                <div class="arrival-cost">100.000</div>
                            </div>
                        </div>

                        <div id="item4" class="col-4 arrival-item">
                            <div class="arrival-img">
                                <img src="./assets/image/arrivals/12.jpg" alt="">
                            </div>
                            <div class="add-to-cart-btn">Thêm vào giỏ</div>
                            <div class="arrival-info">
                                <div class="arrival-name">Cactus Flower</div>
                                <div class="arrival-cost">100.000</div>
                            </div>
                        </div> -->
                    </div>
                    <a href="shop.php" class="view-all-btn">VIEW ALL</a>
                </div>
            </div>

            <div class="feature-banner">
                <div class="opacity">
                    <h2>Chúng tôi cung cấp các dịch vụ chất lượng cao và các giải pháp sáng tạo cho sự tăng trưởng thực tế</h2>
                </div>
            </div>

            <div id="contact" class="content-section">
                <div class="section-heading">GET IN TOUCH</div>
                <div class="section-sub-heading">Send us a message, we will call back later</div>
                <div class="row contact">                
                    <div class="col-2 ">
                        <form class="contact-form" action="">
                            <row>
                                <col-2><input id="name" type="text" placeholder="Your Name"></col-2>
                                <col-2><input id="email" type="email" placeholder="Your Email"></col-2>
                            </row>
                            <row>
                                <textarea placeholder="Message" name="" id="message" cols="30" rows="10"></textarea>
                            </row>
                            <input class="submit-btn" type="submit">
                        </form>
                    </div>               
                    <div class="col-2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0835321075647!2d106.71489441462275!3d10.804914192302219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a3fbdbffff%3A0xbb015754eb33299c!2zVFLGr-G7nE5HIMSQ4bqgSSBI4buMQyBHSUFPIFRIw5RORyBW4bqsTiBU4bqiSSBUUC4gSENNIFBow7JuZyBDw7RuZyB0w6FjIFNpbmggdmnDqm4!5e0!3m2!1svi!2s!4v1634741499464!5m2!1svi!2s" width="100%" height="400" style="margin-top:20px;border:0;box-shadow: 0 5px 30px 0 rgb(0 0 0 / 15%);" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
           
            </div>
            
        </div>
        <!-- end-content -->
        <!-- footer -->
        <div id="footer">
            <div class="footer-bg"></div>
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="./assets/image/logo/logo.png" alt="">
                    <p>Lorem ipsum dolor sit samet, consectetur adipiscing elit. India situs atione mantor</p>
                    <div class="footer-social">
                        <div class="social-icon">
                            <a href="" class=""><i class="ti-facebook"></i></a>
                        </div>
                        <div class="social-icon">
                            <a href="" class=""><i class="ti-twitter-alt"></i></a>
                        </div>
                        <div class="social-icon">
                            <a href="" class=""><i class="ti-google"></i></a>
                        </div>
                        <div class="social-icon">
                            <a href="" class=""><i class="ti-instagram"></i></a>
                        </div>            
                    </div>
                </div>
                <div class="footer-contact">
                    <p><span>Địa chỉ:</span> 2 Võ Oanh, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh</p>
                    <p><span>Số liên lạc:</span> +1 234 122 122</p>
                    <p><span>Email:</span> https://ut.edu.vn/</p>
                    <p><span>Giờ mở cửa:</span> Thứ 2 - Chủ nhật: 8AM-9PM</p>
                </div>
            </div>
        </div>
    </div>

    <!-- login form -->
    <div class="modal-login">
        <div class="container right-panel-active">
            <div class="container__form container--signup">
                <form action="register.php" method="POST" onsubmit="return validateForm();" class="form" id="form1">
                    <h2 class="form__title">Đăng Kí</h2>
                    <input type="text" name="username" placeholder="Tên đăng nhập" class="input" required/>
                    <input type="text" name="phone" placeholder="Số điện thoại" class="input" minlength=10 required/>
                    <input type="password" name="password" id="pass" placeholder="Mật khẩu" minlength=6 class="input" required/>
                    <input type="password" name="re_password" id="re_pass" placeholder="Nhập lại mật khẩu" minlength=6 class="input" required/>
                    <button class="btn">ĐĂNG KÍ</button>
                </form>
            </div>
        
            <div class="container__form container--signin">
                <form action="login.php?do=login" method="POST" class="form" id="login">
                    <h2 class="form__title">Đăng Nhập</h2>
                    <input type="text" name="username" placeholder="Tên đăng nhập" class="input" required/>
                    <input type="password" name="password"  placeholder="Mật khẩu" class="input" required/>
                    <a href="#" class="link">Quên mật khẩu?</a>
                    <button type="submit" name="login" class="btn">ĐĂNG NHẬP</button>
                </form>
            </div>
        
            <div class="container__overlay">
                <div class="overlay">
                    <div class="overlay__panel overlay--left">
                        <button class="btn" id="signUp">ĐĂNG KÍ</button>
                    </div>
                    <div class="overlay__panel overlay--right">
                        <button class="btn" id="signIn">ĐĂNG NHẬP</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
	function validateForm() {
		var pass = document.querySelector('#pass').value;
		var re_pass = document.querySelector('#re_pass').value;
		if(pass != re_pass) {
			alert("Mật khẩu không trùng khớp, vui lòng kiểm tra lại");
			return false
		}
		return true
	}
</script>
<script>
    const signInBtn = document.getElementById("signIn");
    const signUpBtn = document.getElementById("signUp");
    const fistForm = document.getElementById("form1");
    const secondForm = document.getElementById("form2");
    const container = document.querySelector(".container");

    signUpBtn.addEventListener("click", ()=>{
    container.classList.remove("right-panel-active");
    });
    signInBtn.addEventListener("click", ()=>{
    container.classList.add("right-panel-active");
    });

    // fistForm.addEventListener("submit", (e) => e.preventDefault());
    // secondForm.addEventListener("submit", (e) => e.preventDefault());
</script>
<script src="./assets/js/app.js"></script>
</body>
</html>