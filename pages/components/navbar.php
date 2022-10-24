<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a href="./homepage.php" class="navbar-brand">Home</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item"><a href="./vote.php" class="nav-link">Add Vote</a></li>
      </ul>


    </div>
    <div class="d-flex">
      <h5 class="m-2">User : <?= $_SESSION['username'] ?></h5>
      <a href="./../services/logout.php" class="btn btn-outline-danger">Logout</a>
    </div>
  </div>

</nav>