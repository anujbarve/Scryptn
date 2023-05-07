<?php

require_once './inc/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = mysqli_real_escape_string($conn, $_POST['message']);


if (isset($_POST['submit'])) {
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";

  if ($conn->query($sql) === TRUE) {
    header("location: index.php?message=query_success");
  } else {
    header("location: index.php?message=query_failed");
  }

  $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SCRYPTN - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="home/assets/img/favicon.png" rel="icon">
  <link href="home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="home/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="home/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="home/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="" alt="">
        <span>SCRYPTN</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">SCRYPTN</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">The Ultimate Online Compiler and Assignment Submission System</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="home/assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Who We Are</h2>
              <p>
                At SCRYPTN, we understand that programming can be a challenging task, and sometimes, you need a little extra help to get your assignments done on time. That's why we've created a comprehensive online platform that offers both an online compiler and an assignment submission system.

                Our online compiler provides you with a seamless coding experience by enabling you to write, compile, and run code on a single platform, without the need for additional software installations. With support for multiple programming languages such as Python, Java, C++, and more, you can write code effortlessly and quickly.
              </p>
              <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="home/assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <p>Core Features</p>
        </header>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="home/assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Online Compiler </h3>
              <p>SCRYPTN offers an online compiler that enables users to write, compile, and run code on a single platform, without the need for any additional software installations. The online compiler supports multiple programming languages, including Python, Java, C++, and more.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="home/assets/img/values-2.png" class="img-fluid" alt="">
              <h3>Assignment Submission System</h3>
              <p>SCRYPTN's assignment submission system allows students to submit their programming assignments quickly and easily. The submission system is user-friendly and secure, ensuring that students can submit their assignments on time and without any hassle.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="home/assets/img/values-3.png" class="img-fluid" alt="">
              <h3>User-Friendly Interface</h3>
              <p>SCRYPTN's platform is designed to be user-friendly, reliable, and easy to use. The interface is intuitive, making it the ideal choice for students, beginners, and experts alike. With SCRYPTN, users can focus on coding and not on navigating a complicated platform.</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

    <!-- ======= Counts Section ======= -->
    <!-- <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Students</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-headset" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>End Counts Section -->


    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </header>

        <div class="row">
          <div class="col-lg-6">
            <!-- F.A.Q List 1-->
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    What programming languages are supported by SCRYPTN's online compiler?
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    SCRYPTN's online compiler supports multiple programming languages, including Python, Java, C++, JavaScript, and more.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    Can I submit my programming assignments on SCRYPTN?
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Yes, SCRYPTN has an assignment submission system that allows students to submit their programming assignments quickly and easily
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    Is SCRYPTN's submission system secure?
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Yes, SCRYPTN's submission system is designed to be secure, ensuring that students can submit their assignments without any risk of unauthorized access or data breaches.
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-6">

            <!-- F.A.Q List 2-->
            <div class="accordion accordion-flush" id="faqlist2">

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                    Do I need to download any software to use SCRYPTN?
                  </button>
                </h2>
                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    No, you do not need to download any software to use SCRYPTN's online compiler or assignment submission system. Simply log in to our platform and start coding!
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                    Is SCRYPTN's platform user-friendly?
                  </button>
                </h2>
                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Yes, SCRYPTN's platform is designed to be user-friendly, making it an ideal choice for students, beginners, and experts alike.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                    Can I use SCRYPTN for free?
                  </button>
                </h2>
                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Yes, SCRYPTN offers a free plan that includes access to our online compiler and assignment submission system.
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- End F.A.Q Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Team</h2>
          <p>Our hard working team</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="./assets/img/anuj.jpeg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://twitter.com/BarveAnuj"><i class="bi bi-twitter"></i></a>
                  <a href="tel:9604345549"><i class="bi bi-phone"></i></a>
                  <a href="https://www.instagram.com/anuj_barve/"><i class="bi bi-instagram"></i></a>
                  <a href="https://in.linkedin.com/in/anuj-barve-838b9b162"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Anuj Barve</h4>
                <span>Lead Developer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="./assets/img/dhiraj.jpeg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dhiraj Yadav</h4>
                <span>Team Leader</span>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="./inc/user-data/profile-photos/default.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Pratik Rahane</h4>
                <span>Team Member</span>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="./assets/img/om.jpeg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Om Thorat</h4>
                <span>Team Member</span>
              </div>
            </div>
          </div>



          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="./inc/user-data/profile-photos/default.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Swarali Surve</h4>
                <span>Team Member</span>

              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="./assets/img/ishwari.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ishwari Yadav</h4>
                <span>Team Member</span>

              </div>
            </div>
          </div>


        </div>

      </div>

    </section><!-- End Team Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p> MET BKC IOE<br>
                    Adgaon, Nashik<br>
                    Maharastra</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+91 1234567890
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@scryptn.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Contact Form</h5>

                <!-- Vertical Form -->
                <form action="" method="POST" class="row g-3">
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Your Name</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Subject</label>
                    <input type="text" class="form-control" name="subject">
                  </div>
                  <div class="col-12">
                    <label for="inputAddress" class="form-label">Message</label>
                    <input type="text" class="form-control" id="inputAddress" name="message">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form><!-- Vertical Form -->

              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="" alt="">
              <span>SCRYPTN</span>
            </a>
            <p>The Ultimate Online Compiler and Assignment Submission System</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="./teacher/login.php">Teacher Login</a></li>
            </ul>
          </div>


          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              MET BKC IOE<br>
              Adgaon, Nashik<br>
              Maharastra<br><br>
              <strong>Phone:</strong> +91 1234567890<br>
              <strong>Email:</strong> info@scryptn.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SCRYPTN 2023</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="home/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="home/assets/vendor/aos/aos.js"></script>
  <script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="home/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="home/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="home/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="home/assets/js/main.js"></script>

</body>

</html>