<?php

include 'connect.php';
include 'vars.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (
    isset($_POST["login"])
    && isset($_POST["email"])
    && isset($_POST["password"])
    && !empty($_POST["email"])
    && !empty($_POST["password"])

  ) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM users WHERE school_email='$email' AND password='$password'");

    if (mysqli_num_rows($data) == 1) {

      $user = mysqli_fetch_assoc($data);
      setcookie('user_id', $user['user_id'], time() + (86400 * 30), "/");
      setcookie('school_email', $user['school_email'], time() + (86400 * 30), "/");
      setcookie('motto', $user['motto'], time() + (86400 * 30), "/");
      setcookie('about_us', $user['about_us'], time() + (86400 * 30), "/");
      setcookie('school_name', $user['school_name'], time() + (86400 * 30), "/");
      setcookie('logo', $user['logo'], time() + (86400 * 30), "/");
      setcookie('school_image', $user['school_image'], time() + (86400 * 30), "/");
      setcookie('contact', $user['contact'], time() + (86400 * 30), "/");

      header('Location: progress_report.php?login_good');
    } else {
      echo'<script>';
				echo '$(document).ready(function () {
						var text = "<span><span class=\'red-text\'>STATUS:</span> Please Fill in Form Correctly!</span>";
						M.toast({ html: text });
					});';
			echo'</script>';
    }
  } else {
    echo'<script>';
				echo '$(document).ready(function () {
						var text = "<span><span class=\'red-text\'>STATUS:</span> Please Fill in Form Correctly!</span>";
						M.toast({ html: text });
					});';
			echo'</script>';
  }



  
}
