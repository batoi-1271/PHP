<?php
include("control.php");
$get_Content = new Data();
$content = $get_Content->select_Content_byID($_GET['content']);
?>

<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>News title - Zerotype Website Template</title>
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
				<li class="active">
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

	<div id="contents">
	<?php
		foreach ($content as $value) {
		?>
			<div class="post">

				<div class="date">
					<p>
						<span><?php echo date_format(date_create($value['date']),'m') ?></span>
						<?php echo date_format(date_create($value['date']),'Y') ?>
					</p>
				</div>
				<h1><?php echo $value['title'] ?> <span class="author"><?php echo $value['author'] ?></span></h1>
				<p style="font-style: italic;">
					<?php echo $value['s_content'] ?>
				</p>
				<p>
					<?php echo $value['full_content'] ?>
				</p>
				<span><a href="news.php" class="more">Back to News</a></span>
			</div>
	</div>
	<?php } ?>

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