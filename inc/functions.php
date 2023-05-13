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
    header("location: ../register.php?message=user_created_successfully");
    exit();
}


function createTeacher($conn,$name,$email,$username,$pwd){
    $sql = "INSERT INTO teachers (teacherName,teacherEmail,teacherUid,teacherPwd) VALUES (?,?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../teacher/register.php?message=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../teacher/register.php?message=user_created_successfully");
    exit();
}

function createTeacherByAdmin($conn,$name,$email,$username,$pwd){
    $sql = "INSERT INTO teachers (teacherName,teacherEmail,teacherUid,teacherPwd) VALUES (?,?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../admin/manage_teachers.php?message=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin/manage_teachers.php?message=user_created_successfully");
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
    header("location: ../admin/manage_students.php?message=none");
    exit();
}

function createCourseByAdmin($conn,$cname,$cteacher)
{
    $sql = "INSERT INTO courses (course_name,course_teacher) VALUES (?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../admin/add_course.php?message=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$cname,$cteacher);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin/manage_courses.php?message=none");
    exit();
}

function createAssignmentByTeacher($conn,$aname,$adesc,$acourse)
{
    $sql = "INSERT INTO assignments (assignment_name,assignment_desc,assigned_course) VALUES (?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../teacher/add_assignment.php?message=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$aname,$adesc,$acourse);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../teacher/add_assignment.php?message=none");
    exit();
}

function createAssignmentByAdmin($conn,$aname,$adesc,$acourse)
{
    $sql = "INSERT INTO assignments (assignment_name,assignment_desc,assigned_course) VALUES (?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../admin/add_assignment.php?message=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sss",$aname,$adesc,$acourse);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin/add_assignment.php?message=none");
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

function loginTeacher($conn,$username,$pwd){
    $uidExist = uidExistsTeacher($conn,$username,$username);

    if ($uidExist === false) {
        header("location: ../teacher/login.php?message=uid_doesnt_exist");
        exit();
    }

    $pwdHashed = $uidExist["teacherPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false){
        header("location: ../teacher/login.php?message=wronglogin");
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["teacherID"] = $uidExist["teacherID"];
        $_SESSION["teacherUid"] = $uidExist["teacherUid"];
        header("location: ../teacher/index.php");
        exit();
    }
}

function uidExistsTeacher($conn,$username,$email){
    $sql = "SELECT * FROM teachers WHERE teacherUid = ? OR teacherEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../teacher/login.php?message=stmtfailed");
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
        header("location: ../admin/login.php?message=wronglogin");
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["adminID"] = $uidExist["id"];
        $_SESSION["adminUsername"] = $uidExist["username"];
        $_SESSION["adminEmail"] = $uidExist["email"];
        header("location: ../admin/index.php?message=login_success");
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
            header("location: ../login.php?password_changed_successfully");
        } else
            $message = "Current Password is not correct";
    }
}
}

function changePasswordTeacher($id,$oldPassword,$newPassword)
{
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "scr");
    if (count($_POST) > 0) {
    $sql = "SELECT * FROM teachers WHERE teacherID= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $id);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    if (! empty($row)) {
        $hashedPassword = $row["teacherPwd"];
        $password = PASSWORD_HASH($newPassword, PASSWORD_DEFAULT);
        if (password_verify($oldPassword, $hashedPassword)) {
            $sql = "UPDATE teachers set teacherPwd=? WHERE teacherID=?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('si', $password, $id);
            $statement->execute();
            header("location: ../teacher/login.php?password_changed_successfully");
        } else
            $message = "Current Password is not correct";
    }
}
}

function changePasswordAdmin($id,$oldPassword,$newPassword)
{
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "scr");
    if (count($_POST) > 0) {
    $sql = "SELECT * FROM admins WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $id);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    if (! empty($row)) {
        $hashedPassword = $row["password"];
        $password = PASSWORD_HASH($newPassword, PASSWORD_DEFAULT);
        if (password_verify($oldPassword, $hashedPassword)) {
            $sql = "UPDATE admins set password=? WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('si', $password, $id);
            $statement->execute();
            header("location: ../admin/login.php?password_changed_successfully");
        } else
            $message = "Current Password is not correct";
    }
}
}

?>