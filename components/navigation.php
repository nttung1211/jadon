</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm position-sticky">
    <div class="container">
      <a class="navbar-brand" href="index.php">Jadon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item px-2 <?php echo $currentPage === 'index.php' ? 'active' : '' ?>">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item px-2 dropdown <?php echo $currentPage === 'services.php' ? 'active' : '' ?>">
            <a class="nav-link dropdown-toggle" href="services.php">
              Services
            </a>
            <div class="dropdown-menu">
              <?php
              $rows = $db->getData("SELECT * FROM service_categories;");
              if ($rows !== 0) {
                foreach ($rows as $row) {
                  echo "
                    <a class='dropdown-item text-capitalize' href='services.php?category_id=$row[id]'>$row[name]</a>
                  ";
                }
              }
              ?>
            </div>
          </li>
          <li class="nav-item px-2 <?php echo $currentPage === 'catery.php' ? 'active' : '' ?>">
            <a class="nav-link" href="catery.php">Catery</a>
          </li>
          <li class="nav-item px-2 <?php echo $currentPage === 'our-work.php' ? 'active' : '' ?>">
            <a class="nav-link" href="our-work.php">Our work</a>
          </li>
          <li class="nav-item px-2 <?php echo $currentPage === 'our-team.php' ? 'active' : '' ?>">
            <a class="nav-link" href="our-team.php">Our team</a>
          </li>
          <li class="nav-item px-2 <?php echo $currentPage === 'email-us.php' ? 'active' : '' ?>">
            <a class="nav-link" href="email-us.php">Email us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>