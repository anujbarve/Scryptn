<?php

session_start();

?>
<?php include '../inc/adminChecker.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    
  </style>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Users / Profile - SCRYPTN </title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon" />
  <link href="../assets/img/apple-touch-icon.jpg" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->

  <?php include './includes/header.php'; ?>

  <!-- ======= Sidebar ======= -->

  <?php include './includes/sidenav.php'; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
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

      $id = $_GET["id"];

      $query = "SELECT * FROM `users` WHERE userID = $id";

      $result = $conn->query($query);

      $data = $result->fetch_assoc();

      ?>


      <div class="row">

      <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="../inc/user-data/profile-photos/<?php if($data["user_photo"]){echo $data["user_photo"];}else{echo "default.jpg";};?>" alt="Profile" class="rounded-circle" />
              <h2><?php echo $data["userName"]; ?></h2>
              <h3><?php echo $data["user_desc"]; ?></h3>
              <div class="social-links mt-2">
                <a href="<?php echo $data["user_tw"]; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $data["user_gh"]; ?>" class="github"><i class="bi bi-github"></i></a>
                <a href="<?php echo $data["user_in"]; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $data["user_ln"]; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                    Overview
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-files">
                    Files
                  </button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <?php

                $uid = $data["userUid"];

                $query_file = "SELECT * FROM `user_files` WHERE `user_name` = '$uid'";

                $result_file = $conn->query($query_file);
                ?>
                <div class="tab-pane fade show pt-3" id="user-files">
                  <!-- Dark Table -->
                  <table class="table table-light">
                    <thead>
                      <tr>
                        <th scope="col">Icon</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Date Created</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      if ($result_file->num_rows > 0) {
                        // OUTPUT DATA OF EACH ROW
                        while ($row = $result_file->fetch_assoc()) {
                          echo "<tr>";
                          echo "<th scope='row'>" . $row['extension'] . "</th>";
                          echo "<td>" . $row['name'] . "</td>";
                          echo "<td>" . $row['time_stamp'] . "</td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "0 results";
                      }

                      ?>

                    </tbody>
                  </table>
                  <!-- End Dark Table -->
                </div>


                <div class="tab-pane fade show profile-overview active pt-3" id="profile-overview">
                  <!-- Profile Edit Form -->

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">ID</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $id?>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                       <?php echo $data["userName"];?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["userUid"];?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["user_desc"];?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["userAddr"];?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["userPhone"];?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["userEmail"];?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Github Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["user_gh"];?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["user_tw"];?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["user_in"];?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <?php echo $data["user_ln"];?>
                      </div>
                    </div>
                  <!-- End Profile Edit Form -->
                </div>
              </div>
              <!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
      <?php

      $conn->close();

      ?>
    </section>
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">

    </div>
  </footer>
  <!-- End Footer -->

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

  <script>
    $.ajax({
      url: "./profile.php",
      method: "GET",
      data: {
        lang: $("#formlang").val(),
        scode: editor.getSession().getValue(),
        filename: $("formfilename").val(),
      },
      success: function(response) {
        $(".output").html(response);
      },
    });
  </script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>