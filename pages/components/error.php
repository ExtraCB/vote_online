<?php
if (isset($_SESSION['error'])) { ?>
  <div class="alert alert-danger">
    <?= $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
  </div>
<?php } else if (isset($_SESSION['success'])) { ?>
  <div class="alert alert-success">
    <?= $_SESSION['success'];
    unset($_SESSION['success']);
    ?>
  </div>
<?php  } ?>