<?php

session_start();

$lang = $_POST["lang"];
$scode = $_POST["scode"];
$filename = $_POST["filename"];


    require_once "./db.php";
	$scode = mysqli_real_escape_string($conn, $_POST["scode"]);
	$username = $_SESSION['userUid'];
	$sql = "INSERT INTO user_files (name,extension,source_code,user_name)
	VALUES ('$filename','$lang','$scode','$username')";
	if (mysqli_query($conn, $sql)) {
		header("location: ../online_compiler.php?message=code_saved_successfully");
		$_SESSION['fname'] = $filename;
		exit();
	} else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	}
	mysqli_close($conn);
