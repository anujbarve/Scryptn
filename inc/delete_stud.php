<?php
require '../inc/db.php';

    $sql = "DELETE FROM users WHERE userID='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: ../admin/manage_students.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

?>