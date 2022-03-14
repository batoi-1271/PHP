<?php
include('connect.php');

class Data {
    public function IN_CONTACT ($name, $email, $subject, $note) {
        global $conn;
        $sql = "INSERT INTO tb_contact(name, email, subject, note) VALUES ('$name', '$email', '$subject', '$note')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function select_table($email, $password) {
        global $conn;
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        return $num;
    }

    public function select_Username($email) {
        global $conn;
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function get_Avatar($email) {
        global $conn;
        $sql = "SELECT avatar FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function select_all() {
        global $conn;
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function upAvatar($avatar) {
        global $conn;
        $sql = "INSERT INTO user (avatar) values ('$avatar')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function select_Content() {
        global $conn;
        $sql = "SELECT * FROM tb_post";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function select_Content_byID($id) {
        global $conn;
        $sql = "SELECT * FROM tb_post WHERE id_post = '$id' ";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}



class AbstractQuery{
    public function register($email,$username,$password,$fullname,$gender,$favorite,$avatar){
        global $conn;
        $checkUsernameAndEmail = true;
        $check = "select * from user where username='$username'";
        $run = mysqli_query($conn,$check);
        if($run->num_rows > 0){
            $checkUsernameAndEmail = false;
            echo '<script>alert("Username đã tồn tại")</script>';
        }
        $check = "select * from user where email='$email'";
        $run = mysqli_query($conn,$check);
        if($run->num_rows > 0){
            $checkUsernameAndEmail = false;
            echo '<script>alert("Email đã tồn tại")</script>';
        }
        if($checkUsernameAndEmail){
            $sql="insert into user(email,username,password,fullname,gender,favorite,avatar) values ('$email','$username','$password','$fullname','$gender','$favorite','$avatar')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        return null;
        
    }
    public function login($username,$password){
        global $conn;
        $sql="select * from user where username = '$username' and password = '$password'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }

    public function loginWithCookie(){
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {	
            $username= $_COOKIE['username'];
            $password= $_COOKIE['password'];
            $run = $this->login($username,$password);
            return $run->num_rows > 0 ? $username : null;
        }
        return null;
    }
    
    public function updateAvatar($image,$username){
        global $conn;
        $sql="update user set avatar = '$image' where username='$username'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    
    public function getAvatar($username){
        global $conn;
        $sql="select avatar from user where username = '$username'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
}

