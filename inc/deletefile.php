<?php
require '../inc/db.php';
$sql = "DELETE FROM user_files WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: ../student/users-profile.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>