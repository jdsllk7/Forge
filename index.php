<html lang="en">
  <head>
    <?php 
    
      include 'db/connect.php';
      
      if(isset($_COOKIE["school_email"])){
        header('Location:progress_report.php?already_In');
      }
    
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Forge | Get Started</title>

    <!-- CSS -->
    <link href="materialize/materials_icons/css/material-icons.css"
      rel="stylesheet" />
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



  <body class="black body_content">

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
            <li class="active"><a href="index.php"><i class="material-icons">home</i></a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign up</a></li>
          </ul>
        </div>
      </nav>
    </div>

      <ul class="sidenav mobile-demo" id="mobile-demo">
        <li class="active"><a href="index.php"><i class="material-icons">home</i></a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Sign up</a></li>
      </ul>

      <div class="container white-text center">
        
        <!-- <br> -->
        <br>
        <div class="col s3">
          <img src="img/logo.jpg" alt="" class="circle responsive-img home_logo">
        </div>
        <h3>WELCOME TO FORGE</h3>
        <br>
        <hr style="width:60%;">
        <br>
        <h5>Your No.1 Website Developer</h5>
        <!-- <br> -->
        <br>
        <a href='signup.php' class="waves-effect btn-large orange darken-4 waves-light">Get Started</a>
        
      </div>


    

  </body>

  <script src="js/ui.js"></script>
</html>