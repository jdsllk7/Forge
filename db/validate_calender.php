<?php
include 'connect.php';
include 'vars.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // session_start();
  if (isset($_POST['add']) && $_POST['add'] == 'add' || (isset($_POST['finish']) && $_POST['finish'] == 'finish')) {



    if (
      isset($_POST["activity"]) &&
      isset($_POST["activity_type"]) &&
      !empty($_POST["activity"]) &&
      !empty($_POST["activity_type"])
    ) {

      $activity = $_POST["activity"];
      $activity_type = $_POST["activity_type"];
      $user_id = $_COOKIE["user_id"];


      //insert
      $sql = "INSERT INTO calendar (
        date,
        activity,
        user_id
        ) VALUES (
          '$activity_type',
          '$activity',
          '$user_id'
          )";

      if ((isset($_SESSION["editCalender"]) && $_SESSION["editCalender"] == 1)) {
        $sql4 = "DELETE FROM created_pages WHERE user_id = $user_id AND page_name LIKE 'Calender'";
        $sql5 = "DELETE FROM calendar WHERE user_id = $user_id";
        if (mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5)) {
          $_SESSION["editCalender"] = 0;
        }
      }

      if (mysqli_query($conn, $sql)) {

        $sql3 = "INSERT INTO created_pages (
              page_name,
              user_id
              ) VALUES (
                'Calender',
                '$user_id'
                )";
        $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = $user_id and page_name like 'Calender'");

        if (mysqli_num_rows($data) == 0) {
          if (mysqli_query($conn, $sql3)) {
            if (isset($_POST['finish']) && $_POST['finish'] == 'finish') {

              $data = mysqli_query($conn, "SELECT * from calendar WHERE user_id = $user_id");

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

            $data = mysqli_query($conn, "SELECT * from calendar WHERE user_id = $user_id");

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
              var text = "<span><span class=\'red-text\'>STATUS:</span> Please Fill in Form Correctly!</span>";
              M.toast({ html: text });
            });';
      echo '</script>';
    }
  }
}
