<?php
include('./connect.php');
session_start();



if (isset($_POST['register_submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password-confirm'];

  $query_check = "SELECT * FROM users WHERE user_name = '$username'";
  $result_check = mysqli_query($conn, $query_check);

  if ($password !== $password_confirm) {
    $_SESSION['error'] = "รหัสผ่านและรหัสผ่านยืนยันไม่ตรงกัน !";
    header('location:./../pages/register.php');
  } else {
    if (mysqli_num_rows($result_check) != 0) {
      $_SESSION['error'] = "มีชื่อผู้ใช้งานระบบอยู่แล่ว <a href='./../pages/login.php'>เข้าสู่ระบบ</a>";
      header('location:./../pages/register.php');
    } else {
      $query_insert = "INSERT INTO users (user_name,user_password) VALUES ('$username','$password')";
      mysqli_query($conn, $query_insert);
      $_SESSION['error'] = "Register สำเร็จ เข้าสู่ระบบได้เลย";
      header('location:./../pages/login.php');
    }
  }
}