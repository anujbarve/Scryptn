<?php 


require_once 'db.php';
require_once 'functions.php';

if (isset($_POST["submit"])) {
    $aname = $_POST["assignment_name"];
    $adesc = $_POST["assignment_desc"];
    $acourse = $_POST["assigned_course"];
  
  createAssignmentByTeacher($conn,$aname,$adesc,$acourse);


}elseif(isset($_POST["create"])){
    $aname = $_POST["assignment_name"];
    $adesc = $_POST["assignment_desc"];
    $acourse = $_POST["assigned_course"];
  
  createAssignmentByAdmin($conn,$aname,$adesc,$acourse);

}
else{
  header("location: ../register.php");
}
