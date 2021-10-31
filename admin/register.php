<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>

<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4 class="text-center">Đăng ký Admin</h4>
			<p class="message"></p>
			<form id="admin-register-form">
			  <div class="form-group">
			    <label for="name">Tên</label>
			    <input type="text" class="form-control" name="name" id="name">
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" name="email" id="email">
			    
			  </div>
			  <div class="form-group">
			    <label for="password">Mật khẩu</label>
			    <input type="password" class="form-control" name="password" id="password">
			  </div>
			  <div class="form-group">
			    <label for="cpassword">Nhập lại mật khẩu</label>
			    <input type="password" class="form-control" name="cpassword" id="cpassword">
			  </div>
			  <input type="hidden" name="admin_register" value="1">
			  <button type="button" class="btn btn-primary register-btn">Đăng kí</button>
			</form>
		</div>
	</div>
</div>





<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
