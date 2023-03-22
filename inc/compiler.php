<?php

function get_operating_system() {
    $u_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $operating_system = 'Unknown Operating System';

    //Get the operating_system name
	if($u_agent) {
		if (preg_match('/linux/i', $u_agent)) {
			$operating_system = 'Linux';
		} elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
			$operating_system = 'Mac';
		} elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
			$operating_system = 'Windows';
		} elseif (preg_match('/ubuntu/i', $u_agent)) {
			$operating_system = 'Ubuntu';
		} elseif (preg_match('/iphone/i', $u_agent)) {
			$operating_system = 'IPhone';
		} elseif (preg_match('/ipod/i', $u_agent)) {
			$operating_system = 'IPod';
		} elseif (preg_match('/ipad/i', $u_agent)) {
			$operating_system = 'IPad';
		} elseif (preg_match('/android/i', $u_agent)) {
			$operating_system = 'Android';
		} elseif (preg_match('/blackberry/i', $u_agent)) {
			$operating_system = 'Blackberry';
		} elseif (preg_match('/webos/i', $u_agent)) {
			$operating_system = 'Mobile';
		}
	} else {
		$operating_system = php_uname('s');
	}
    
    return $operating_system;
}

$languages = strtolower($_POST['language']);
$code = $_POST['code'];

if($code != "")
{

    $os = get_operating_system();

    if($os == 'Windows')
    {
        $random = substr(md5(mt_rand()),0,7);
        $filepath = "temp\\".$random.".".$languages;
        $programFile = fopen($filepath, "w");
        fwrite($programFile,$code);
        fclose($programFile);
    
    
        if($languages == 'php')
        {
            $output = shell_exec("php.exe $filepath 2>&1");
            echo $output;
            unlink($filepath);
        }
        if($languages == 'py')
        {
            $output = shell_exec("python $filepath 2>&1");
            echo $output;
            unlink($filepath);
        }
        if($languages == 'node')
        {
            rename($filepath, $filepath."js");
            $output = shell_exec("node $filepath 2>&1");
            echo $output;
            unlink($filepath);
        }
        if($languages == 'c')
        {
            $outputExe = $random.".exe";
            shell_exec("gcc $filepath -o $outputExe");
            $output = shell_exec(__DIR__."//$outputExe");
            if($output)
            {
                echo $output;
                unlink($filepath);
                unlink($outputExe);
            }
            else
            {
                echo "Error";
                unlink($filepath);
                unlink($outputExe);
            }
            
        }
        if($languages == 'cpp')
        {
            $outputExe = $random.".exe";
            shell_exec("g++ $filepath -o $outputExe");
            $output = shell_exec(__DIR__."//$outputExe");
            if($output)
            {
                echo $output;
                unlink($filepath);
                unlink($outputExe);
            }
            else
            {
                echo "Error";
                unlink($filepath);
                unlink($outputExe);
            }
        }
    }
    else
    {
        $random = substr(md5(mt_rand()),0,7);
        $filepath = "temp/".$random.".".$languages;
        $programFile = fopen($filepath, "w");
        fwrite($programFile,$code);
        fclose($programFile);
    
    
    if($languages == 'php')
    {
        $output = shell_exec("/opt/lampp/bin/php-8.2.0 $filepath 2>&1");
        echo $output;
    }
    }


 
}
