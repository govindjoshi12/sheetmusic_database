<?php
    date_default_timezone_set("UTC");
    $sheetmusic_id = $_GET["sheetmusic_id"];

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "sheetmusic_database";

    $conn = new mysqli($server, $user, $pass, $db);

    if($conn->connect_error)
    {
      die("Connection Failed: " . $conn->connect_error);
    }

    $sql = "SELECT sheetmusic_id, title, composer, genre, timestamp FROM sheetmusic WHERE sheetmusic_id = {$sheetmusic_id}";

    $result = $conn->query($sql);

    echo "<table>";
    echo "<tr><th>Title</th><th>Composer</th><th>Genre</th><th>Timestamp</th></tr>";
    while($row = $result->fetch_assoc())
    {
      $sheetmusic_id = $row["sheetmusic_id"];
      $title = $row["title"];
      $composer = $row["composer"];
      $genre = $row["genre"];
      $timestamp = strtotime($row["timestamp"]);

      $timestamp = date('l jS, F Y, h:i:s A', $timestamp);

      echo "<tr>";
      echo "<td>".$title."</td><td>".$composer."</td><td>".$genre."</td><td>".$timestamp."</td>";
      echo "<tr>";
    }
    echo "</table>";

    echo "<a href='./landing.php'>Home</a>";
?>

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
