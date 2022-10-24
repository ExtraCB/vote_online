<?php
include('./connect.php');
session_start();



if (isset($_POST['login_submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $query_check = "SELECT * FROM users WHERE user_name = '$username' AND user_password = '$password'";
  $result_check = mysqli_query($conn, $query_check);
  $result_fetch = mysqli_fetch_assoc($result_check);


  if (mysqli_num_rows($result_check) != 0) {
    $_SESSION['userid'] = $result_fetch['user_id'];
    $_SESSION['username'] = $result_fetch['user_name'];
    header('location:./../pages/homepage.php');
  } else {
    $_SESSION['error'] = "ชื่อหรือรหัสผ่านผิด";
    header('location:./../pages/login.php');
  }
}