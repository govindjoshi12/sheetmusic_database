<?php
  session_start();

  if(isset($_SESSION["logged_in"]))
  {
    if($_SESSION["logged_in"] === "true")
    {
      header("Location: ./landing.php?username={$_SESSION['username']}");
      die();
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/registration.css">
  <script src="./js/registration.js"></script>
</head>
<body>
  <div class="container-fluid h-100">
    <div class="row justify-content-center header">
        <h1>Dragon Band Music Database</h1>
    </div>
    <div class="row form">
      <form class="col" method="post" action="./registration-submit.php">
        <!-- TODO Tooltip/Registration Info -->
        <p>Create an account</p>
        <div class="form-group">
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username..."><br>
          <input type="text" class="form-control" name="privacy_protection" placeholder="Enter RRDB Private Code..."><br>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password..."><br>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="passConfirm" placeholder="Confirm Password...">
            <div class="input-group-append" id="confirm">
              <button type="button" class="btn btn-primary" onclick="confirmData()">Confirm</button>
            </div>
            <div class="input-group-append" id="submit">
              <button type="submit" class="btn btn-primary">Submit</Confirm>
            </div>
          </div>
        </div>
      </form>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Registration</h5>
            <p class="card-text">Registration requires the "RRDB Private Code" which can be
            requested from one of the band directors. It is simply a privacy measure to prevent
            Non-RRDB members from accessing private files.</p>
          </div>
        </div>
      </div>
    </div>
    <?php
      if(isset($_GET["username_exists"]))
      {
        echo "<strong class='username_exists'>Error: That username is taken...</strong>";
      }
      if(isset($_GET["privacy_failed"]))
      {
        echo "<strong class='username_exists'>Error: Incorrect Privacy Code entered...</strong>";
      }
    ?>
    <div class="row justify-content-center">
      <div class="pre-footer">
        <p>Return to <a href="./login.php">Login</a></p>
      </div>
    </div>
    <footer class="navbar fixed-bottom justify-content-center header">
        <h6>"Once a Dragon, Always a Dragon"</h6>
    </footer>
  </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
