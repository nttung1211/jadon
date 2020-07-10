</head>

<body>
  <div class="d-flex page-wrapper">
    <div class="side-bar">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a href="index.php" class="brand">Jadon</a>
  
            <ul class="list-group" id="accordionExample">
              <li class="list-group-item <?php echo $currentPage === 'index.php' ? 'active' : '' ?>"><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
              <li class="list-group-item <?php echo $currentPage === 'services.php' ? 'active' : '' ?>"><a href="services.php"><i class="fas fa-cogs"></i>Services</a></li>
              <li class="list-group-item <?php echo $currentPage === 'our-work.php' ? 'active' : '' ?>"><a href="our-work.php"><i class="fas fa-images"></i>Our work</a></li>
              <li class="list-group-item <?php echo $currentPage === 'catering.php' ? 'active' : '' ?>"><a href="catering.php"><i class="fas fa-utensils"></i>Catering</a></li>
              <li class="list-group-item <?php echo $currentPage === 'our-team.php' ? 'active' : '' ?>"><a href="our-team.php"><i class="fas fa-users"></i>Our Team</a></li>
              <li class="list-group-item <?php echo $currentPage === 'email-us.php' ? 'active' : '' ?>"><a href="email-us.php"><i class="fas fa-envelope"></i>email us</a></li>
              <?php
              if (isset($_SESSION['jadon_loggedIn']) && $_SESSION['jadon_loggedIn']['level'] === 'admin') {
                $active = $currentPage === 'managers.php' ? 'active' : '';
                echo "
                  <li id='managersBtn' class='list-group-item $active'><a href='managers.php'><i class='fas fa-users-cog'></i>Managers</a></li>
                ";
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="main">
      <nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container">
          <i class="fas fa-chevron-right side-bar-toggler"></i>

          <div class="navbar-collapse">
            <ul class="navbar-nav ml-auto flex-row justify-content-end">
              <li class="nav-item mx-3">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt px-2"></i>Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>