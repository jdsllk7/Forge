<?php
include 'connect.php';
include 'vars.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // session_start();
  if (isset($_POST['add']) && $_POST['add'] == 'add' || (isset($_POST['finish']) && $_POST['finish'] == 'finish')) {



    if (
      isset($_POST["title"]) &&
      isset($_POST["desc"]) &&
      !empty($_POST["title"]) &&
      !empty($_POST["desc"])
    ) {

      $title = $_POST["title"];
      $desc = $_POST["desc"];
      $user_id = $_COOKIE["user_id"];




      //ach_imgs Validation
      $target_dir = "achievement_imgs/";
      $target_file = $target_dir . basename($_FILES["ach_img"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["ach_img"]["tmp_name"]);
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
      if ($_FILES["ach_img"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["ach_img"]["tmp_name"], $target_file)) {
          $uploadOk = 1;
        } else {
          //echo "Sorry, there was an error uploading your file.";
        }
      }



      if ($uploadOk == 1) {

        if ((isset($_SESSION["editAchievements"]) && $_SESSION["editAchievements"] == 1)) {
          $sql4 = "DELETE FROM created_pages WHERE user_id = $user_id AND page_name LIKE 'Achievements'";
          $sql5 = "DELETE FROM achievements WHERE user_id = $user_id";
          if (mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5)) { 
            $_SESSION["editAchievements"] = 0;
          }
        }

        //insert
        $sql = "INSERT INTO achievements (
        achievement_name,
        achievement_description,
        achievement_image,
        user_id
        ) VALUES (
          '$title',
          '$desc',
          '$target_file',
          '$user_id'
          )";

        if (mysqli_query($conn, $sql)) {

          $sql3 = "INSERT INTO created_pages (
              page_name,
              user_id
              ) VALUES (
                'Achievements',
                '$user_id'
                )";
          $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = $user_id and page_name like 'Achievements'");

          if (mysqli_num_rows($data) == 0) {
            if (mysqli_query($conn, $sql3)) {
              if (isset($_POST['finish']) && $_POST['finish'] == 'finish') {

                $data = mysqli_query($conn, "SELECT * from achievements WHERE user_id = $user_id");

                if (mysqli_num_rows($data) >= 1) {
                  if ((isset($_SESSION["edit"]) && $_SESSION["edit"] == 1)) {
                    header('Location: progress_report.php?pageEdited');
                  } else {
                    header('Location: progress_report.php?pageCreated');
                  }
                } else {
                  header('Location: progress_report.php?pageNotCreated');
                }
              } else {
                $_SESSION["add"]++;
              }
            }
          } else {
            if (isset($_POST['finish']) && $_POST['finish'] == 'finish') {

              $data = mysqli_query($conn, "SELECT * from achievements WHERE user_id = $user_id");

              if (mysqli_num_rows($data) >= 1) {
                if ((isset($_SESSION["edit"]) && $_SESSION["edit"] == 1)) {
                  header('Location: progress_report.php?pageEdited');
                } else {
                  header('Location: progress_report.php?pageCreated');
                }
              } else {
                header('Location: progress_report.php?pageNotCreated');
              }
            } else {
              $_SESSION["add"]++;
            }
          }
        }
      } else {
        echo '<script>';
        echo '$(document).ready(function () {
          var text = "<span><span class=\'red-text\'>STATUS:</span> Image Error</span>";
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
}
