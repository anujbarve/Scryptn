<?php

if (!(isset($_SESSION['teacherUid']) && $_SESSION['teacherUid'] != '')) {

header ("Location: ../index.php");

}

?>