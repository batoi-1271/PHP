<?php

session_start();
error_reporting(0);

// if (isset($_SESSION['username'])) {
//     header("Location: home.php");
// }
include ("connect.php");
include ("control.php");
$get_Data = new Data();
if(isset($_POST["submit"])) {
	

	// $email = $_POST['email'];
	// $password = md5($_POST['password']);

	// $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	// $result = mysqli_query($conn, $sql);
	// if ($result->num_rows > 0) {
	// 	$row = mysqli_fetch_assoc($result);
	// 	$_SESSION['username'] = $row['username'];
	// 	header("Location: home.php");
	// } else {
	// 	echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	// }
	// $get_Login = $get_Data->select_table($_POST["email"], md5($_POST["password"]));
	// if ($get_Login > 0) {
	// 	$_SESSION['email'] = $_POST["email"];
	// 	$_SESSION['pass'] = $_POST["password"];
	// 	header("Location: home.php");
	// } else {
	// 	echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	// }

	$email1 = "";
	$get_All = $get_Data->select_all();
	foreach ($get_All as $get) {
		if ($_POST["email"] == $get["email"]) {
			$checkEmail = 1;
			$email1 = $_POST['email'];
			break;
		} else {
			$checkEmail = 0;
		}
	}
	if ($checkEmail == 0) {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
	if ($checkEmail == 1) {
		$get_Login = $get_Data->select_table($_POST["email"], md5($_POST["password"]));
		if ($get_Login == 0) {
			echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
		} else {
			$get_Username = $get_Data->select_Username($_POST["email"]);
			while($row = $get_Username->fetch_assoc() ) {
				setcookie("username",$row['username'],time()+3600);
				setcookie("avatar",$row['avatar'],time()+3600);
				break;
			}
			header("location: home.php");
		}
	}
}

$mail = $pass = "";
$mailErr = $passErr = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST["email"]) {
		$mail = test_input($_POST["email"]);
		if (!preg_match("/^[a-zA-Z-']*$/", $mail)) {
			$mailErr = "Only letters and white spaces allowed.";
		}
	}
}
if ($_POST["password"]) {
	$pass = test_input($_POST["password"]);
}

function test_input($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Contact - Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="style1.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



</head>

<body>
	<div class="content-login pt-5 pb-5">
		<div class=" row p-0 justify-content-around">
			<div class="img-logo col-3 text-center">
				<img src="./images/logo1.png" alt="" class="img-fluid">
				<h3>BaToi's House</h3>
			</div>
			<div class="form-login col-5">
				<h3>Login</h3>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="email" require>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" id="" placeholder="Password" require>
					</div>
					<p><a href="" style="color: blue; text-decoration: none;">Forgot password</a></p>
					<input type="submit" value="Submit" name="submit" class="btn1">
				</form>
				<p class="mt-3">Don't have an account? <a href="./register.php" class=" text-primary" style="text-decoration: none;">Register here</a></p>
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