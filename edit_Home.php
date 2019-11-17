<?php

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
  <!-- <link rel="manifest" href="manifest_me.json"> -->

  <!-- browser icons -->
  <link rel="icon" type="image/gif" href="img/icon-72x72.png">
  <link rel="shortcut icon" href="img/logo.jpg">

  <meta name="theme-color" content="#4db6ac">

  <!--Import jQuery before materialize.js-->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="materialize/js/materialize.min.js"></script>

</head>

<?php 
  include 'db/validate_signup.php'; 
  // include 'db/edit_home_db.php';
?>



<body class="grey lighten-4">

  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper blue darken-2">
        <a href="index.php" class="brand-logo">
          <div class="col s3" style='margin-top:10px;padding-left:5px;'>
            <img src="img/logo.jpg" width='50px' height='50px' alt="Logo" class="circle responsive-img">
            <span style='position:relative;top:-12px;'>Forge</span>
          </div>
        </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="progress_report.php">View Progress</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav mobile-demo" id="mobile-demo">
    <li><a href="progress_report.php">View Progress</a></li>
  </ul>


  <form class="row container" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on">

    <br>

    <ul class="collection with-header">
      <li class="collection-header grey lighten-4">
        <h4 class="blue-text darken-2">Edit Home Page</h4>
      </li>

      <li class="collection-item grey lighten-4">

        <div class="input-field col s10 m8 l6 offset-s1 offset-m2 offset-l3">
          <input id="for" type="text" class="validate" maxlength="20" value="<?php echo $sch_name; ?>" name="sch_name" autofocus required>
          <label for="for">Official School Name</label>
        </div>

        <div class="input-field col s10 m8 l6 offset-s1 offset-m2 offset-l3">
          <input id="for3" type="email" class="validate" maxlength="20" value="<?php echo $email; ?>" name="email" required>
          <label for="for3">Email Address</label>
        </div>

        <div class="input-field col s10 m8 l6 offset-s1 offset-m2 offset-l3">
          <input id="for4" type="number" class="validate" min="1" max="9999999999" value="<?php echo $phone_number; ?>" name="phone_number" required>
          <label for="for4">Contact Number</label>
        </div>

        <div class="input-field col s10 m8 l6 offset-s1 offset-m2 offset-l3">
          <input id="for13" type="text" maxlength="50" class="validate" value="<?php echo $motto; ?>" name="motto" required>
          <label for="for13">School Motto</label>
        </div>

        <div class="input-field col s10 m8 l6 offset-s1 offset-m2 offset-l3">
          <textarea id="icon_prefix2" name='about_us' maxlength="200" class="materialize-textarea"><?php echo $about_us; ?></textarea>
          <label for="icon_prefix2">About Us</label>
        </div>

        <div class="file-field input-field col s10 m8 l3 offset-s1 offset-m2 offset-l3 tooltipped" data-position="bottom" data-delay="50" data-tooltip="School Logo">
          <div class="btn">
            <span class='white-text'>Logo</span>
            <input type="file" name="logo" id="logo">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="School Logo">
          </div>
        </div>

        <div class="file-field input-field col s10 m8 l3 offset-s1 offset-m2 offset-l0 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Website Background Image">
          <div class="btn">
            <span class='white-text'>Image</span>
            <input type="file" name="school_image" id="school_image">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="School Background Image">
          </div>
        </div>

        <!-- <div class="input-field col s10 m8 l6 offset-s1 offset-m2 offset-l3 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter At least 4 characters">
          <input id="for8" type="password" maxlength="20" class="validate" value="<?php echo $password; ?>" name="password" required>
          <label for="for8">Account Password</label>
        </div> -->

        <br>
        <br>
        <br>


        <div class="input-field col s6 offset-s3 center">
          <button name="signup" value='signup' class="waves-effect btn-large orange darken-4 waves-light" type="submit">Done
            <i class="material-icons right">send</i>
          </button>
        </div>

      </li>
    </ul>

  </form>


  <script src="js/ui.js"></script>

</body>

</html>