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

  <title>Users / Profile - SCRYPTN Bootstrap Template</title>
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

      $id = $_SESSION["adminID"];

      $query = "SELECT * FROM `admins` WHERE id = $id";

      $result = $conn->query($query);

      $data = $result->fetch_assoc();

      ?>


      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="../inc/user-data/profile-photos/<?php if($data["admin_photo"]){echo $data["admin_photo"];}else{echo "default.jpg";};?>" alt="Profile" class="rounded-circle" />
              <h2><?php echo $data["admin_name"]; ?></h2>
              <h3><?php echo $data["admin_desc"]; ?></h3>
              <div class="social-links mt-2">
                <a href="<?php echo $data["admin_tw"]; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $data["admin_gh"]; ?>" class="github"><i class="bi bi-github"></i></a>
                <a href="<?php echo $data["admin_in"]; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $data["admin_ln"]; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                    Edit Profile
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                    Change Password
                  </button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">
                    <?php echo $data["admin_desc"];?>
                  </p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data["admin_name"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">
                    <?php echo $data["admin_addr"];?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data["admin_phone"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">
                    <?php echo $data["email"];?>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form action="../inc/profile_handler.php" method="post"  enctype="multipart/form-data" >
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="row mb-3">
                          <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                          <div class="col-sm-10">
                            <input name="image" class="form-control" type="file" id="image">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div hidden class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">ID</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userID" type="number" class="form-control" id="userID" value="<?php echo $id?>" />
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fname" type="text" class="form-control" id="fname" value="<?php echo $data["admin_name"];?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userUid" type="text" class="form-control" id="userUid" value="<?php echo $data["username"];?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="user_desc" class="form-control" id="user_desc" style="height: 100px"><?php echo $data["admin_desc"];?></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userAddr" type="text" class="form-control" id="userAddr" value="<?php echo $data["admin_addr"];?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userPhone" type="number" class="form-control" id="userPhone" value="<?php echo $data["admin_phone"];?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userEmail" type="email" class="form-control" id="userEmail" value="<?php echo $data["email"];?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Github Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_gh" type="text" class="form-control" id="user_gh" value="<?php echo $data["admin_gh"];?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_tw" type="text" class="form-control" id="user_tw" value="<?php echo $data["admin_tw"];?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_in" type="text" class="form-control" id="user_in" value="<?php echo $data["admin_in"];?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_ln" type="text" class="form-control" id="user_ln" value="<?php echo $data["admin_ln"];?>" />
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="adminsubmit" class="btn btn-primary">
                        Save Changes
                      </button>
                    </div>
                  </form>
                  <!-- End Profile Edit Form -->
                </div>

                

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="../inc/changepass.php" method="POST">

                  <div hidden class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">ID</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userID" type="number" class="form-control" id="userID" value="<?php echo $id?>" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="oldpass" type="password" class="form-control" id="currentPassword" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpass" type="password" class="form-control" id="newPassword" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpass" type="password" class="form-control" id="renewPassword" />
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-primary">
                        Change Password
                      </button>
                    </div>
                  </form>
                  <!-- End Change Password Form -->
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