<?php
include '../../db/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Forge</title>

  <!-- CSS -->
  <link href="../../materialize/materials_icons/css/material-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../materialize/css/materialize.min.css">
  <link rel="stylesheet" href="../../css/styles.css">

  <!-- browser icons -->
  <?php
  $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<link rel="shortcut icon" href="../../' . $row["logo"] . '">';
    }
  }
  ?>

  <meta name="theme-color" content="#4db6ac">

  <!--Import jQuery before materialize.js-->
  <script src="../../js/jquery-3.4.1.min.js"></script>
  <script src="../../materialize/js/materialize.min.js"></script>





</head>

<body>
  <nav class="pink accent-4" role="navigation">
    <div class="nav-wrapper container">
    <a href="index.php" class="brand-logo">
        <div class="col s3" style='margin-top:10px;padding-left:5px;'>
          <?php
          $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<img src='../../" . $row["logo"] . "' width='60px' height='60px' alt='Logo' class='circle responsive-img'>";
              echo "<span style='position:relative;top:-12px;margin-left:2px;'>".$row["school_name"]."</span>";
            }
          }
          ?>
        </div>
      </a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php"><i class="material-icons">home</i></a></li>
        <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Menu<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>

      <ul id='dropdown1' class='dropdown-content'>
        <li class="active"><a href="achievements.php">Achievements</a></li>
        <li><a href="activities.php">Activities</a></li>
        <li><a href="calender.php">Calender</a></li>
        <li><a href="staff.php">Staff</a></li>
        <li><a href="subjects.php">Subjects</a></li>
      </ul>


      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center orange-text">Achievements</h1>
      <div class="row center">
        <h5 class="header col s12 light">We take great pride in our continued pursuit for excellence</h5>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">

        <div class="carousel">

        <?php
          $sql = "SELECT * FROM achievements where user_id=" . $_COOKIE["user_id"];
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<a class="carousel-item" href="#one!"><img style="height:200px;margin-top:-100px;" src="../../' . $row["achievement_image"] . '"><h5 class="pink-text">'.$row["achievement_name"].'</h5><p>'.$row["achievement_description"].'</p></a>';
            }
          }
          ?>
        </div>




      </div>

    </div>
    <br><br>
  </div>

  <footer class="page-footer pink accent-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <?php
          $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<h5 class="white-text">' . $row["school_name"] . '</h5>';
            }
          }
          ?>
          <?php
          $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<p class="grey-text text-lighten-4">' . $row["about_us"] . '</p>';
            }
          }
          ?>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Visit Our Pages</h5>
          <ul>
            <li class="footer_link"><a class="grey-text text-lighten-3" href="achievements.php"><i class="tiny material-icons">card_giftcard</i> Achievements</a></li>
            <li><a class="grey-text text-lighten-3" href="activities.php"><i class="tiny material-icons">notifications_active</i> Activities</a></li>
            <li><a class="grey-text text-lighten-3" href="calender.php"><i class="tiny material-icons">event</i> Calender</a></li>
            <li><a class="grey-text text-lighten-3" href="staff.php"><i class="tiny material-icons">people</i> Staff</a></li>
            <li><a class="grey-text text-lighten-3" href="subjects.php"><i class="tiny material-icons">library_books</i> Subjects</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2019 Copyright - Forge
        <a class="grey-text text-lighten-4 right" href="#!">T & Cs</a>
      </div>
    </div>
  </footer>


  <script src="../../materialize/js/init_temp_site.js"></script>
  <script src="../../js/ui.js"></script>
</body>

</html>