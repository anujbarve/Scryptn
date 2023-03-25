<?php

if (!(isset($_SESSION['userUid']) && $_SESSION['userUid'] != '')) {

header ("Location: ../index.php");

}

?>