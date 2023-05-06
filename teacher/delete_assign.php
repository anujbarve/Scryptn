<?php
require '../inc/db.php';

    $sql = "DELETE FROM assignments WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: ./manage_assignments.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

?>