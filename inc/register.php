<?php 


require_once 'db.php';
require_once 'functions.php';

if (isset($_POST["submit"])) {
  
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdrepeat = $_POST["pwdrepeat"];

  if (emptyInputRegister($name,$email,$username,$pwd,$pwdrepeat) !== false) {
    header("location: ../register.php?message=emptyInput");
    exit();
  }
  if (invalidUid($username) !== false) {
    header("location: ../register.php?message=invaliduid");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../register.php?message=invalidemail");
    exit();
  }
  if (pwdMatch($pwd,$pwdrepeat) !== false) {
    header("location: ../register.php?message=passwordsdontmatch");
    exit();
  }
  if (uidExists($conn,$username,$email) !== false) {
    header("location: ../register.php?message=usernametaken");
    exit();
  }
  
  createUser($conn,$name,$email,$username,$pwd);

}elseif(isset($_POST["create"])){

  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdrepeat = $_POST["pwdrepeat"];


  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputRegister($name,$email,$username,$pwd,$pwdrepeat) !== false) {
    header("location: ../admin/create.php?message=emptyInput");
    exit();
  }
  if (invalidUid($username) !== false) {
    header("location: ../admin/create.php?message=invaliduid");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../admin/create.php?message=invalidemail");
    exit();
  }
  if (pwdMatch($pwd,$pwdrepeat) !== false) {
    header("location: ../admin/create.php?message=passwordsdontmatch");
    exit();
  }
  if (uidExists($conn,$username,$email) !== false) {
    header("location: ../admin/create.php?message=usernametaken");
    exit();
  }
  
  createUserByAdmin($conn,$name,$email,$username,$pwd);

}
else{
  header("location: ../register.php");
}

?>