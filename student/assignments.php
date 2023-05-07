<?php

session_start();

?>
<?php include '../inc/checker.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - SCRYPTN Bootstrap Template</title>
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
      <h1>Assignments To Do</h1>
    </div><!-- End Page Title -->

    <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Assignments</h5>
                            <p>Here you can see all the available assignments create and curated by teachers</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date Assigned</th>
                                        <!-- <th scope="col">Operations</th> -->
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

                                    $id = $_SESSION["userID"];

                                    $assign_query = "SELECT * FROM `users` WHERE `userID` = '$id'";

                                    $assign_result = $conn->query($assign_query);

                                    $ass_row = $assign_result->fetch_assoc();

                                    $course = $ass_row["assigned_course"];

                                    $query_file = "SELECT * FROM `assignments` WHERE `assigned_course` = '$course'";

                                    $result_file = $conn->query($query_file);

                                    if ($result_file->num_rows > 0) {
                                        while ($row = $result_file->fetch_assoc()) {



                                            echo "<tr>";
                                            echo "<th scope='row'>" . $row['id'] . "</th>";
                                            echo "<td>" . $row['assignment_name'] . "</td>";
                                            echo "<td>" . $row['assignment_desc'] . "</td>";
                                            echo "<td>" . $row['assignment_date'] . "</td>";
                                            // echo "<td><a href='./delete_assign.php?id=" . $row['id'] . "'><button type='button' class='btn btn-success'><i class='bi bi-tick'></i></button></a></td>";
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


    <div class="pagetitle">
      <h1>Completed Assignments</h1>
    </div><!-- End Page Title -->

    <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Assignments</h5>
                            <p>Here you can see all the available assignments create and curated by teachers</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">File Name</th>
                                        <th scope="col">Assignment</th>
                                        <th scope="col">Date Completed</th>
                                        <!-- <th scope="col">Operations</th> -->
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

                                    $id = $_SESSION["userUid"];

                                    $query_file = "SELECT * FROM `completed_assignments` WHERE `user` = '$id'";

                                    $result_file = $conn->query($query_file);

                                    if ($result_file->num_rows > 0) {
                                        while ($row = $result_file->fetch_assoc()) {



                                            echo "<tr>";
                                            echo "<th scope='row'>" . $row['id'] . "</th>";
                                            echo "<td>" . $row['filename'] . "</td>";
                                            echo "<td>" . $row['assignment_name'] . "</td>";
                                            echo "<td>" . $row['completed_time'] . "</td>";
                                            // echo "<td><a href='./delete_assign.php?id=" . $row['id'] . "'><button type='button' class='btn btn-success'><i class='bi bi-tick'></i></button></a></td>";
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