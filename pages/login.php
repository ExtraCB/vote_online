<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-4"></div>
      <div class="col-4">

        <?php include('./components/error.php') ?>
        <div class="card">

          <div class="card-title">
            <h3 class="m-2">Login</h3>
          </div>
          <div class="card-body">
            <form action="./../services/login.php" method="post">
              <label for="" class="form-label">Username</label>
              <input type="text" name="username" class="form-control mb-2" id="" required>

              <label for="" class="form-label">Password</label>
              <input type="text" name="password" class="form-control mb-2" id="" required>

              <div class="row row-cols-2 p-3">
                <input type="submit" value="Login" name="login_submit" class="btn btn-outline-primary">

                <a href="./../pages/register.php">ต้องการสมัครสมาชิก</a>
              </div>


            </form>
          </div>
        </div>

      </div>
      <div class="col-4"></div>
    </div>
  </div>
</body>

</html>