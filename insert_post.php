<?php
session_start();
error_reporting(0);
echo $_SESSION['email'];

include("control.php");
$get_Content = new Data();
$post = $get_Content->select_Content_byID($_GET['update']);

?>
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Insert post</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="table.css">
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
					<a href="admin.php">Admin</a>
				</li>
				<li>
					<a href="update_post.php">Updatepost</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="content container">
		<h3 class="m-5">Insert post</h3>
		<form method="POST">
			<div class="form-group row">
				<label for="inputID" class="col-sm-2 col-form-label">STT</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputID" name="id" value="<?php echo $value['id_post'] ?>">
				</div>
			</div>

			<div class="form-group row">
				<label for="inputAuthor" class="col-sm-2 col-form-label">Author</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputAuthor" name="author" value="<?php echo $value['author'] ?>">
				</div>
			</div>

			<div class="form-group row">
				<label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputTitle" name="title" value="<?php echo $value['title'] ?>">
				</div>
			</div>

			<div class="form-group row">
				<label for="inputDate" class="col-sm-2 col-form-label">Date</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputDate" name="date" value="<?php echo $value['date'] ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="areaContent">Short content</label>
				<textarea class="form-control" id="areaContent" rows="3" name="sContent" ><?php echo $value['s_content'] ?></textarea>
			</div>

			<div class="form-group">
				<label for="areaFullContent">Full content</label>
				<textarea class="form-control" id="areaFullContent" rows="5" name="fullContent" ><?php echo $value['full_content'] ?></textarea>
			</div>

			<div class="form-group d-flex justify-content-center">
				<button type="submit" class="btn btn-primary btn-lg mr-3" name="submit">Save</button>
				<button type="submit" class="btn btn-secondary btn-lg" name="cancel">Cancel</button>
			</div>
		</form>
		<?php
		if (isset($_POST['submit'])) {
			$update = $get_Content->insert_POST($_POST['author'], str_replace("'", "\'", $_POST['title']), 
					$_POST['date'], str_replace("'", "\'", $_POST['sContent']), str_replace("'", "\'", $_POST['fullContent']), $_GET['update'] );
			if ($update) {
				echo "<script>alert('Insert Successfull!!'); window.location = ('admin.php')</script>";
			} else {
				echo "Fail";
			}
		}

		if (isset($_POST['cancel'])) {
				echo "<script>alert('Insert Fail!!'); window.location = ('admin.php')</script>";
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