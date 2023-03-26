<?php 

if(isset($_POST["submit"])){
    $newpass = $_POST["newpass"];
    $oldpass = $_POST["oldpass"];
    $id = $_POST["userID"];

    require_once 'db.php';
    require_once 'functions.php';

    changePassword($id,$oldpass,$newpass);
}else{
    header("location: ../login.php");
    exit();
}

?>