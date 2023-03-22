<?php

$languages = strtolower($_POST['language']);
$code = $_POST['code'];

if($code != "")
{
    $random = substr(md5(mt_rand()),0,7);
    $filepath = "temp/".$random.".".$languages;
    $programFile = fopen($filepath, "w");
    fwrite($programFile,$code);
    fclose($programFile);
}

if($languages == 'php')
{
    $output = shell_exec("/opt/lampp/bin/php-8.2.0 $filepath 2>&1");
    echo $output;
}

?>