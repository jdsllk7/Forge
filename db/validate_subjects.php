<?php

include 'connect.php';
include 'vars.php';
$countMe = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if (isset($_POST['add']) && $_POST['add'] == 'add') {

        if (
            isset($_POST['grade8']) ||
            isset($_POST['grade9']) ||
            isset($_POST['grade10']) ||
            isset($_POST['grade11']) ||
            isset($_POST['grade12']) ||
            !empty($_POST['grade8']) ||
            !empty($_POST['grade9']) ||
            !empty($_POST['grade10']) ||
            !empty($_POST['grade11']) ||
            !empty($_POST['grade12'])
        ) {

            $user_id = $_COOKIE["user_id"];

            if ((isset($_SESSION["editSubjects"]) && $_SESSION["editSubjects"] == 1)) {
                $sql4 = "DELETE FROM created_pages WHERE user_id = $user_id AND page_name LIKE 'Subjects'";
                $sql5 = "DELETE FROM grades WHERE user_id = $user_id";
                if (mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5)) {
                    $_SESSION["editSubjects"] = 0;
                }
            }




            if (isset($_POST['grade8'])) {

                foreach ($_POST['grade8'] as $grade8) {

                    $sql = "INSERT INTO grades (
                                grades,
                                subjects,
                                user_id
                                ) VALUES (
                                'grade8',
                                '$grade8',
                                '$user_id'
                                )";

                    if (mysqli_query($conn, $sql)) {
                        $countMe++;
                    }
                } //end for()

            } //end G8 ***********************************************






            if (isset($_POST['grade9'])) {

                foreach ($_POST['grade9'] as $grade9) {

                    $sql = "INSERT INTO grades (
                                grades,
                                subjects,
                                user_id
                                ) VALUES (
                                'grade9',
                                '$grade9',
                                '$user_id'
                                )";

                    if (mysqli_query($conn, $sql)) {
                        $countMe++;
                    }
                } //end for()

            } //end G8 ***********************************************






            if (isset($_POST['grade10'])) {

                foreach ($_POST['grade10'] as $grade10) {

                    $sql = "INSERT INTO grades (
                                grades,
                                subjects,
                                user_id
                                ) VALUES (
                                'grade10',
                                '$grade10',
                                '$user_id'
                                )";

                    if (mysqli_query($conn, $sql)) {
                        $countMe++;
                    }
                } //end for()

            } //end G8 ***********************************************






            if (isset($_POST['grade11'])) {

                foreach ($_POST['grade11'] as $grade11) {

                    $sql = "INSERT INTO grades (
                                grades,
                                subjects,
                                user_id
                                ) VALUES (
                                'grade11',
                                '$grade11',
                                '$user_id'
                                )";

                    if (mysqli_query($conn, $sql)) {
                        $countMe++;
                    }
                } //end for()

            } //end G8 ***********************************************





            if (isset($_POST['grade12'])) {

                foreach ($_POST['grade12'] as $grade12) {

                    $sql = "INSERT INTO grades (
                                grades,
                                subjects,
                                user_id
                                ) VALUES (
                                'grade12',
                                '$grade12',
                                '$user_id'
                                )";
                    if (mysqli_query($conn, $sql)) {
                        $countMe++;
                    }
                } //end for()

            } //end G12 ***********************************************





            if ($countMe > 0) {

                $sql3 = "INSERT INTO created_pages (
                            page_name,
                            user_id
                            ) VALUES (
                                'Subjects',
                                '$user_id'
                                )";
                $data = mysqli_query($conn, "SELECT * from created_pages WHERE user_id = $user_id and page_name like 'Subjects'");

                if (mysqli_num_rows($data) == 0) {

                    if (mysqli_query($conn, $sql3)) {
                        if ((isset($_SESSION["edit"]) && $_SESSION["edit"] == 1)) {
                            header('Location: progress_report.php?pageEdited');
                        } else {
                            header('Location: progress_report.php?pageCreated');
                        }
                    }
                }
            } //end if-countMe



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
