<?php

session_start();

?>
<?php include '../inc/teacherChecker.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - SCRYPTN </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->

    <?php include './includes/header.php'; ?>

    <!-- ======= Sidebar ======= -->

    <?php include './includes/sidenav.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Registered Students</h1>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Students</h5>
                            <p>Welcome to the registered students page! Here, you can view a list of all students who have successfully enrolled for the course/program/event. The table below displays basic information about each student, such as their name, phone, and current status.</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Current Status</th>
                                        <th scope="col">Last Login</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php


                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $databasename = "scr";

                                    $conn = new mysqli(
                                        $servername,
                                        $username,
                                        $password,
                                        $databasename
                                    );

                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    $id = $_SESSION["teacherID"];

                                    $assign_query = "SELECT * FROM `teachers` WHERE `teacherID` = $id";
                                    
                                    $assign_result = $conn->query($assign_query);

                                    $ass_row = $assign_result->fetch_assoc();

                                    $course = $ass_row["assigned_course"];

                                    $query_file = "SELECT * FROM `users` WHERE `assigned_course` = $course";

                                    $time = time();

                                    $result_file = $conn->query($query_file);

                                    if ($result_file->num_rows > 0) {
                                        while ($row = $result_file->fetch_assoc()) {

                                            $date = date('d/m/Y', $row['last_login']);

                                            $status = 'Offline';

                                            if ($row['last_login'] > $time) {
                                                $status = 'Online';
                                                $class = 'bg-success';
                                            } else {
                                                $status = 'Offline';
                                                $class = 'bg-secondary';
                                            }

                                            echo "<tr>";
                                            echo "<th scope='row'>" . $row['userID'] . "</th>";
                                            echo "<td>" . $row['userName'] . "</td>";
                                            echo "<td>" . $row['userPhone'] . "</td>";
                                            echo "<td><span class='badge rounded-pill $class'>" . $status . "</span></td>";
                                            echo "<td>" . $date . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SCRYPTN</span></strong>. All Rights Reserved <?php echo $row_assign["assigned_course"]; ?>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script>
        function updateUserStatus() {
            jQuery.ajax({
                url: 'update_user_status.php',
                success: function() {

                }
            })
        }

        setInterval(function() {
            updateUserStatus();
        }, 10000);
    </script>

</body>

</html>