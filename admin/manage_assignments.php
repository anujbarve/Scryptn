<?php

session_start();

?>
<?php include '../inc/adminChecker.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - SCRYPTN Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
            <h1>Manage Courses</h1>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Courses</h5>
                            <p>Here you can see all the available course create and curated by teachers</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Assigned Course ID</th>
                                        <th scope="col">Date Assigned</th>
                                        <th scope="col">Operations</th>
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

                                    $query_file = "SELECT * FROM `assignments`";

                                    $result_file = $conn->query($query_file);

                                    if ($result_file->num_rows > 0) {
                                        while ($row = $result_file->fetch_assoc()) {



                                            echo "<tr>";
                                            echo "<th scope='row'>" . $row['id'] . "</th>";
                                            echo "<td>" . $row['assignment_name'] . "</td>";
                                            echo "<td>" . $row['assigned_course'] . "</td>";
                                            echo "<td>" . $row['assignment_date'] . "</td>";
                                            echo "<td><a href='../inc/delete_assign.php?id=" . $row['id'] . "'><button type='button' class='btn btn-danger'><i class='bi bi-trash'></i></button></a></td>";
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>


</body>

</html>