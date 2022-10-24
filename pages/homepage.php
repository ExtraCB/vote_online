<?php
include('./../services/connect.php');
require_once('./../services/functions/securecheck.php');
require_once('./../services/functions/vote_manager.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php') ?>
  <div class="container">
    <div class="row mt-2">
      <div class="col-2"></div>
      <div class="col-8">

        <h3>Vote List</h3>
        <?php while ($vote = mysqli_fetch_assoc($query_vote)) { ?>
          <div class="card mb-2">
            <div class="card-header"> <?= $vote['vm_name'] ?></div>
            <div class="card-body">
              <p class="card-text"><?= $vote['vm_content'] ?></p>
            </div>
            <div class="card-footer">
              <?php if ($vote['vm_status'] != 0) { ?>
                <a href="./votedetail.php?voteid=<?= $vote['vm_id'] ?>"><button class="btn btn-outline-primary">ดูรายละเอียด</button></a>
              <?php } else {  ?>
                <button class="btn btn-outline-secondary" disabled="disabled">ปิด vote แล้ว</button>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>