<?php 


require_once 'db.php';
require_once 'functions.php';

if (isset($_POST["submit"])) {
    $cname = $_POST["course_name"];
  $cteacher = $_POST["course_teacher"];
  
  createCourseByAdmin($conn,$cname,$cteacher);


}elseif(isset($_POST["create"])){

  $cname = $_POST["course_name"];
  $cteacher = $_POST["course_teacher"];
  
  createCourseByAdmin($conn,$cname,$cteacher);

}
else{
  header("location: ../register.php");
}
