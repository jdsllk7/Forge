<?php
session_start();
  if(isset($_POST['add']) && $_POST['add'] == 'add'){
    $_SESSION["add"]++;
    header('Location: ../staff.php');
    
  }elseif(isset($_POST['finish']) && $_POST['finish'] == 'finish'){
  	header('Location: ../staff.php');
  }

?>