<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "scr";

$conn = new mysqli(
  $servername,
  $username,
  $password,
  $databasename
);

$uid = $_SESSION['teacherID'];
$time = time() + 10;
$res = mysqli_query($conn,"UPDATE teachers SET last_login = $time where teacherID = $uid ");

?>