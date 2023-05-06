<?php

session_start();

$assignment_name = $_POST["assignment_name"];
$lang = $_POST["lang"];
$scode = $_POST["scode"];
$filename = $_POST["filename"];


    require_once "./db.php";
	$scode = mysqli_real_escape_string($conn, $_POST["scode"]);
	$username = $_SESSION['userUid'];
	$sql = "INSERT INTO `completed_assignments`(`filename`, `assignment_name`, `user`, `source_code`, `lang`) VALUES ('$filename','$assignment_name','$username','$scode','$lang')";
	if (mysqli_query($conn, $sql)) {
		header("location: ../student/index.php?message=code_saved_successfully");
		$_SESSION['fname'] = $filename;
		exit();
	} else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	}
	mysqli_close($conn);
