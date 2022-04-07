<?php
session_start();
error_reporting(0);
echo $_SESSION['email'];

include ("control.php");
$get_Content = new Data();
$post = $get_Content->select_Content();

?>
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
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
					<a href="update_post.php">Update post</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="content">
        <h3>Post new <a href="./insert_post.php"><i class="fas fa-plus"></i></a></h3>
        
        <table id="post">
            <tr>
                <th>STT</th>
                <th>Author</th>
                <th>Title</th>
                <th>Date</th>
                <th>Short content</th>
                <th>Full content</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php
            foreach ($post as $se) {
             ?>

            <tr>
                <td><?php echo $se['id_post'] ?></td>
                <td><?php echo $se['author'] ?></td>
                <td><?php echo $se['title'] ?></td>
                <td><?php echo $se['date'] ?></td>
                <td><?php echo $se['s_content'] ?></td>
                <td><?php echo $se['full_content'] ?></td>
                <td style="text-align: center;"><a href="update_post.php?update=<?php echo $se['id_post'] ?>"><i class="fas fa-edit"></i></a></td>
                <td style="text-align: center;"><a href="./post/delete_post.php?delete=<?php echo $se['id_post'] ?>" onclick="return (confirm('ban co muon xoa khong?'))"><i class="fas fa-times"></i></a></td>
            </tr>
         <?php } ?>
        </table>
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