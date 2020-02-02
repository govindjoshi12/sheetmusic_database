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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/base.css">

  <style>
    table {
    width: 100%;
    }

    tr, td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
  </style>

  <body>
    <div class="container-fluid h-100">
      <div class="row justify-content-center header">
          <h1>Dragon Band Music Database</h1>
      </div>
      <?php
        date_default_timezone_set("UTC");

        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "sheetmusic_database";

        $conn = new mysqli($server, $user, $pass, $db);

        if($conn->connect_error)
        {
          die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT sheetmusic_id, title, composer, genre, user_id, timestamp FROM sheetmusic";

        $result = $conn->query($sql);

        echo "<table>";
        echo "<tr><th>Author</th><th>Title</th><th>Composer</th><th>Genre</th><th>Timestamp</th></tr>";
        while($row = $result->fetch_assoc())
        {
          $sheetmusic_id = $row["sheetmusic_id"];
          $title = $row["title"];
          $composer = $row["composer"];
          $genre = $row["genre"];
          $timestamp = strtotime($row["timestamp"]);
          $user_id = $row["user_id"];

          $timestamp = date('l jS, F Y, h:i:s A', $timestamp);

          $sql = $conn->prepare("SELECT username FROM users WHERE user_id = ?");
          $sql->bind_param("s", $user_id);
          $sql->execute();
          $sql->bind_result($username);
          $sql->fetch();
          $sql->close();

          echo "<tr>";
          echo "<td><a href='./user.php?user_id={$user_id}'>{$username}</a></td>
                <td><a href='./music.php?sheetmusic_id={$sheetmusic_id}'>".$title."</a></td>
                <td>".$composer."</td><td>".$genre."</td>
                <td>".$timestamp."</td>";
          echo "<tr>";
        }
        echo "</table>";
      ?>
    </div>
    <footer class="row fixed-bottom footer">
      <div class="col-12">
        <p>Welcome, <?php echo $_SESSION["username"]; ?>!&nbsp;<a href="./landing.php">Home</a></p>
        <navbar class="navbar justify-content-center header"><h6>"Once a Dragon, Always a Dragon"</h6></navbar>
      </div>
    </footer>
  </body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>


