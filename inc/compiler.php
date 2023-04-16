<?php



// function get_operating_system() {
//     $u_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
//     $operating_system = 'Unknown Operating System';

//     //Get the operating_system name
// 	if($u_agent) {
// 		if (preg_match('/linux/i', $u_agent)) {
// 			$operating_system = 'Linux';
// 		} elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
// 			$operating_system = 'Mac';
// 		} elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
// 			$operating_system = 'Windows';
// 		} elseif (preg_match('/ubuntu/i', $u_agent)) {
// 			$operating_system = 'Ubuntu';
// 		} elseif (preg_match('/iphone/i', $u_agent)) {
// 			$operating_system = 'IPhone';
// 		} elseif (preg_match('/ipod/i', $u_agent)) {
// 			$operating_system = 'IPod';
// 		} elseif (preg_match('/ipad/i', $u_agent)) {
// 			$operating_system = 'IPad';
// 		} elseif (preg_match('/android/i', $u_agent)) {
// 			$operating_system = 'Android';
// 		} elseif (preg_match('/blackberry/i', $u_agent)) {
// 			$operating_system = 'Blackberry';
// 		} elseif (preg_match('/webos/i', $u_agent)) {
// 			$operating_system = 'Mobile';
// 		}
// 	} else {
// 		$operating_system = php_uname('s');
// 	}

//     return $operating_system;
// }

// $languages = strtolower($_POST['lang']);
// $code = $_POST['scode'];

// if($code != "")
// {

//     $os = get_operating_system();

//     if($os == 'Windows')
//     {
//         $random = substr(md5(mt_rand()),0,7);
//         $filepath = "temp\\".$random.".".$languages;
//         $programFile = fopen($filepath, "w");
//         fwrite($programFile,$code);
//         fclose($programFile);


//         if($languages == 'php')
//         {
//             $output = shell_exec("php.exe $filepath 2>&1");
//             echo $output;
//             unlink($filepath);
//         }
//         if($languages == 'py')
//         {
//             $output = shell_exec("python $filepath 2>&1");
//             echo $output;
//             unlink($filepath);
//         }
//         if($languages == 'node')
//         {
//             rename($filepath, $filepath."js");
//             $output = shell_exec("node $filepath 2>&1");
//             echo $output;
//             unlink($filepath);
//         }
//         if($languages == 'c')
//         {
//             $outputExe = $random.".exe";
//             shell_exec("gcc $filepath -o $outputExe");
//             $output = shell_exec(__DIR__."//$outputExe");
//             if($output)
//             {
//                 echo $output;
//                 unlink($filepath);
//                 unlink($outputExe);
//             }
//             else
//             {
//                 echo "Error";
//                 unlink($filepath);
//                 unlink($outputExe);
//             }

//         }
//         if($languages == 'cpp')
//         {
//             $outputExe = $random.".exe";
//             shell_exec("g++ $filepath -o $outputExe");
//             $output = shell_exec(__DIR__."//$outputExe");
//             if($output)
//             {
//                 echo $output;
//                 unlink($filepath);
//                 unlink($outputExe);
//             }
//             else
//             {
//                 echo "Error";
//                 unlink($filepath);
//                 unlink($outputExe);
//             }
//         }
//     }
//     else
//     {
//         $random = substr(md5(mt_rand()),0,7);
//         $filepath = "temp/".$random.".".$languages;
//         $programFile = fopen($filepath, "w");
//         fwrite($programFile,$code);
//         fclose($programFile);


//         if($languages == 'php')
//         {
//             $output = shell_exec("/opt/lampp/bin/php-8.2.0 $filepath 2>&1");
//             echo $output;
//             unlink($filepath);
//         }
//         if($languages == 'py')
//         {
//             $output = shell_exec("python3 $filepath 2>&1");
//             echo $output;
//             // unlink($filepath);
//         }
//         if($languages == 'js')
//         {
//             $output = exec("/usr/bin/node $filepath 2>&1");
//             echo $output;
//             // unlink($filepath);
//         }
//         if($languages == 'c')
//         {
//             $outputExe = $random.".out";
//             shell_exec("gcc $filepath -o $outputExe");
//             $output = shell_exec(__DIR__."//$outputExe");
//             if($output)
//             {
//                 echo $output;
//                 unlink($filepath);
//                 unlink($outputExe);
//             }
//             else
//             {
//                 echo "Error";
//                 unlink($filepath);
//                 unlink($outputExe);
//             }

//         }
//         if($languages == 'cpp')
//         {
//             $outputExe = $random;
//             shell_exec("g++ $filepath -o $outputExe");
//             $output = shell_exec(__DIR__."//$outputExe");
//             if($output)
//             {
//                 echo $output;
//                 unlink($filepath);
//                 unlink($outputExe);
//             }
//             else
//             {
//                 echo "Error";
//                 unlink($filepath);
//                 unlink($outputExe);
//             }
//         }
//     }
// }


$lang = $_POST["lang"];
$scode = $_POST["scode"];
$stdin = $_POST["stdin"];


$scode_enc = base64_encode($scode);
$stdin_enc = base64_encode($stdin);

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "http://172.17.0.1:2358/submissions?base64_encoded=true&fields=*",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r
    \"language_id\": \"$lang\",\r
    \"source_code\": \"$scode_enc\",\r
    \"stdin\": \"$stdin_enc\"
}",
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

sleep(1);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $token = json_decode($response);
    $token_name = $token->token;

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "http://172.17.0.1:2358/submissions/$token_name?base64_encoded=true&fields=*",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $decoded = json_decode($response);
        $output = $decoded->stdout;
        $final_output = base64_decode($output);
        $status_id = $decoded->status->id;
        $error = $decoded->status->description;

        if ($status_id == "3") {
            $output = nl2br($final_output);
            $_SESSION['final_output'] = nl2br($final_output);
            $_SESSION['filename'] = $filename;
            $_SESSION['input'] = $stdin;
            $_SESSION['lang'] = $lang;
            $_SESSION['scode'] = $scode;
            echo $output;
        } else {
            $output = nl2br($error);
            $_SESSION['final_output'] = nl2br($error);
            echo $output;
        }
    }
}
