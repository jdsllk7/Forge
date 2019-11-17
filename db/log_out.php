<?php

setcookie('user_id', '', time() - 3600, "/");
setcookie('school_email', '', time() - 3600, "/");
setcookie('motto', '', time() - 3600, "/");
setcookie('about_us', '', time() - 3600, "/");
setcookie('school_name', '', time() - 3600, "/");
setcookie('logo', '', time() - 3600, "/");
setcookie('school_image', '', time() - 3600, "/");
setcookie('contact', '', time() - 3600, "/");

$_SESSION["edit"] = 0;
$_SESSION["editHome"] = 0;
$_SESSION["editActivities"] = 0;
$_SESSION["editAchievements"] = 0;
$_SESSION["editCalender"] = 0;
$_SESSION["editStaff"] = 0;
$_SESSION["editSubjects"] = 0;

header('Location:../index.php#log_out');
