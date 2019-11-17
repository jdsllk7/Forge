<?php

if (isset($_COOKIE["school_email"])) {
  header('Location:progress_report.php?already_In');
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


<?php include 'db/validate_login.php'; ?>

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
          <li><a href="index.php"><i class="material-icons">home</i></a></li>
          <li class="active"><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign up</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav mobile-demo" id="mobile-demo">
    <li><a href="index.php"><i class="material-icons">home</i></a></li>
    <li class="active"><a href="login.php">Login</a></li>
    <li><a href="signup.php">Sign up</a></li>
  </ul>



  <form class="row container" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on">

    <br>

    <ul class="collection with-header">
      <li class="collection-header grey lighten-4">
        <h4 class="blue-text darken-2">Login</h4>
      </li>

      <li class="collection-item grey lighten-4">

        <div class="input-field col s10 m8 l6 offset-s1 offset-m2 offset-l3">
          <input id="for3" type="email" class="validate" value="<?php echo $email; ?>" name="email" autofocus required>
          <label for="for3">Email</label>
        </div>

        <div class="input-field col s10 m8 l6 offset-s1 offset-m2 offset-l3">
          <input id="for8" type="password" class="validate" value="<?php echo $password; ?>" name="password" required>
          <label for="for8">Password</label>
        </div>



        <div class="input-field col s6 offset-s3 center">
          <button name="login" value='login' class="waves-effect btn-large orange darken-4 waves-light" type="submit">Login
            <i class="material-icons right">send</i>
          </button>
        </div>

        <div class="input-field col s6 offset-s3 center">
          <br>
          <a class='table_links' href='signup.php'>Sign up to create account</a>
        </div>


      </li>
    </ul>

  </form>


  <script src="js/ui.js"></script>

</body>

</html>