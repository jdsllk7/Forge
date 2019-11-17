<?php
session_start();

if (!isset($_COOKIE["school_email"])) {
	header('Location:login.php');
}

?>

<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Forge</title>

	<!-- CSS -->
	<link href="materialize/materials_icons/css/material-icons.css" rel="stylesheet" />
	<link rel="stylesheet" href="materialize/css/materialize.min.css">
	<link rel="stylesheet" href="css/styles.css">

	<!-- browser icons -->
	<link rel="icon" type="image/gif" href="img/icon-72x72.png">
	<link rel="shortcut icon" href="img/logo.jpg">

	<meta name="theme-color" content="#4db6ac">

	<!--Import jQuery before materialize.js-->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="materialize/js/materialize.min.js"></script>
	<script src="materialize/js/init.js"></script>
	<script src="js/ui.js"></script>

</head>

<?php include 'db/validate_subjects.php'; ?>


<body class="grey lighten-4">

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper blue darken-2">
				<a href="index.php" class="brand-logo">
					<div class="col s3" style='margin-top:10px;padding-left:5px;'>
						<img src="img/logo.jpg" width='50px' height='50px' alt="Logo" class="circle responsive-img">
						<span style='position:relative;top:-12px;'>Forge</span>
					</div>
				</a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<?php
					if ((isset($_SESSION["edit"]) && $_SESSION["edit"] == 1)) {
						echo '<li class="active"><a class="waves-effect waves-light modal-trigger" href="#modal1">Info<span class="new badge" data-badge-caption="Editing"></span></a></li>';
					}
					?>
					<li><a href="progress_report.php">Progress</a></li>
					<li><a href="db/log_out.php">Log Out</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<ul class="sidenav mobile-demo" id="mobile-demo">
		<?php
		if ((isset($_SESSION["edit"]) && $_SESSION["edit"] == 1)) {
			echo '<li class="active"><a class="waves-effect waves-light modal-trigger" href="#modal1">Info<span class="new badge" data-badge-caption="Editing"></span></a></li>';
		}
		?>
		<li><a href="progress_report.php">Progress</a></li>
		<li><a href="db/log_out.php">Log Out</a></li>
	</ul>

	<br>
	<br>

	<form class="container center-align" enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

		<?php

		?>

		<h4>Select Grade Subjects</h4><br>
		<div class="row">
			<div class="input-field col s6 offset-s3">
				<select required multiple name="grade8[]">
					<option value="" disabled selected>Grade 8 subjects: </option>
					<option value="English">English</option>
					<option value="Mathematics">Mathematics</option>
					<option value="Physics">Physics</option>
					<option value="Chemistry">Chemistry</option>
					<option value="Biology">Biology</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s6 offset-s3">
				<select required multiple name="grade9[]">
					<option value="" disabled selected>Grade 9 subjects: </option>
					<option value="English">English</option>
					<option value="Mathematics">Mathematics</option>
					<option value="Physics">Physics</option>
					<option value="Chemistry">Chemistry</option>
					<option value="Biology">Biology</option>
				</select>
			</div>
		</div>


		<div class="row">
			<div class="input-field col s6 offset-s3">
				<select required multiple name="grade10[]">
					<option value="" disabled selected>Grade 10 subjects: </option>
					<option value="English">English</option>
					<option value="Mathematics">Mathematics</option>
					<option value="Physics">Physics</option>
					<option value="Chemistry">Chemistry</option>
					<option value="Biology">Biology</option>
				</select>
			</div>
		</div>


		<div class="row">
			<div class="input-field col s6 offset-s3">
				<select required multiple name="grade11[]">
					<option value="" disabled selected>Grade 11 subjects: </option>
					<option value="English">English</option>
					<option value="Mathematics">Mathematics</option>
					<option value="Physics">Physics</option>
					<option value="Chemistry">Chemistry</option>
					<option value="Biology">Biology</option>
				</select>
			</div>
		</div>


		<div class="row">
			<div class="input-field col s6 offset-s3">
				<select required multiple name="grade12[]">
					<option value="" disabled selected>Grade 12 subjects: </option>
					<option value="English">English</option>
					<option value="Mathematics">Mathematics</option>
					<option value="Physics">Physics</option>
					<option value="Chemistry">Chemistry</option>
					<option value="Biology">Biology</option>
				</select>
			</div>
		</div>

		<button class="waves-effect waves-light btn-large orange darken-4" name="add" value="add" type="submit">Create</button>

	</form>
	<br>

	<!-- Modal Structure -->
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4 class="blue-text darken-2">Edit Subjects Page</h4>
			<p>Please Note that by editing your Subjects,<br>all your previous entries will be deleted<br>to make room for these new ones.</p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Okay</a>
		</div>
	</div>

</body>

</html>