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

$uid = $_SESSION['userID'];
$time = time() + 10;
$res = mysqli_query($conn,"UPDATE users SET last_login = $time where userID = $uid ");

?>