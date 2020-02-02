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

  $server = "localhost";
  $user = "root";
  $pass = "";
  $db = "sheetmusic_database";

  $conn = new mysqli($server, $user, $pass, $db);

  if($conn->connect_error)
  {
    die("Connection Failed: " . $conn->connect_error);
  }
?>
<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/new-entry.css">
  <script type="text/javascript" src="./js/new-entry.js"></script>
</head>
<body>
  <div class="container-fluid h-100 new-entry-form">
    <div class="row justify-content-center header">
        <h1>Dragon Band Music Database</h1>
    </div>
    <div class="row mt-4 mb-5 justify-content-center">
      <div class="jumbotron form col-9">
        <h2>New Entry&nbsp;<i class="fas fa-info-circle" onclick="showInfo()"></i></h2>
        <form method="post" action="new-entry-submit.php" id="new_entry">
          <input class="form-control" pattern="[a-zA-Z0-9., ]*" type="text" name="title" placeholder="Title" required><br>
          <input class="form-control" pattern="[a-zA-Z0-9., ]*" type="text" name="composer" placeholder="Composer" required><br>
          <div class="input-group mb-3">
          	<div class="input-group-prepend">
          		<div class="input-group-text">
          			<input type="checkbox" id="arranger-check" onclick="checkboxEnable(this.id)">
          		</div>
          	</div>
          	<input class="form-control" pattern="[a-zA-Z0-9., ]*" id="arranger" type="text" name="arranger" placeholder="Arranger" disabled><br>
          </div>
          <input class="form-control" type="text" pattern="[a-zA-Z0-9., ]*" name="publisher" placeholder="Publisher" required><br>
          <select class="form-control" id="type" onchange="if (this.selectedIndex) nmrDisplay();" name="type" form="new_entry" required>
            <option value="">-Ensemble Type-</option>
            <?php
              $sql = "SELECT ensemble_type FROM ensemble_types";

              $result = $conn->query($sql);

              while($row = $result->fetch_assoc())
              {
                $type = $row["ensemble_type"];
                echo "<option value='".$type."'>".$type."</option>";
              }
            ?>
          </select><br>
          <select class="form-control" name="grade_level" form="new_entry" required>
            <option value="">-Grade Level-</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select><br>
          <select class="form-control" name="genre" form="new_entry" required><strong>*</strong><br>
            <option value="">-Genre-</option>
            <?php
              $sql = "SELECT genre FROM genres";

              $result = $conn->query($sql);

              while($row = $result->fetch_assoc())
              {
                $genre = $row["genre"];
                echo "<option value='".$genre."'>".$genre."</option>";
              }
            ?>
          </select><br>
          <div class="form-row">
            <div class="col">
              <div class="input-group mb-3">
          		<div class="input-group-prepend">
          			<div class="input-group-text">UIL&nbsp;
          				<input type="checkbox" id="uil_pml_code-check" onclick="checkboxEnable(this.id)">
          			</div>
          		</div>
          	   <input class="form-control" pattern="\d{3}-\d{1}-\d{5}" id="uil_pml_code" type="text" name="uil_pml_code" placeholder="UIL PML Code" disabled><br>
          	   <div class="input-group-append" id="nmr">
          			<div class="input-group-text">NMR&nbsp;
          				<input type="checkbox" name="nmr">
          			</div>
          	   </div>
              </div>
            </div>
            <div class="col">
              <div class="input-group mb-3">
          		<div class="input-group-prepend">
          			<div class="input-group-text">
          				<input type="checkbox" id="wiki-check" onclick="checkboxEnable(this.id)">
          			</div>
          		</div>
          	  <input class="form-control" id="wiki" type="text" name="wiki_link" placeholder="Information Page Link" disabled><br>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <div class="input-group mb-3">
          		<div class="input-group-prepend">
          			<div class="input-group-text">
          				<input type="checkbox" id="imslp-check" onclick="checkboxEnable(this.id)">
          			</div>
          		</div>
          	  <input class="form-control" id="imslp" type="text" name="imslp_link" placeholder="IMSLP Page Link" disabled><br>
              </div>
            </div>
            <div class="col">
              <div class="input-group mb-3">
          		<div class="input-group-prepend">
          			<div class="input-group-text">
          				<input type="checkbox" id="youtube-check" onclick="checkboxEnable(this.id)">
          			</div>
          		</div>
          	  <input class="form-control" id="youtube" type="text" name="youtube_link" placeholder="Youtube Link" disabled><br>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <input type="checkbox" id="comment-check" onclick="checkboxEnable(this.id)">
              </div>
            </div>
            <input class="form-control" id="comment" type="text" name="comment" placeholder="Additional Comments" disabled><br>
          </div>
          <div class="form-group" id="instrumentation">
            <div id="base">
              <div class="form-row mb-3">
                <div class="col">
                  <select class="form-control instrument" name="instrument[]" form="new_entry" >
                    <option value="">-Instrument-</option>
                    <?php
                      $sql = "SELECT instrument FROM instruments";
                      $result = $conn->query($sql);
                      while($row = $result->fetch_assoc())
                      {
                        $instrument = $row["instrument"];
                        echo "<option value='".$instrument."'>".$instrument."</option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="col">
                  <input class="form-control quantity" type="number" min="1" oninput="validity.valid||(value='');" name="quantity[]" placeholder="Quantity">
                </div>
                <div class="col">
                  <div class="input-group note">
                    <select class="form-control" name="note[]" form="new_entry" >
                      <option value="">-Note-</option>
                      <option value="none">None</option>
                      <option value="solo">Solo</option>
                      <option value="optional">Optional</option>
                    </select><br>
                    <div class="input-group-append">
                      <button class="btn btn-primary" onclick="removeInstrument(this.classList)" type="button">X</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <select class="form-control" name="instrument[]" form="new_entry" required>
                  <option value="">-Instrument-</option>
                  <?php
                    $sql = "SELECT instrument FROM instruments";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                      $instrument = $row["instrument"];
                      echo "<option value='".$instrument."'>".$instrument."</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="col">
                <input class="form-control" type="number" min="1" oninput="validity.valid||(value='');" name="quantity[]" placeholder="Quantity" required>
              </div>
              <div class="col">
                <select class="form-control" name="note[]" form="new_entry" required>
                  <option value="">-Note-</option>
                  <option value="none">None</option>
                  <option value="solo">Solo</option>
                  <option value="accompaniment">Accompaniment</option>
                  <option value="optional">Optional</option>
                </select><br>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <button class="btn btn-primary" type="button" onclick="addInstrument()">Add More Instruments</button>
            <button class="btn btn-primary" id="submit" type="submit" onsubmit="checkFields()">Submit</button>
          </div>
        </form>
      </div>
    </div>
      <footer class="row fixed-bottom footer">
        <div class="col-12">
          <p>Return to <a href="./landing.php">Home</a></p>
          <navbar class="navbar justify-content-center header"><h6>"Once a Dragon, Always a Dragon"</h6></navbar>
        </div>
      </footer>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
