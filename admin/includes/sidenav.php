<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Online Compiler</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#courses-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Manage Courses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="courses-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./manage_courses.php">
              <i class="bi bi-circle"></i><span>All Courses</span>
            </a>
          </li>
          <li>
            <a href="./add_course.php">
              <i class="bi bi-circle"></i><span>Add Course</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#teachers-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-account-circle-fill"></i><span>Manage Teachers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="teachers-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./manage_teachers.php">
              <i class="bi bi-circle"></i><span>All Teachers</span>
            </a>
          </li>
          <li>
            <a href="./add_teacher.php">
              <i class="bi bi-circle"></i><span>Add Teacher</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#assignments-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-account-circle-fill"></i><span>Manage Assignments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="assignments-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./manage_assignments.php">
              <i class="bi bi-circle"></i><span>All Assignments</span>
            </a>
          </li>
          <li>
            <a href="./completed_assignments.php">
              <i class="bi bi-circle"></i><span>Completed Assignments</span>
            </a>
          </li>
          <li>
            <a href="./add_assignment.php">
              <i class="bi bi-circle"></i><span>Add Assignment</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#students-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-account-circle-fill"></i><span>Manage Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="students-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./manage_students.php">
              <i class="bi bi-circle"></i><span>All Students</span>
            </a>
          </li>
          <li>
            <a href="./add_student.php">
              <i class="bi bi-circle"></i><span>Add Student</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="queries.php">
          <i class="bi bi-envelope"></i>
          <span>Queries By Students</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../index.php#about">
          <i class="bx bxs-info-square"></i>
          <span>About Us</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../inc/logout.php">
          <i class="bx bx-exit"></i>
          <span>Log Out</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->