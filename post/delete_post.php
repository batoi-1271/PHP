<?php
include ("../control.php");    
$delete_Post = new Data();
$delete = $delete_Post->delete_Post($_GET["delete"]);

if ($delete) {
    echo "<script>alert('Xoa thanh cong!!'); window.location = ('../admin.php')</script>";
} else {
    echo "<script>alert('Khong thanh cong!!')</script>";
}
?>