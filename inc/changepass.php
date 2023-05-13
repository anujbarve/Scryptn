<?php 
require_once 'db.php';
require_once 'functions.php';

if (isset($_POST["usersubmit"])) {
    $newpass = $_POST["newpass"];
    $oldpass = $_POST["oldpass"];
    $id = $_POST["userID"];
    changePassword($id,$oldpass,$newpass);
}

if(isset($_POST["teachersubmit"])){
    $newpass = $_POST["newpass"];
    $oldpass = $_POST["oldpass"];
    $id = $_POST["teacherID"];

    changePasswordTeacher($id,$oldpass,$newpass);
}


if(isset($_POST["adminsubmit"])){
    $newpass = $_POST["newpass"];
    $oldpass = $_POST["oldpass"];
    $id = $_POST["adminID"];
    changePasswordAdmin($id,$oldpass,$newpass);
}else{
    header("location: ../login.php");
    exit();
}
?>