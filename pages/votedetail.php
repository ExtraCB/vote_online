<?php
require_once('./../services/functions/securecheck.php');
include('./../services/connect.php');
require_once("./../services/functions/vote_single.php");
require_once("./../services/functions/securecheckvote.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vote details</title>
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

        <h3>Vote Header</h3>

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
        <h3>Vote List</h3>



        <form action="./../services/vote.php" method="post">
          <?php
          require_once('./../services/functions/vote_option.php');
          while ($result_vote_option_fetch = mysqli_fetch_assoc($result_vote_option)) { ?>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="vs_select"
              value="<?= $result_vote_option_fetch['vo_id'] ?>">
            <label for="" class="form-check-label"><?= $result_vote_option_fetch['vo_name'] ?></label>
          </div>
          <?php  } ?>
          <input type="hidden" name="vote_id" value="<?= $vote['vm_id'] ?>">
          <?php

          ?>
          <?php if (mysqli_num_rows($result_check_vs_select) == 0) { ?>
          <input type="submit" name="submit_vs_select" value="ยืนยัน Vote" class="btn btn-outline-warning">
          <?php } else {  ?>
          <input type="submit" name="submit_vs_select" value="คุณได้ทำการ Vote ไปแล้ว" class="btn btn-outline-secondary"
            disabled>
          <?php  } ?>
        </form>


      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>