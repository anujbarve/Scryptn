<?php

require_once '../inc/db.php';
require_once '../inc/functions.php';


if(isset($_POST["usersubmit"]))
{
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
$course = $_POST["course"];
$image = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "./user-data/profile-photos/" . $image;

// echo "ID : ".$id."<br>";
// echo "FULL NAME: ".$fname."<br>";
// echo "PHONE: ".$phone."<br>";
// echo "UID : ".$uid."<br>";
// echo "ADDRESS: ".$address."<br>";
// echo "GITLINK: ".$gitlink."<br>"; 
// echo "LNLINK: ".$lnlink."<br>";
// echo "INLINK: ".$inlink."<br>";
// echo "TWLINK: ".$twlink."<br>";
// echo "EMAIL: ".$email."<br>";
// echo "DESC: ".$description."<br>";
// echo "IMAGE: ".$image."<br>";

if ($image != null) {
    $sql = "UPDATE `users` SET `userName`='$fname',`userEmail`='$email',`userAddr`='$address',`userPhone`='$phone',`userUid`='$uid',`user_ln`='$lnlink',`user_gh`='$gitlink',`user_in`='$inlink',`user_tw`='$twlink',`user_desc`='$description',`assigned_course`='$course',`user_photo`='$image' WHERE `users`.`userID` = $id";
    mysqli_query($conn, $sql);
  
    if (move_uploaded_file($tempname, $folder)) {
      $msg = "Image uploaded successfully";
    } else {
      $msg = "Failed to upload image";
    }
  
    header("location: ../student/users-profile.php");
    exit();
} else {
    $sql = "UPDATE `users` SET `userName`='$fname',`userEmail`='$email',`userAddr`='$address',`userPhone`='$phone',`userUid`='$uid',`user_ln`='$lnlink',`user_gh`='$gitlink',`user_in`='$inlink',`user_tw`='$twlink',`user_desc`='$description',`assigned_course`='$course' WHERE `users`.`userID` = $id";

    mysqli_query($conn, $sql);

    header("location: ../student/users-profile.php");
    exit();
}
}

if(isset($_POST["teachersubmit"]))
{
  
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
$course = $_POST["course"];
$image = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "./user-data/profile-photos/" . $image;

// echo "ID : ".$id."<br>";
// echo "FULL NAME: ".$fname."<br>";
// echo "PHONE: ".$phone."<br>";
// echo "UID : ".$uid."<br>";
// echo "ADDRESS: ".$address."<br>";
// echo "GITLINK: ".$gitlink."<br>"; 
// echo "LNLINK: ".$lnlink."<br>";
// echo "INLINK: ".$inlink."<br>";
// echo "TWLINK: ".$twlink."<br>";
// echo "EMAIL: ".$email."<br>";
// echo "DESC: ".$description."<br>";
// echo "IMAGE: ".$image."<br>";

if ($image != null) {
    $sql = "UPDATE `teachers` SET `teacherName`='$fname',`teacherEmail`='$email',`teacherAddr`='$address',`teacherPhone`='$phone',`teacherUid`='$uid',`teacher_ln`='$lnlink',`teacher_gh`='$gitlink',`teacher_in`='$inlink',`teacher_tw`='$twlink',`teacher_desc`='$description',`assigned_course`='$course',`teacher_photo`='$image' WHERE `teachers`.`teacherID` = $id";
    mysqli_query($conn, $sql);
  
    if (move_uploaded_file($tempname, $folder)) {
      $msg = "Image uploaded successfully";
    } else {
      $msg = "Failed to upload image";
    }
  
    header("location: ../teacher/profile.php");
    exit();
} else {
    $sql = "UPDATE `teachers` SET `teacherName`='$fname',`teacherEmail`='$email',`teacherAddr`='$address',`teacherPhone`='$phone',`teacherUid`='$uid',`teacher_ln`='$lnlink',`teacher_gh`='$gitlink',`teacher_in`='$inlink',`teacher_tw`='$twlink',`teacher_desc`='$description',`assigned_course`='$course' WHERE `teachers`.`teacherID` = $id";

    mysqli_query($conn, $sql);

    header("location: ../teacher/profile.php");
    exit();
}
  
}

if(isset($_POST["adminsubmit"]))
{
  
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
$folder = "./user-data/profile-photos/" . $image;


if ($image != null) {
    $sql = "UPDATE `admins` SET `admin_name`='$fname',`email`='$email',`admin_addr`='$address',`admin_phone`='$phone',`username`='$uid',`admin_ln`='$lnlink',`admin_gh`='$gitlink',`admin_in`='$inlink',`admin_tw`='$twlink',`admin_desc`='$description',`admin_photo`='$image' WHERE `admins`.`id` = $id";
    mysqli_query($conn, $sql);
  
    if (move_uploaded_file($tempname, $folder)) {
      $msg = "Image uploaded successfully";
    } else {
      $msg = "Failed to upload image";
    }
  
    header("location: ../admin/profile.php");
    exit();
} else {
    $sql = "UPDATE `admins` SET `admin_name`='$fname',`email`='$email',`admin_addr`='$address',`admin_phone`='$phone',`username`='$uid',`admin_ln`='$lnlink',`admin_gh`='$gitlink',`admin_in`='$inlink',`admin_tw`='$twlink',`admin_desc`='$description' WHERE `admins`.`id` = $id";

    mysqli_query($conn, $sql);

    header("location: ../admin/profile.php");
    exit();
}
  
}
