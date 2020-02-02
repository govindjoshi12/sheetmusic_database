<?php
  session_start();

  if(isset($_SESSION["logged_in"]))
  {
    if($_SESSION["logged_in"] === "false")
    {
      header("Location: ./login.php");
      die();
    }
  }
  else
  {
    header("Location: ./login.php");
    die();
  }
?>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script>
    //Creates a popup after submitting an entry to confirm that the submission was received

    //Extracts $_GET elements from the URL 
  function $_GET() {
      var vars = {};
      var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
          vars[key] = value;
      });
      return vars;
  }

  window.onload = function(){
    if($_GET()["submitted"] === "true")
    {
      var str = $_GET()["title"] + " by " + $_GET()["composer"] + " was successfully entered into our database!";
      str = str.replace(/%20/g, " ");
      window.alert(str);
    }
  }
  </script>
  <style>
    html, body
    {
      height: 100%;
    }

    strong
    {
        color: maroon;
    }

    .header
    {
        color: lightgray;
        background-color: maroon;
    }

    .btn
    {
        background-color: maroon;
    }

    .btn-primary
    {
      background-color: maroon;
    }

    .footer
    {
      background-color: lightgray;
      text-align: center;
      margin-top: 10px;
    }

    .footer p
    {
      margin: 0;
    }

    .index-ui
    {
      font-size: 3vw;
    }

    .index-ui i, .index-ui button
    {
      color: maroon;
    }
  </style>
</head>
<body>
  <div class="container-fluid h-100">
    <div class="row justify-content-center header">
        <h1>Dragon Band Music Database</h1>
    </div>
    <div class="row h-100 index-ui">
      <button class="col-3 mx-auto" onclick="location.href='./user.php?user_id=<?php echo $_SESSION['user_id']; ?>'">
        <i class="fas fa-user"></i><br>
        Profile
      </button>
      <button class="col-3 mx-auto" onclick="location.href='./browse.php'">
        <i class="fas fa-book-reader"></i><br>
        Browse
      </button>
      <button class="col-3 mx-auto">
        <i class="fas fa-search"></i><br>
        Search
      </button>
      <button class="col-3 mx-auto" onclick="location.href='./new-entry.php'">
        <i class="fas fa-plus"></i><br>
        New Entry
      </button>
    </div>
    <footer class="row fixed-bottom footer">
      <div class="col-12">
        <p>Welcome, <?php echo $_SESSION["username"]; ?>!&nbsp;<a href="./logout.php">Logout</a></p>
        <navbar class="navbar justify-content-center header"><h6>"Once a Dragon, Always a Dragon"</h6></navbar>
      </div>
    </footer>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
