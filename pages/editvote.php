<?php
require_once('./../services/functions/securecheck.php');
include('./../services/connect.php');
require_once("./../services/functions/vote_single.php");
include('./../services/functions/vote_option.php');
include('./../services/functions/vote_count.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Vote</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php') ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-2"></div>

      <div class="col-8">
        <?php include('./components/error.php') ?>

        <h3>Vote Edit</h3>

        <div class="card">
          <div class="card-header"> <?= $vote['vm_name'] ?></div>
          <div class="card-body">
            <p class="card-text"><?= $vote['vm_content'] ?></p>
          </div>
          <div class="card-footer">
          </div>
        </div>

      </div>
      <div class="col-2"></div>
    </div>
    <hr>
    <div class="row">
      <div class="col-2"></div>

      <div class="col-8">
        <h3>Vote Options</h3>

        <form action="./../services/vote.php" method="post">
          <input type="hidden" name="vm_id" value="<?= $vote['vm_id'] ?>">
          <input type="text" name="vo_name" placeholder="" class="form-control mb-2" id="">
          <input type="submit" value="เพิ่ม" name="option_submit" class="btn btn-primary mb-2">
        </form>

      </div>
      <div class="col-2"></div>
      <hr>

    </div>
    <div class="row">
      <div class="col-2"></div>

      <div class="col-8">
        <h3>Vote List</h3>

        <table class="table">
          <tr>
            <th>รหัส Vote</th>
            <th>เนื้อหา Vote</th>
            <th>จัดการ</th>
          </tr>
          <?php

          while ($result_vote_option_fetch = mysqli_fetch_assoc($result_vote_option)) { ?>
          <tr>
            <td><?= $result_vote_option_fetch['vo_id'] ?></td>
            <td><?= $result_vote_option_fetch['vo_name'] ?></td>
            <td><a
                href="./../services/vote.php?delete=1&vo_id=<?= $result_vote_option_fetch['vo_id'] ?>&voteid=<?= $vote['vm_id'] ?>"
                class="btn btn-danger">ลบ</a></td>
          </tr>
          <?php  } ?>
        </table>

      </div>
      <div class="col-2"></div>
    </div>


    <div class="row">
      <div class="col-2"></div>

      <div class="col-8">
        <h3>Vote Sumary</h3>

        <table class="table">
          <tr>
            <th>รหัส Vote</th>
            <th>เนื้อหา Vote</th>
            <th>ผลการโหวต</th>
          </tr>
          <?php
          while ($result_vote_option_count = mysqli_fetch_assoc($result_vote_count)) {
            $vs_ownvm = $vote['vm_id'];
            $vs_ownvo = $result_vote_option_count['vo_id'];

            $query_count = "SELECT COUNT(vs_id) FROM `votes_stats` WHERE vs_ownvm = $vs_ownvm AND vs_ownvo = $vs_ownvo";

            $result_count = mysqli_query($conn, $query_count);
            $result_fetch_count = mysqli_fetch_assoc($result_count);
          ?>
          <tr>
            <td><?= $result_vote_option_count['vo_id'] ?></td>
            <td><?= $result_vote_option_count['vo_name'] ?></td>
            <td><?= $result_fetch_count['COUNT(vs_id)'] ?></td>
          </tr>
          <?php  } ?>
        </table>

      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>