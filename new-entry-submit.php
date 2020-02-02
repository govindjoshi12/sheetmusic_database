<?php
    session_start();

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "sheetmusic_database";

    $conn = new mysqli($server, $user, $pass, $db);

    if($conn->connect_error)
    {
      die("Connection Failed: " . $conn->connect_error);
    }

    $title = $_POST['title'];
    $composer = $_POST['composer'];
    $arranger = isset($_POST["arranger"]) ? $_POST["arranger"] : "NO_ARRANGER";
    $type = $_POST["type"];
    $genre = $_POST["genre"];
    $grade = $_POST["grade_level"];
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : "NO_COMMENT";
    $uil_pml_number = isset($_POST["uil_pml_number"]) ? $_POST["uil_pml_number"] : "NON_UIL";
    $nmr = isset($_POST["nmr"]) ? "NO_MEMORY_REQUIRED" : "MEMORY_REQUIRED";
    $wiki_link = isset($_POST["wiki_link"]) ? $_POST["wiki_link"] : "NO_WIKI_LINK";
    $imslp_link = isset($_POST["imslp_link"]) ? $_POST["imslp_link"] : "NO_IMSLP_LINK";
    $youtube_link = isset($_POST["youtube_link"]) ? $_POST["youtube_link"] : "NO_YOUTUBE_LINK";

    $sql = $conn->prepare("SELECT title FROM sheetmusic WHERE title = ? AND composer = ?");
    $sql->bind_param("ss", $title, $composer);
    $sql->execute();
    $sql->bind_result($checkExists);
    $sql->fetch();

    $sql->close();

    if($checkExists === $title)
    {
      header("Location: /new-entry.php?exists=true");
      die();
    }

    $keys = array_keys($_POST);

    $instrument = $_POST["instrument"];
    $quantity = $_POST["quantity"];
    $note = $_POST["note"];
    $instrumentation_string = "";

    $sql_select = $conn->prepare("SELECT instrument, instrumentation_id FROM instrumentation WHERE instrument = ? AND quantity = ? AND note = ?");
    $sql_insert = $conn->prepare("INSERT INTO instrumentation (instrument, quantity, note) VALUES (?, ?, ?)");
    $length = count($instrument);

    for($i = 1; $i < $length; $i++)
    {
      $sql_select->bind_param("sss", $instrument[$i], $quantity[$i], $note[$i]);
      $sql_select->execute();
      $sql_select->bind_result($checkExists, $instrumentation_id);
      $sql_select->fetch();

      if($checkExists === $instrument[$i])
      {
        $instrumentation_string .= $instrumentation_id." ";
      }
      else
      {
        $sql_insert->bind_param("sss", $instrument[$i], $quantity[$i], $note[$i]);
        $sql_insert->execute();

        $instrumentation_id = mysqli_insert_id($conn);

        $instrumentation_string .= "".$instrumentation_id." ";
      }
    }
    $sql_select->close();

    $sql = $conn->prepare("INSERT INTO sheetmusic
      (title, composer, arranger, genre, grade, comment,uil_pml_number, nmr,
      wiki_link, imslp_link, youtube_link, instrumentation, user_id)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $sql_select = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
    $sql_select->bind_param("s", $_SESSION["username"]);
    $sql_select->execute();
    $sql_select->bind_result($user_id);
    $sql_select->fetch();
    $sql_select->close();

    $sql->bind_param("ssssssssssssi", $title, $composer, $arranger, $genre, $grade,
                      $comment, $uil_pml_number, $nmr, $wiki_link, $imslp_link,
                      $youtube_link, $instrumentation_string, $user_id);
    $sql->execute();

    header("Location: ./landing.php?submitted=true&title={$title}&composer={$composer}");
    die();
?>
