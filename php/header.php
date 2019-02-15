<!-- **************************
*
* Author: PLDM Team 2
* Date: Feb. 14, 2019
* Course: CPRG 216 Project
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
          session_start();  // if session isn't start, start it
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
        // TODO: if logged in, say the name in session['loggedin-agentId-fn']
        if (isset($_SESSION['loggedin-id-fn'])) {
          echo "Dear ".$_SESSION['loggedin-id-fn'][0]." <em>".$_SESSION['loggedin-id-fn'][2]."</em>.<a href='logout.php' ><button class='btn btn-outline-secondary ml-4'>Logout</button></a></h3>";
        } else {
          echo "Friend.<a href='customer-signin.php'><button class='btn btn-outline-primary ml-4'>Login</button></a></h3>";
        }
       ?>
  </div>

  <?php
    include_once("php/menu.php");
  ?>

</header>
