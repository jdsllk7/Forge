<?php

//validation variables

$phone_number = '';
$email = '';
$password = '00000';
$activity_type = '';
$activity = '';
$title = '';
$desc = '';
$sch_name = '';
$motto = '';
$about_us = '';


if ((isset($_SESSION["editHome"]) && $_SESSION["editHome"] == 1)) {
	include 'connect.php';

	$user_id = $_COOKIE["user_id"];
	$data = mysqli_query($conn, "select * from home where user_id = '$user_id'");
	$user = mysqli_fetch_assoc($data);

	$phone_number = $user['contact'];
	$email = $user['school_email'];
	$sch_name = $user['school_name'];
	$motto = $user['motto'];
	$about_us = $user['about_us'];
}
