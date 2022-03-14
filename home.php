<?php

session_start();
error_reporting(0);
echo $_SESSION['email'];
?>
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<div id="header">
		<div>
			<div class="logo">
				<a href="home.php">Zero Type</a>
			</div>
			<ul id="navigation">
				<li class="active">
					<a href="home.php">Home</a>
				</li>
				<li>
					<a href="features.php">Features</a>
				</li>
				<li>
					<a href="news.php">News</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="adbox">
		<div class="clearfix">
			<img src="images/box.png" alt="Img" height="342" width="368">
			<div>
				<h1>Ideas?</h1>
				<h2>That's what we live for.</h2>
				<p>
					Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web.
					<span>
						<a href="" class="btn">Try it now!</a> <br>
						<div>
							<div> 
								<?php
								echo "<img src=".$_COOKIE['avatar']." width='100' height= '100' style='border-radius:50%;'>";
								?>
							</div>
							<div>
								<a href="logout.php" id="btn-1" style=" font-size: 20px; text-decoration: none;">
									Log out!
									<i style="color: red;"><?php echo $_COOKIE['username']; ?></i>
							</div>
						</div>
						</a>
						<b>Don’t worry it’s for free</b>
					</span>
				</p>
			</div>
		</div>
	</div>
	<div id="contents">
		<div id="tagline" class="clearfix">
			<h1>Design With Simplicity.</h1>
			<div>
				<p>
					You can replace all this text with your own text. Want an easier solution for a Free Website?
				</p>
				<p>
					Head straight to Wix and immediately start customizing your website!
				</p>
				<p>
					Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web.
				</p>
			</div>
			<div>
				<p>
					You can replace all this text with your own text. Want an easier solution for a Free Website?
				</p>
				<p>
					Head straight to Wix and immediately start customizing your website!
				</p>
				<p>
					Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web.
				</p>
			</div>
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