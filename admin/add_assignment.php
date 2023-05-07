<?php

session_start();

?>
<?php include '../inc/adminChecker.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - SCRYPTN Bootstrap Template</title>
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
            <h1>Add Assignment</h1>
        </div><!-- End Page Title -->

        <div class="card mb-3">

            <div class="card-body">

                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Add A Assignment</h5>
                    <p class="text-center small">Enter the details to add a new Assignment</p>
                </div>

                <form action="../inc/create_assign.php" method="POST" class="row g-3 needs-validation">
                    <div class="col-12">
                        <label for="yourName" class="form-label">Assignment Name</label>
                        <input type="text" name="assignment_name" class="form-control" id="yourName" required>
                        <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                        <label for="yourName" class="form-label">Assignment Description</label>
                        <textarea type="text" name="assignment_desc" class="form-control" id="yourName" required></textarea>
                    </div>

                    <div class="col-12">
                        <label for="yourEmail" class="form-label">Assigned Course</label>
                        <select name="assigned_course" class="form-select" aria-label="Default select example">
                            <option selected="">Open this select menu</option>
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

                            $query_file = "SELECT * FROM `courses`";

                            $time = time();

                            $result_file = $conn->query($query_file);

                            if ($result_file->num_rows > 0) {
                                while ($row = $result_file->fetch_assoc()) {

                                    echo "<option value='" . $row['id'] . "'>" . $row['course_name'] . "</option>";
                                }
                            }
                            ?>

                        </select>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" name="create">Create Course</button>
                    </div>
                </form>

            </div>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SCRYPTN</span></strong>. All Rights Reserved
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

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>