<?php
  session_start();

  //Template to keep previous user logged in
  if(isset($_SESSION["logged_in"]))
  {
    if($_SESSION["logged_in"] === "true")
    {
      header("Location: ./landing.php?username={$_SESSION['username']}");
      die();
    }
  }
?>

<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center header">
        <h1>Dragon Band Music Database</h1>
    </div>
    <div class="row form">
      <form class="col-" method="post" action="./login-submit.php">
        <div class="form-group">
          <label>Welcome!</label>
          <input type="text" class="form-control" name="username" placeholder="Enter Username..."><br>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Enter Password...">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          <strong><?php
            if(isset($_GET["login_failed"]))
              echo "Wrong Password!";
          ?>
          </strong>
        </div>
      </form>
    </div>
    <div class="row justify-content-center">
      <div class="pre-footer">
        <p>Don't have an account? <a href="./registration.php">Sign up!</a></p>
      </div>
    </div>
  </div>
  <footer class="navbar fixed-bottom justify-content-center header">
      <h6>"Once a Dragon, Always a Dragon"</h6>
  </footer>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
