<?php

include 'connect.php';
include 'vars.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (
    isset($_POST["sch_name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["motto"]) &&
    isset($_POST["about_us"]) && 
    isset($_POST["phone_number"]) &&
    isset($_POST["password"]) &&
    !empty($_POST["sch_name"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["motto"]) &&
    !empty($_POST["about_us"]) &&
    !empty($_POST["phone_number"]) &&
    !empty($_POST["password"])
  ) {


    $email = test_input($_POST["email"]);
    $motto = test_input($_POST["motto"]);
    $about_us = test_input($_POST["about_us"]);
    $sch_name = test_input($_POST["sch_name"]);
    $phone_number = test_input($_POST["phone_number"]);
    $password = test_input($_POST["password"]);











    //logos Validation
    $target_dir = "logos/";
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["logo"]["tmp_name"]);
      if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        //echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      //echo "Sorry, file already exists.";
      // $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["logo"]["size"] > 500000) {
      //echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      //echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        $uploadOk = 1;
      } else {
        //echo "Sorry, there was an error uploading your file.";
      }
    }







    //logos Validation
    $target_dir2 = "school_images/";
    $target_file2 = $target_dir2 . basename($_FILES["school_image"]["name"]);
    $uploadOk2 = 1;
    $imageFileType2 = pathinfo($target_file2, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check2 = getimagesize($_FILES["school_image"]["tmp_name"]);
      if ($check2 !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk2 = 1;
      } else {
        //echo "File is not an image.";
        $uploadOk2 = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file2)) {
      //echo "Sorry, file already exists.";
      // $uploadOk2 = 0;
    }
    // Check file size
    if ($_FILES["school_image"]["size"] > 500000) {
      //echo "Sorry, your file is too large.";
      $uploadOk2 = 0;
    }
    // Allow certain file formats
    if (
      $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
      && $imageFileType2 != "gif"
    ) {
      //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk2 = 0;
    }
    // Check if $uploadOk2 is set to 0 by an error
    if ($uploadOk2 == 0) {
      //echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["school_image"]["tmp_name"], $target_file2)) {
        $uploadOk2 = 1;
      } else {
        //echo "Sorry, there was an error uploading your file.";
      }
    }









    //insert
    $sql = "INSERT INTO users (
              school_email,
              motto,
              about_us,
              school_name,
              logo,
              school_image,
              contact,
              password
              ) VALUES (
                '$email',
                '$motto',
                '$about_us',
                '$sch_name',
                '$target_file',
                '$target_file2',
                '$phone_number',
                '$password'
                )";

    if ($uploadOk2 == 1 && $uploadOk == 1) {
      $data = mysqli_query($conn, "SELECT * from users WHERE school_email like '$email'");

      if (mysqli_num_rows($data) == 0) {
        mysqli_query($conn, $sql);
        $user_id = mysqli_insert_id($conn);

        setcookie('user_id', $user_id, time() + (86400 * 30), "/");
        setcookie('school_email', $email, time() + (86400 * 30), "/");
        setcookie('motto', $motto, time() + (86400 * 30), "/");
        setcookie('about_us', $about_us, time() + (86400 * 30), "/");
        setcookie('school_name', $sch_name, time() + (86400 * 30), "/");
        setcookie('logo', $target_file, time() + (86400 * 30), "/");
        setcookie('school_image', $target_file2, time() + (86400 * 30), "/");
        setcookie('contact', $phone_number, time() + (86400 * 30), "/");



      //home page
      //insert
      $sql2 = "INSERT INTO home (
      school_email,
      motto,
      about_us,
      school_name,
      logo,
      school_image,
      contact,
      user_id
      ) VALUES (
        '$email',
        '$motto',
        '$about_us',
        '$sch_name',
        '$target_file',
        '$target_file2',
        '$phone_number',
        '$user_id'
        )";
        if (mysqli_query($conn, $sql2)) {
          //created_pages 
          $sql3 = "INSERT INTO created_pages (
          page_name,
          user_id
          ) VALUES (
            'Home',
            '$user_id'
            )";
          if (mysqli_query($conn, $sql3)) {
            setcookie('Home', 'Home', time() + (86400 * 30), "/");
            header('Location: progress_report.php?signup_good');
          }
        }
      } else {
        echo '<script>';
        echo '$(document).ready(function () {
						var text = "<span><span class=\'red-text\'>STATUS:</span> Account Already Exists</span>";
						M.toast({ html: text });
					});';
        echo '</script>';
      }
    } else {
      echo '<script>';
      echo '$(document).ready(function () {
						var text = "<span><span class=\'red-text\'>STATUS:</span> Please Attach Smaller Images!</span>";
						M.toast({ html: text });
					});';
      echo '</script>';
    }
  } else {
    echo '<script>';
    echo '$(document).ready(function () {
						var text = "<span><span class=\'red-text\'>STATUS:</span> Please Fill in Form Correctly!</span>";
						M.toast({ html: text });
					});';
    echo '</script>';
  }
}













function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
