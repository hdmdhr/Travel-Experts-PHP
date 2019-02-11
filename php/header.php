<!-- **************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: html body header include welcome message and navigation menu
*
************************** -->

<header>

  <div class="logo-line">
    <a href="index.php" target="_blank">
      <img src="img/balloon.png" alt="Logo" class="logo">
    </a>
    <h1 class="big-title">WELCOME TO TRAVEL EXPERTS</h1>
  </div>

  <div class="welcome-banner">
    <?php
      if(session_id() == '' || !isset($_SESSION)) {
          session_start();
      }

    // --- Send regards according to the current time ---
        date_default_timezone_set("Canada/Mountain");
        $hour = localtime()[2];  // 24 hour unit
        $time = substr(date('h:i'), 0, 5);  // 12 hour unit
        echo "<h3>It's $time ".date('A').", ";
        if ($hour < 12){
          echo "<img src='img/avatar.gif' class='mx-2'>Good Morning ";
        } elseif ($hour >= 12 && $hour < 17) {
          echo "<img src='img/balloon.png' class='mx-2'>Good Afternoon ";
        } elseif ($hour >= 17) {
          echo "<img src='img/home.png' class='mx-2'>Good Evening ";
        }
        // TODO: if logged in, say the name in session['user-id']
        if (isset($_SESSION['user-id'])) {
          echo "Agent <em>".$_SESSION['user-id']."</em>.<a href='logout.php' ><button class='btn btn-outline-secondary ml-4'>Logout</button></a></h3>";
        } else {
          echo "Friend.<a href='login.php' ><button class='btn btn-outline-primary ml-4'>Login</button></a></h3>";
        }
       ?>
  </div>

  <nav class="nav-bar row">
        <div class="nav-tab home col-sm-6 col-md-4 col-lg-2">
          <a href="index.php" target="_blank"><img src="img/home.png" alt="Home">Home</a>
        </div>
        <div class="nav-tab contact col-sm-6 col-md-4 col-lg-2">
          <a href="contact.php" target="_blank"><img src="img/contacts.png" alt="Contact Us">Contact Us</a>
        </div>
        <div class="nav-tab register col-sm-6 col-md-4 col-lg-2">
          <a href="register.php" target="_blank"><img src="img/register.png" alt="Register Now">Register</a>
        </div>
        <div class="nav-tab spots col-sm-6 col-md-4 col-lg-2">
          <a href="spots.php" target="_blank"><img src="img/chillies.png" alt="hot spots">Famous Spots</a>
        </div>
        <div class="nav-tab add-agent col-sm-6 col-md-4 col-lg-2">
          <a href="new-agent.php" target="_blank"><img src="img/add.png" alt="fun">Add Agent</a>
        </div>
        <div class="nav-tab links col-sm-6 col-md-4 col-lg-2">
          <a href="links.php" target="_blank"><img src="img/computer.png" alt="tech">Links</a>
        </div>
  </nav>

</header>
