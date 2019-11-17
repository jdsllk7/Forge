<?php
session_start();
$_SESSION["edit"] = 1;

if (isset($_GET["Home"])) {
    $_SESSION["editHome"] = 1;
    header('Location:../signup.php?edit_page');

} elseif (isset($_GET["Achievements"])) {
    $_SESSION["editAchievements"] = 1;
    header('Location:../Achievements.php?edit_page');

}elseif (isset($_GET["Activities"])) {
    $_SESSION["editActivities"] = 1;
    header('Location:../Activities.php?edit_page');

}elseif (isset($_GET["Calender"])) {
    $_SESSION["editCalender"] = 1;
    header('Location:../Calender.php?edit_page');

}elseif (isset($_GET["Staff"])) {
    $_SESSION["editStaff"] = 1;
    header('Location:../Staff.php?edit_page');

}elseif (isset($_GET["Subjects"])) {
    $_SESSION["editSubjects"] = 1;
    header('Location:../Subjects.php?edit_page');
}
