<?php 

if(isset($_POST["submit"])){
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'db.php';
    require_once 'functions.php';

    if (emptyInputLogin($username,$pwd) !== false) {
        header("location: ../admin/login.php?message=emptyinput");
        exit();
    }

    loginAdmin($conn,$username,$pwd);
}else{
    header("location: ../admin/login.php");
    exit();
}