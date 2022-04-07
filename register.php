<?php
include("control.php");
include("uploadfile.php");

$query = new AbstractQuery();
$upload =  new UploadFile();

$checkCookie = $query->loginWithCookie();
if ($checkCookie != null) {
	header('Location: index.php');
}
?>


<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
	<title>Contact - Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/register.css" type="text/css">


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



</head>

<body>
	<div class="header-img">
		<div class="content-header">

		</div>
	</div>
	
	<div class="container">
		<form action="" method="POST" enctype="multipart/form-data" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full name">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="">
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="">
			</div>

			<div class="input-group mb-3">
				<div class="">
					<label class="input-group-text" for="inputGroupSelect01">Gender: </label>
				</div>
				<select class="custom-select" id="inputGroupSelect01" name="gender">
					<option selected value="1">-- Chọn giới tính --</option>
					<option value="male">Nam</option>
					<option value="female">Nữ</option>
					<option value="other">Khác</option>
				</select>
			</div>


			<label>Sở thích</label>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="hoclaptrinh" value="Học lập trình">
				<label>Học lập trình</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="xemphim" value="Xem phim">
				<label>Xem phim</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="choigame" value="Chơi game">
				<label>Chơi game</label>
			</div>

			<div class="input-group mb-3 mt-3">
				<div class="">
					<span class="input-group-text" id="inputGroupFileAddon01">Upload avatar</span>
				</div>
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="file">
					<label class="custom-file-label" for="inputGroupFile01">Choose file</label>

					
				</div>
			</div>

			<div class="input-group ">
				<button type="submit" name="submit" class="btn">Register</button>
			</div>
		</form>
		<p class="login-register-text">Have an account? <a href="index.php">Login Here</a></p>
			<?php
			function checkValue()
			{
				$check = true;
				if (empty($_POST['username']) || (strlen($_POST['username']) < 5)) {
					$check = false;
					echo '<script>alert("Tên người dùng không được để trống và độ dài phải lớn hơn hoặc bằng 5")</script>';
				} else if (empty($_POST['email'])) {
					$check = false;
					echo '<script>alert("Email không được để trống")</script>';
				} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$check = false;
					echo '<script>alert("Email không đúng định dạng")</script>';
				} else if (empty($_POST['password'])) {
					$check = false;
					echo '<script>alert("Mật khẩu không được để trống và độ dài phải lớn hơn hoặc bằng 8")</script>';
				} else if ($_POST['gender'] == "1") {
					$check = false;
					echo '<script>alert("Cần chọn giới tính")</script>';
				}
				return $check;
			}
			
			if (isset($_POST['submit'])) {
				if (checkValue()) {
					global $query;
					global $upload;
					$sendEmail = $_POST['email'];
					$subject = "Dang ky thanh cong!";
					$body = "Tai khoan cua ban la: $_POST[username]";
					$altBody = "Xin cam on!";
					$favorite = "";
					if (isset($_POST['hoclaptrinh'])) $favorite .= $_POST['hoclaptrinh'] . ",";
					if (isset($_POST['xemphim'])) $favorite .= $_POST['xemphim'] . ",";
					if (isset($_POST['choigame'])) $favorite .= $_POST['choigame'] . ",";

					$favorite = substr($favorite, 0, -1);
					$avatar = $upload->upload();
					if ($avatar != null) {
						$run = $query->register($_POST['email'], $_POST['username'], md5($_POST['password']), $_POST['fullname'], $_POST['gender'], $favorite, $avatar);
						if ($run != null) {
							include("testMail.php");
							$mail = new mail();
							$mail->sendMail($sendEmail, $subject, $body, $altBody);
							echo '<script>alert("Đăng kí thành công")</script>';
						}
						
					} else
						echo '<script>alert("Upload ảnh không thành công")</script>';
				}
			}
			?>
			
		
	</div>


	<div id="footer">
		<div class="clearfix">
			<div id="connect">
				<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a><a href="http://www.freewebsitetemplates.com/misc/contact/" target="_blank" class="tumbler"></a>
			</div>
			<p>
				© 2023 Zerotype. All Rights Reserved.
			</p>
		</div>
	</div>
</body>

</html>