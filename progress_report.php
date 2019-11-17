<?php
session_start();
$_SESSION["add"] = 1;
$_SESSION["edit"] = 0;
$_SESSION["editHome"] = 0;
$_SESSION["editActivities"] = 0;
$_SESSION["editAchievements"] = 0;
$_SESSION["editCalender"] = 0;
$_SESSION["editStaff"] = 0;
$_SESSION["editSubjects"] = 0;

if (!isset($_COOKIE["school_email"])) {
  header('Location:login.php');
}

?>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Forge</title>

  <!-- CSS -->
  <link href="materialize/materials_icons/css/material-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="materialize/css/materialize.min.css">
  <link rel="stylesheet" href="css/styles.css">

  <!-- browser icons -->
  <link rel="icon" type="image/gif" href="img/icon-72x72.png">
  <link rel="shortcut icon" href="img/logo.jpg">

  <meta name="theme-color" content="#4db6ac">

  <!--Import jQuery before materialize.js-->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="materialize/js/materialize.min.js"></script>

</head>


<body class="grey lighten-4">

  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper blue darken-2">
        <a href="progress_report.php" class="brand-logo">
          <div class="col s3" style='margin-top:10px;padding-left:5px;'>
            <img src="img/logo.jpg" width='50px' height='50px' alt="Logo" class="circle responsive-img">
            <span style='position:relative;top:-12px;'>Forge</span>
          </div>
        </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">

          <li><a href="sites/tempSite/index.php?preview" target="_blank">Preview</a></li>
          <li><a href="db/deploy.php" target="_blank">Deploy</a></li>
          <li><a href="db/log_out.php">Log Out</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav mobile-demo" id="mobile-demo">
    <li><a href="sites/tempSite/index.php?preview" target="_blank">Preview</a></li>
    <li><a href="db/deploy.php" target="_blank">Deploy</a></li>
    <li><a href="db/log_out.php">Log Out</a></li>
  </ul>

  <br>
  <br>

  <div class="container">
    <ul class="collection with-header">
      <li class="collection-header blue-grey lighten-1">
        <h4 class="white-text">Pages Created <span class="right">Edit</span></h4>
      </li>

      <?php
      include 'db/connect.php';

      $sql = "SELECT * FROM created_pages where user_id=" . $_COOKIE["user_id"];
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<li class="collection-item blue-grey lighten-4">
            <div>' . $row["page_name"] . '<a href="db/edit_page.php?' . $row["page_name"] . '" class="create_icon secondary-content tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit ' . $row["page_name"] . ' Page"><i class="material-icons">create</i></a></div>
          </li>';
        }
      } else {
        echo "No pages created yet...";
      }

      ?>

    </ul>

    <br>

    <ul class="collection with-header">
      <li class="collection-header blue-grey lighten-1">
        <h4 class="white-text">Create New Pages</h4>
      </li>



      <?php

      $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = " . $_COOKIE["user_id"] . " and page_name like 'Home' ");
      if (mysqli_num_rows($data) == 1) {
        mysqli_query($conn, "DELETE FROM untouched_pages where user_id=" . $_COOKIE["user_id"] . " and page_name like 'Home'");
      }

      $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = " . $_COOKIE["user_id"] . " and page_name like 'Achievements' ");
      if (mysqli_num_rows($data) == 1) {
        mysqli_query($conn, "DELETE FROM untouched_pages where user_id=" . $_COOKIE["user_id"] . " and page_name like 'Achievements'");
      }

      $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = " . $_COOKIE["user_id"] . " and page_name like 'Activities' ");
      if (mysqli_num_rows($data) == 1) {
        mysqli_query($conn, "DELETE FROM untouched_pages where user_id=" . $_COOKIE["user_id"] . " and page_name like 'Activities'");
      }

      $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = " . $_COOKIE["user_id"] . " and page_name like 'Calender' ");
      if (mysqli_num_rows($data) == 1) {
        mysqli_query($conn, "DELETE FROM untouched_pages where user_id=" . $_COOKIE["user_id"] . " and page_name like 'Calender'");
      }

      $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = " . $_COOKIE["user_id"] . " and page_name like 'Staff' ");
      if (mysqli_num_rows($data) == 1) {
        mysqli_query($conn, "DELETE FROM untouched_pages where user_id=" . $_COOKIE["user_id"] . " and page_name like 'Staff'");
      }

      $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = " . $_COOKIE["user_id"] . " and page_name like 'Subjects' ");
      if (mysqli_num_rows($data) == 1) {
        mysqli_query($conn, "DELETE FROM untouched_pages where user_id=" . $_COOKIE["user_id"] . " and page_name like 'Subjects'");
      }


      $sql = "SELECT * FROM untouched_pages where user_id=" . $_COOKIE["user_id"];
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

          echo '<li class="collection-item blue-grey blue-grey lighten-4">
            <div>' . $row["page_name"] . '<a href="' . $row["page_name"] . '.php" class="create_icon secondary-content tooltipped" data-position="bottom" data-delay="50" data-tooltip="Create ' . $row["page_name"] . ' Page"><i class="material-icons">create</i></a></div>
          </li>';
        }
      } else {
        echo "<p style='font-size:1.3em; padding-left:3%'>Congratulations! Your website is ready... <a href='db/deploy.php' target='_blank'>Deploy</a></p>";
      }

      ?>

    </ul>
  </div>

  <script src="js/ui.js"></script>

</body>

</html>