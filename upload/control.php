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
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        return $num;
    }

    public function select_all() {
        global $conn;
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function upAvatar($avatar) {
        global $conn;
        $sql = "INSERT INTO users (avatar) values ('$avatar')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    // public function select_
}
