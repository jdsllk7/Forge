<?php
include '../../db/connect.php';
if (!isset($_COOKIE["school_email"])) {
  header('Location:../../login.php');
}
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
              echo "<span style='position:relative;top:-12px;margin-left:2px;'>" . $row["school_name"] . "</span>";
            }
          }
          ?>
        </div>
      </a>
      <ul class="right hide-on-med-and-down">
        <!-- <li> <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a></li> -->
        <li><a href="#modal1" class="modal-trigger"><i class="material-icons">mail</i></a></li>
        <li class="active"><a href="index.php"><i class="material-icons">home</i></a></li>
        <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Menu<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>

      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="achievements.php">Achievements</a></li>
        <li><a href="activities.php">Activities</a></li>
        <li><a href="calender.php">Calender</a></li>
        <li><a href="staff.php">Staff</a></li>
        <li><a href="subjects.php">Subjects</a></li>
      </ul>


      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>





  <!-- MAIL MODAL -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h5>Email Us</h5><br />
      <form autocomplete="on" id="login-form" method="post" action="../../db/email.php">
        <div class="input-field">
          <input autocomplete="on" type="text" id="name" name="name" required />
          <label for="name">Full Name</label>
        </div>
        <div class="input-field">
          <input autocomplete="on" type="text" id="sub" name="sub" required />
          <label for="sub">Subject</label>
        </div>
        <div class="input-field">
          <input autocomplete="on" type="email" id="login-email" name="email" required />
          <label for="login-email">Your Email address</label>
        </div>
        <div class="input-field">
          <textarea id="textarea1" name="body" class="materialize-textarea" maxlength="200" data-length="200"></textarea>
          <label for="textarea1" class="">Message Body</label>
        </div>
        <button class="btn green darken-3 z-depth-0" type="submit">Send</button>
      </form>
    </div>
  </div>






  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br><br>
        <?php
        $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<h1 class="header center white-text parallax_text">' . $row["school_name"] . '</h1>';
          }
        }
        ?>
        <div class="row center">
          <?php
          $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<h5 class="header col s12 light white-text parallax_text">' . $row["motto"] . '</h5>';
            }
          }
          ?>

        </div>
        <br>

      </div>
    </div>

    <?php
    $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="parallax"><img src="../../' . $row["school_image"] . '" alt="background img 1"></div>';
      }
    }
    ?>


  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">



        <div class="col s12 m4 l6">
          <div class="icon-block">
            <h2 class="center pink-text accent-4"><i class="large
                  material-icons">group</i></h2>
            <h5 class="center">About Us</h5>

            <?php
            $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="light align_center">' . $row["about_us"] . '</p>';
              }
            }
            ?>


          </div>
        </div>

        <div class="col s12 m4 l6">
          <div class="icon-block">
            <h2 class="center pink-text accent-4"><i class="large
                  material-icons">phone</i></h2>
            <h5 class="center">Contact Details</h5>

            <?php
            $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="light align_center">Reach us on: ' . $row["contact"] . '</p>';
                echo '<p class="light align_center">Email us on: ' . $row["school_email"] . '</p>';
              }
            }
            ?>

          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <?php
          $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<h5 class="header parallax_text col s12 light white-text">' . $row["motto"] . '</h5>';
            }
          }
          ?>
        </div>
      </div>
    </div>

    <?php
    $sql = "SELECT * FROM users where user_id=" . $_COOKIE["user_id"];
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="parallax"><img src="../../' . $row["school_image"] . '" alt="background img 1"></div>';
      }
    }
    ?>

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