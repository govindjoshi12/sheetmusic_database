<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "sheetmusic_database";

    $conn = new mysqli($server, $user, $pass, $db);

    if($conn->connect_error)
    {
      die("Connection Failed: " . $conn->connect_error);
    }

    $userID = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conn->prepare("SELECT username FROM users WHERE username = ? AND password = ?");
    $sql->bind_param("ss", $userID, $password);
    $sql->execute();
    $sql->bind_result($checkLogin);
    $sql->fetch();
    $sql->close();

    session_start();
    if($checkLogin === $userID)
    {
      $sql = "SELECT user_id FROM users WHERE username = '$userID'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $_SESSION["logged_in"] = "true";
      $_SESSION["username"] = $userID;
      $_SESSION["user_id"] = $row["user_id"];
      header("Location: ./landing.php?username={$userID}&user_id={$row["user_id"]}");
      die();
    }
    else {
      header("Location: ./login.php?login_failed=true");
      die();
    }
?>
