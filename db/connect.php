<?php

$error_msg = 'Sorry could not connect to server...';
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'forge_db';

// CREATE CONNECTION
$conn = mysqli_connect($servername, $username, $password);

// CHECK CONNECTION
if (!$conn) {
	die($error_msg);
}

// CREATE THE DATABASE
// $sql = "DROP DATABASE IF EXISTS forge_db";
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($conn, $sql)) {
	$conn = mysqli_connect($servername, $username, $password, $db);
} else {
	die($error_msg);
}


$sql = "CREATE TABLE IF NOT EXISTS users (
	user_id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	school_email VARCHAR(200) NOT NULL,
	motto VARCHAR(200) NOT NULL,
	about_us VARCHAR(200) NOT NULL,
	school_name VARCHAR(200) NOT NULL,
	logo VARCHAR(300),
	school_image VARCHAR(300),
	contact VARCHAR(200) NOT NULL,
	password VARCHAR(200) NOT NULL
	)";
// $sql = "DROP TABLE IF EXISTS users";
mysqli_query($conn, $sql);




$sql = "CREATE TABLE IF NOT EXISTS created_pages (
	id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	page_name VARCHAR(200) NOT NULL,
	user_id BIGINT(20) UNSIGNED,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	)";
// $sql = "DROP TABLE IF EXISTS created_pages";
mysqli_query($conn, $sql);




if (isset($_COOKIE["user_id"])) {

	$sql = "CREATE TABLE IF NOT EXISTS untouched_pages (
		id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		page_name VARCHAR(200) NOT NULL,
		user_id BIGINT(20) UNSIGNED
		)";
	// $sql = "DROP TABLE IF EXISTS untouched_pages";
	mysqli_query($conn, $sql);

	$data = mysqli_query($conn, "SELECT * from untouched_pages WHERE page_name like 'Home' and user_id = " . $_COOKIE["user_id"] . "");
	if (mysqli_num_rows($data) == 0) { 
		mysqli_query($conn, "INSERT INTO `untouched_pages`(`page_name`, `user_id`) VALUES ('Home'," . $_COOKIE["user_id"] . ")");
	}

	$data = mysqli_query($conn, "SELECT * from untouched_pages WHERE page_name like 'Achievements' and user_id = " . $_COOKIE["user_id"] . "");
	if (mysqli_num_rows($data) == 0) { 
		mysqli_query($conn, "INSERT INTO `untouched_pages`(`page_name`, `user_id`) VALUES ('Achievements'," . $_COOKIE["user_id"] . ")");
	}

	$data = mysqli_query($conn, "SELECT * from untouched_pages WHERE page_name like 'Activities' and user_id = " . $_COOKIE["user_id"] . "");
	if (mysqli_num_rows($data) == 0) { 
		mysqli_query($conn, "INSERT INTO `untouched_pages`(`page_name`, `user_id`) VALUES ('Activities'," . $_COOKIE["user_id"] . ")");
	}

	$data = mysqli_query($conn, "SELECT * from untouched_pages WHERE page_name like 'Calender' and user_id = " . $_COOKIE["user_id"] . "");
	if (mysqli_num_rows($data) == 0) { 
		mysqli_query($conn, "INSERT INTO `untouched_pages`(`page_name`, `user_id`) VALUES ('Calender'," . $_COOKIE["user_id"] . ")");
	}

	$data = mysqli_query($conn, "SELECT * from untouched_pages WHERE page_name like 'Staff' and user_id = " . $_COOKIE["user_id"] . "");
	if (mysqli_num_rows($data) == 0) { 
		mysqli_query($conn, "INSERT INTO `untouched_pages`(`page_name`, `user_id`) VALUES ('Staff'," . $_COOKIE["user_id"] . ")");
	}

	$data = mysqli_query($conn, "SELECT * from untouched_pages WHERE page_name like 'Subjects' and user_id = " . $_COOKIE["user_id"] . "");
	if (mysqli_num_rows($data) == 0) { 
		mysqli_query($conn, "INSERT INTO `untouched_pages`(`page_name`, `user_id`) VALUES ('Subjects'," . $_COOKIE["user_id"] . ")");
	}
	
}



$sql = "CREATE TABLE IF NOT EXISTS home (
	home_id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	school_email VARCHAR(200) NOT NULL,
	motto VARCHAR(200) NOT NULL,
	about_us VARCHAR(200) NOT NULL,
	school_name VARCHAR(200) NOT NULL,
	logo VARCHAR(300),
	school_image VARCHAR(300),
	contact VARCHAR(200) NOT NULL,
	user_id BIGINT(20) UNSIGNED,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	)";
// $sql = "DROP TABLE IF EXISTS home";
mysqli_query($conn, $sql);



$sql = "CREATE TABLE IF NOT EXISTS grades (
	grade_id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	grades VARCHAR(200) NOT NULL,
	subjects VARCHAR(200) NOT NULL,
	user_id BIGINT(20) UNSIGNED,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	)";
// $sql = "DROP TABLE IF EXISTS grades";
mysqli_query($conn, $sql);



$sql = "CREATE TABLE IF NOT EXISTS calendar (
	calendar_id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	date VARCHAR(200) NOT NULL,
	activity VARCHAR(200) NOT NULL,
	user_id BIGINT UNSIGNED,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	)";
// $sql = "DROP TABLE IF EXISTS calendar";
mysqli_query($conn, $sql);



$sql = "CREATE TABLE IF NOT EXISTS activities (
	activity_id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	activity_name VARCHAR(200) NOT NULL,
	activity_type VARCHAR(200) NOT NULL,
	user_id BIGINT UNSIGNED,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	)";
// $sql = "DROP TABLE IF EXISTS activities";
mysqli_query($conn, $sql);



$sql = "CREATE TABLE IF NOT EXISTS achievements (
	achievement_id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	achievement_name VARCHAR(200) NOT NULL,
	achievement_description VARCHAR(300),
	achievement_image VARCHAR(300),
	user_id BIGINT UNSIGNED,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	)";
// $sql = "DROP TABLE IF EXISTS achievements";
mysqli_query($conn, $sql);



$sql = "CREATE TABLE IF NOT EXISTS staff (
	staff_id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	staff_name VARCHAR(200) NOT NULL,
	staff_description VARCHAR(200) NOT NULL,
	staff_image VARCHAR(300),
	user_id BIGINT UNSIGNED,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	)";
// $sql = "DROP TABLE IF EXISTS staff";
mysqli_query($conn, $sql);
