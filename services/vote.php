<?php
session_start();
include('./connect.php');

if (isset($_POST['vm_addvote'])) {
  $userid = $_SESSION['userid'];
  $vm_name =  $_POST['vm_name'];
  $vm_content = $_POST['vm_content'];

  $file = $_FILES['file'];

  if ($_FILES['file']['name'] != '') {
    $allow = array("jpg", "png", "jpeg");
    $extension = explode(".", $file['name']);
    $fileExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileExt;
    $filePath = "../img/" . $fileNew;
    if (in_array($fileExt, $allow)) {
      if ($file['size'] > 0 && $file['error'] == 0) {
        move_uploaded_file($file['tmp_name'], $filePath);
      }
    }
  } else {
    $fileNew = '';
  }

  $query_insert = "INSERT INTO votes (vm_name,vm_content,vm_img,vm_own) VALUES ('$vm_name','$vm_content','$fileNew','$userid')";
  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = "เพิ่ม Vote สำเร็จ !";
  header('location:./../pages/vote.php');
}

if (isset($_POST['option_submit'])) {

  $vm_id = $_POST['vm_id'];
  $vo_name = $_POST['vo_name'];

  $query_insert = "INSERT INTO votes_option (vo_name,vo_ownvm) VALUES ('$vo_name',$vm_id)";
  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = 'เพิ่ม option สำเร็จ';
  header("location:./../pages/editvote.php?voteid=" . $vm_id);
}

if (isset($_GET['delete'])) {
  $vo_id = $_GET['vo_id'];
  $vote_id = $_GET['voteid'];
  $query_delete = "DELETE FROM votes_option WHERE vo_id = $vo_id";
  mysqli_query($conn, $query_delete);
  $_SESSION['success'] = "ลบสำเร็จ !";
  header('location:./../pages/editvote.php?voteid=' . $vote_id);
}


if (isset($_GET['voteclose'])) {
  $vote_id = $_GET['voteid'];

  $query_update = "UPDATE votes SET vm_status = 0 WHERE vm_id = $vote_id";
  mysqli_query($conn, $query_update);
  $_SESSION['success'] = 'ปิด vote สำเร็จ !';
  header('location:./../pages/vote.php');
}


if (isset($_POST['submit_vs_select'])) {
  $vm_id = $_POST['vote_id'];
  $vo_id = $_POST['vs_select'];
  $userid = $_SESSION['userid'];

  $query_insert = "INSERT INTO votes_stats (vs_own,vs_ownvo,vs_ownvm) VALUES ($userid,$vo_id,$vm_id)";
  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = "โหวตสำเร็จ";
  header('location:./../pages/votedetail.php?voteid=' . $vm_id);
}