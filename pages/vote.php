<?php
require_once('./../services/functions/securecheck.php');
include('./../services/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vote</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php') ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <?php include('./../pages/components/error.php') ?>
        <h3>Vote </h3>
        <form action="./../services/vote.php" method="post" enctype="multipart/form-data">
          <label for="" class="form-label">หัวข้อ Vote</label>
          <input type="text" name="vm_name" class="form-control mb-3" id="">
          <label for="" class="form-label">เนื้อหา Vote</label>
          <textarea type="text" name="vm_content" class="form-control mb-3" id=""></textarea>
          <label for="" class="form-label">รูปสำหรับเนื้อหา Vote</label>
          <input type="file" name="file" class="form-control mb-3" id="">
          <input type="submit" value="Add Vote" name="vm_addvote" class="btn btn-outline-success">
        </form>
      </div>
      <div class="col-2"></div>
    </div>
    <hr>
    <div class="row">
      <div class="col-2"></div>
      <?php require_once('./../services/functions/vote_manager.php'); ?>
      <div class="col-8">
        <h3>Vote Manager</h3>
        <?php
        while ($vote = mysqli_fetch_assoc($query_vote)) { ?>
          <div class="card mb-2">
            <div class="card-header"> <?= $vote['vm_name'] ?></div>
            <div class="card-body">
              <p class="card-text"><?= $vote['vm_content'] ?></p>
            </div>
            <div class="card-footer">
              <?php if ($vote['vm_status'] != 0) { ?>
                <a href="./editvote.php?voteid=<?= $vote['vm_id'] ?>" class="btn btn-outline-warning">Edit</a>
                <a href="" class="btn btn-outline-danger">Delete</a>
                <a href="./../services/vote.php?voteid=<?= $vote['vm_id'] ?>&voteclose=1" class="btn btn-outline-secondary">Close Vote</a>
              <?php } else {  ?>
                <button class="btn btn-outline-secondary" disabled="disabled">ปิด vote แล้ว</button>
              <?php } ?>
            </div>
          </div>
        <?php   } ?>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>