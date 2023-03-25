<?php

require_once '../inc/db.php';
require_once '../inc/functions.php';


$id = $_POST["userID"];
$fname = $_POST["fname"];
$phone = $_POST["userPhone"];
$uid = $_POST["userUid"];
$address = mysqli_real_escape_string($conn, $_POST["userAddr"]);
$gitlink =  mysqli_real_escape_string($conn, $_POST["user_gh"]);
$lnlink =  mysqli_real_escape_string($conn, $_POST["user_ln"]);
$inlink = mysqli_real_escape_string($conn, $_POST["user_in"]);
$twlink = mysqli_real_escape_string($conn, $_POST["user_tw"]);
$email = $_POST["userEmail"];
$description = mysqli_real_escape_string($conn, $_POST["user_desc"]);
$image = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "../user-data/profile-photos/" . $image;


if ($image != null) {
    $sql = "UPDATE `users` SET `userName`='$fname',`userEmail`='$email',`userAddr`='$address',`userPhone`='$phone',`userUid`='$uid',`user_ln`='$lnlink',`user_gh`='$gitlink',`user_in`='$inlink',`user_tw`='$twlink',`user_desc`='$description',`user_photo`='$image' WHERE `users`.`userID` = $id";

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

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);

    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

    header("location: ../student/users-profile.php");
    exit();
} else {
    $sql = "UPDATE `users` SET `userName`='$fname',`userEmail`='$email',`userAddr`='$address',`userPhone`='$phone',`userUid`='$uid',`user_ln`='$lnlink',`user_gh`='$gitlink',`user_in`='$inlink',`user_tw`='$twlink',`user_desc`='$description' WHERE `users`.`userID` = $id";

    mysqli_query($conn, $sql);

    header("location: ../user_dash.php?error=none");
    exit();
}
