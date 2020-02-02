<?php
    $rrdb_privacy_code = "boachampions2019";

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
    $privacy = $_POST["privacy_protection"];

    $sql = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $sql->bind_param("s", $userID);
    $sql->execute();
    $sql->bind_result($checkExists);
    $sql->fetch();
    $sql->close();

    if($checkExists === $userID)
    {
      header("Location: ./registration.php?username_exists=true");
      die();
    }

    if($privacy != $rrdb_privacy_code)
    {
      header("Location: ./registration.php?privacy_failed=true");
      die();
    }

    $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $sql->bind_param("ss", $userID, $password);
    $sql->execute();

    header("Location: ./login.php");
    die();
?>
