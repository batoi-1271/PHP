
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<div class="logo">
				<a href="home.php">Zero Type</a>
			</div>
			<ul id="navigation">
				<li>
					<a href="home.php">Home</a>
				</li>
				<li>
					<a href="features.php">Features</a>
				</li>
				<li>
					<a href="news.php">News</a>
				</li>
				<li>
				<a href="admin.php">Admin</a>
				</li>
				<li class="active">
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="contents">
		<div class="section">
			<h1>Contact</h1>
			<p>
				You can replace all this text with your own text. Want an easier solution for a Free Website? Head straight to Wix and immediately start customizing your website! Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web. All Wix templates are fully customizable and free to use. Just pick one you like, click Edit, and enter the online editor.
			</p>
			<form action="" method="post" class="message">
				<input type="text" name="name" value="Name" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input type="text" name="email" value="Email" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input type="text" name="subject" value="Subject" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<textarea name="txtMess"></textarea>
				<input type="submit" name="btnSend" value="Send"/>
			</form>
			<?php
			include ('control.php');
			$get_Data = new Data(); // Gọi đến class trong Control.
			if(isset($_POST['btnSend'])) {
				if (empty($_POST['email'])) {
					$emailErr = "Email là trường bắt buộc";
				} else {
					$insert_contact = $get_Data->IN_CONTACT($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['txtMess']);
				if ($insert_contact) {
					echo "<script>alert('Lien hệ thành công!')</script>";
				} else {
					echo "<script>alert('Lien hệ thất bại!')</script>";
				}
				}
				
			}
			?>
		</div>
		<div class="section contact">
			<p>
				For Inquiries Please Call: <span>877-433-8137</span>
			</p>
			<p>
				Or you can visit us at: <span>ZeroType<br> 250 Business ParK Angel Green, Sunville 109935</span>
			</p>
		</div>
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