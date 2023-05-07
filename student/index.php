<?php

session_start();

?>
<?php include '../inc/checker.php'; ?>
<?php

require '../inc/db.php';

if (isset($_GET['file'])) {
  $_SESSION['scode'] = "";
  $_SESSION['filename'] = "";
  $_SESSION['input'] = "";
  $_SESSION["final_output"] = "";
  $_SESSION['fname'] = "";
} else {
  if (isset($_GET['filename'])) {
    $fname = $_GET['filename'];
    $result = mysqli_query($conn, "SELECT * FROM `user_files` WHERE `id` = '$fname'");
    $row = mysqli_fetch_array($result);
    $status = 1;
  } elseif (isset($_SESSION['fname'])) {
    $fname = $_SESSION['fname'];
    $result = mysqli_query($conn, "SELECT * FROM `user_files` WHERE `name` = '$fname'");
    $row = mysqli_fetch_array($result);
    $status = 1;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Compiler</title>
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">


            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Online Compiler</h5>
                  <h6 id="java_note" class=""></h6>


                  <div class="col d-flex">
                    <select id="languages" onchange="changeLanguage()" class="form-select" aria-label="Default select example">
                      <option selected value="50">C</option>
                      <option value="52">C++</option>
                      <option value="68">PHP</option>
                      <option value="62">Java</option>
                      <option value="71">Python</option>
                    </select>
                  </div>


                  <!-- Line Chart -->

                  <div style="margin:20px"></div>

                  <div class="editor" id="editor" style="height:60vh;font-size: 24px;"><?php if (isset($row["source_code"])) {
                                                                                          echo $row["source_code"];
                                                                                        } ?></div>

                  <!-- <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 550,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script> -->
                  <!-- End Line Chart -->

                </div>

                <div class="card-body">
                  <h5 class="card-title">Code Operations</h5>

                  <button type="button" onclick="executeCode()" class="btn btn-success">Execute Code </button>

                  <button type="button" onclick="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">Save Code </button>

                  <button type="button" onclick="switchTheme()" data-bs-toggle="modal" data-bs-target="#assignModal" class="btn btn-secondary">Submit as an Assignment</button>

                  <div class="modal fade" id="basicModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Save Code</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="row mb-3">
                              <label for="inputText" id="formfilename" class="col-sm-4 col-form-label">File Name</label>
                              <div class="col-sm-8">
                                <input type="text" id="filename" name="filename" class="form-control">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label class="col-sm-4 col-form-label">Language</label>
                              <div class="col-sm-8">
                                <select name="lang" id="formlang" class="form-select" aria-label="Default select example">
                                  <option selected value="50">C</option>
                                  <option value="52">C++</option>
                                  <option value="68">PHP</option>
                                  <option value="62">Java</option>
                                  <option value="71">Python</option>
                                </select>
                              </div>
                            </div>
                            <!-- <div class="row mb-3">
                              <label class="col-sm-4 col-form-label">Code</label>
                              <div class="col-sm-8">
                                <textarea id="formcode" class="form-control" style="height: 100px"></textarea>
                              </div>
                            </div> -->
                            <div class="row mb-3">
                              <label class="col-sm-4 col-form-label">Submit Button</label>
                              <div class="col-sm-8">
                                <button type="submit" onclick="saveCode()" class="btn btn-primary">Submit Form</button>
                              </div>
                            </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="modal fade" id="assignModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Submit Assignment</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form>

                            <div class="row mb-3">
                              <label for="inputText" id="formfilename" class="col-sm-4 col-form-label">File Name</label>
                              <div class="col-sm-8">
                                <input type="text" id="filename_assign" name="filename" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-4 col-form-label">Assignment Name</label>
                              <div class="col-sm-8">
                                <select name="assigned_course" id="assignment_name" class="form-select" aria-label="Default select example">
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

                                  $id = $_SESSION["userID"];

                                  $assign_query = "SELECT * FROM `users` WHERE `userID` = '$id'";

                                  $assign_result = $conn->query($assign_query);

                                  $ass_row = $assign_result->fetch_assoc();

                                  $course = $ass_row["assigned_course"];

                                  $query_file = "SELECT * FROM `assignments` WHERE `assigned_course` = '$course'";

                                  $result_file = $conn->query($query_file);

                                  if ($result_file->num_rows > 0) {
                                    while ($row = $result_file->fetch_assoc()) {

                                      echo "<option value='" . $row['assignment_name'] . "'>" . $row['assignment_name'] . "</option>";
                                    }
                                  }
                                  ?>

                                </select>
                              </div>

                            </div>

                            <div class="row mb-3">
                              <label class="col-sm-4 col-form-label">Language</label>
                              <div class="col-sm-8">
                                <select name="lang" id="formlang" class="form-select" aria-label="Default select example">
                                  <option selected value="50">C</option>
                                  <option value="52">C++</option>
                                  <option value="68">PHP</option>
                                  <option value="62">Java</option>
                                  <option value="71">Python</option>
                                </select>
                              </div>
                            </div>
                            <!-- <div class="row mb-3">
                              <label class="col-sm-4 col-form-label">Code</label>
                              <div class="col-sm-8">
                                <textarea id="formcode" class="form-control" style="height: 100px"></textarea>
                              </div>
                            </div> -->
                            <div class="row mb-3">
                              <label class="col-sm-4 col-form-label">Submit Button</label>
                              <div class="col-sm-8">
                                <button type="submit" onclick="submitAssignment()" class="btn btn-primary">Submit Form</button>
                              </div>
                            </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
              </div>



            </div><!-- End Reports -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Input</h5>
              <div class="input"></div>
              <textarea name="ip" style="height:20vh;width:100%;color:white;background-color:darkslategray" id="textip"></textarea>
            </div>
          </div><!-- End Default Card -->
          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Output</h5>
              <div class="output" style="height:50vh;color:white;background-color:darkslategray;padding:20px" id="output">

              </div>
            </div>
          </div><!-- End Default Card -->

        </div><!-- End Right side columns -->

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

  <!-- Template Main JS File -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="../assets/js/main.js"></script>



  <script src="../assets/ace/ace.js"></script>
  <script src="../assets/ace/theme-monokai.js"></script>
  <script src="../assets/ace/theme-github.js"></script>
  <script src="../assets/ace/ext-language_tools.js"></script>
  <script src="../assets/js/ide.js"></script>

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

    let editor;

    window.onload = function() {
      ace.require("ace/ext/language_tools");
      editor = ace.edit("editor");
      editor.setTheme("ace/theme/monokai");
      editor.session.setMode("ace/mode/c_cpp");
      editor.setOptions({
        enableSnippets: true,
        enableLiveAutocompletion: true,
        enableBasicAutocompletion: true,
      });
    };

    function changeLanguage() {
      let language = $("#languages").val();

      if (language == "50" || language == "50") {
        editor.session.setMode("ace/mode/c_cpp");
        document.getElementById("java_note").innerHTML = "";
      } else if (language == "68") {
        editor.session.setMode("ace/mode/php");
        document.getElementById("java_note").innerHTML = "";
      } else if (language == "71") {
        editor.session.setMode("ace/mode/python");
        document.getElementById("java_note").innerHTML = "";
      } else if (language == "62") {
        editor.session.setMode("ace/mode/java");
        document.getElementById("java_note").innerHTML = "Note : While Running Java Code write the main function in \"Main\" Class";
      }
    }
  </script>

</body>

</html>