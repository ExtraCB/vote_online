<?php
session_start();
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = "เข้าสู่ระบบก่อนใช้งาน ";
  header('location:./../pages/login.php');
}