<?php
    session_start();
    if(isset($_SESSION["isOrder"])){
        if($_SESSION["isOrder"] != null){/* đặt hàng thành công */

            echo "<script type='text/javascript'>;</script>";
            echo "<script type='text/javascript'>
                    alert('Đặt hàng thành công!');
                    localStorage.clear();</script>";
            $_SESSION["isOrder"] = null; /* trả lại null để order tiếp ok =))) */
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/form.css">
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
                        if (!isset($_SESSION['username'])){
                            echo '<a onclick = "showLoginForm();" class="login-btn" href="#">
                                    <i class="ti-user"></i>
                                    <span>Login</span>
                                </a>';
                        }
                        else {
                            $user = $_SESSION['username'];
                            echo '<a class="logout-btn" href="logout.php">
                                    <span class="isLogin"; style="color: #fff;margin-right: 20px;">Hi, ' .$user .' </span>
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
                        <li><a class="menu-btn" href="index.php">Home</a></li>
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
                        <a class="search-btn menu-btn" href=""><i class="ti-search"></i></a>
                    </ul>
                </div>
                <div class="menu-btn">
                    <i id="btn-menu"class="ti-menu"></i>
                </div>
            </div>

        </div>
        <!-- end-header -->
        <!-- Slider -->
        <div id="short-slider">
            <div class="short-silder-bg">
            </div>
        </div>
        <!-- end-slider -->
        <!-- content -->
        <div id="content">
            <div class="content-section">
                <div class="products">
                    <div class="products-nav">
                        <h3>CÁC SẢN PHẨM</h3>
                        <h3>SỐ LƯỢNG</h3>
                        <h3>GIÁ BÁN</h3>
                        <h3>TỔNG TIỀN</h3>
                        <hr>
                    </div>
                    <div class="products-list">
                        <!-- <hr>
                        <div class="item">
                            <div class="item-info">
                                <img src="./assets/image/shop-items/6.png" alt="">
                                <div class="name"><h4>Recuerdos Plant</h4></div>
                            </div>
                            <div class="item quantity">
                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) && qty>1 ) effect.value--;return false;"><i class="ti-minus" aria-hidden="true"></i></span>
                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="ti-plus" aria-hidden="true"></i></span>
                            </div>
                            <div class="item-price">
                                <p>$9.99</p>
                            </div>
                            <div class="item-total">
                                <p>$9.99</p>
                            </div>
                            <div class="item-trash">
                                <i class="ti-trash"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="item">
                            <div class="item-info">
                                <img src="./assets/image/shop-items/6.png" alt="">
                                <div class="name"><h4>Recuerdos Plant</h4></div>
                            </div>
                            <div class="item quantity">
                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) && qty>1 ) effect.value--;return false;"><i class="ti-minus" aria-hidden="true"></i></span>
                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="ti-plus" aria-hidden="true"></i></span>
                            </div>
                            <div class="item-price">
                                <p>$9.99</p>
                            </div>
                            <div class="item-total">
                                <p>$9.99</p>
                            </div>
                            <div class="item-trash">
                                <i class="ti-trash"></i>
                            </div>
                        </div>
                        <hr> -->
                    </div>
                
                </div>

                <div class="products-row">

                    <!-- Voucher -->
                    <div class="voucher">
                        <h4>GIẢM GIÁ</h4>
                        <p>Coupons can be applied in the cart prior to checkout. Add an eligible item from the booth of the seller that created the coupon code to your cart. Click the green "Apply code" button to add the coupon to your order. The order total will update to indicate the savings specific to the coupon code entered.</p>
                        <form action="#" method="post">
                            <input type="text" name="voucher-code" placeholder="Nhập mã giảm giá">
                            <button type="submit">ÁP DỤNG</button>
                        </form>
                    </div>
                
                    <!-- Cart Totals -->
                    <div class="pay">
                        <h4>THANH TOÁN</h4>
                        <form action="order.php" method="post">
                        <div class="pay-address">
                            <h5>Địa Chỉ</h5>
                                <div class="diachi">
                                    <input type="text" name="tinh" id="" placeholder="Tỉnh / Thành phố" required>
                                    <input type="text" name="huyen" id="" placeholder="Quận / Huyện" required>
                                    <input type="text" name="xa" id="" placeholder="Phường / Xã" required>
                                    <input type="text" name="sonha" id="" placeholder="Số nhà" required>
                                    <input type="hidden" name="totalProducts" id="">
                                    <div class="arrProducts"></div>
                                </div>
                        </div>
                        <div class="pay-detail">
                            <!-- <div class="pay-price">
                                <h5>Tổng Tiền Hàng</h5>
                                <h5>$9.99</h5>
                            </div>
                            <div class="pay-ship">
                                <h5>Phí vận chuyển</h5>
                                <h5>$2</h5>
                            </div>
                            <div class="pay-total">
                                <h5>Tổng Thanh Toán</h5>
                                <h5>$11.99</h5>
                            </div> -->
                        </div>
                        <a href=""><button class="btn-order">TIẾN HÀNH ĐẶT HÀNG</button></a>
                        </form>
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
<!-- modal login  -->
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
    <script src="./assets/js/cart.js"></script>
</body>
</html>