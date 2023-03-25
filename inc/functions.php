<?php

function emptyInputRegister($name,$email,$username,$pwd,$pwdrepeat){
    $result = false;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result = false;
    $pattern = "/^[a-zA-Z0-9]*$/";
    if (!preg_match($pattern,$username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = false;
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdrepeat){
    $result = false;
    if ($pwd !== $pwdrepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function uidExists($conn,$username,$email){
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../register.php?message=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$username,$pwd){
    $sql = "INSERT INTO users (userName,userEmail,userUid,userPwd) VALUES (?,?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../register.php?message=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signin.php?message=user_created_successfully");
    exit();
}


function createUserByAdmin($conn,$name,$email,$username,$pwd){
    $sql = "INSERT INTO users (userName,userEmail,userUid,userPwd) VALUES (?,?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../register.php?message=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin/index.php?message=none");
    exit();
}

// 

function emptyInputLogin($username,$pwd){
    $result = false;
    if (empty($username) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$username,$pwd){
    $uidExist = uidExists($conn,$username,$username);

    if ($uidExist === false) {
        header("location: ../login.php?message=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["userPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?message=wronglogin");
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["userID"] = $uidExist["userID"];
        $_SESSION["userUid"] = $uidExist["userUid"];
        header("location: ../student/index.php");
        exit();
    }
}

function uidExistsAdmin($conn,$username,$email){
    $sql = "SELECT * FROM admins WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ./login.php?message=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginAdmin($conn,$username,$pwd){
    $uidExist = uidExistsAdmin($conn,$username,$username);

    if ($uidExist === false) {
        header("location: ./login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["password"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false){
        header("location: ./login.php?message=wronglogin");
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["username"] = $uidExist["username"];
        $_SESSION["email"] = $uidExist["email"];
        header("location: ./index.php?message=login_success");
        exit();
    }
}


function security_code_checker($code){
    if($code === 7596526){
        return true;
    }else{
        return false;
    }
}

function createAdmin($conn,$email,$username,$pwd,$security_code){
    $sql = "INSERT INTO admins (username,password,email,security_code) VALUES (?,?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../admin/register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$username,$hashedPwd,$email,$security_code);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin/login.php");
    exit();
}

function changePassword($id,$oldPassword,$newPassword)
{
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "scr");
    if (count($_POST) > 0) {
    $sql = "SELECT * FROM users WHERE userId= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $id);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    if (! empty($row)) {
        $hashedPassword = $row["userPwd"];
        $password = PASSWORD_HASH($newPassword, PASSWORD_DEFAULT);
        if (password_verify($oldPassword, $hashedPassword)) {
            $sql = "UPDATE users set userPwd=? WHERE userID=?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('si', $password, $id);
            $statement->execute();
            $message = "Password Changed";
        } else
            $message = "Current Password is not correct";
    }
}
}

?>