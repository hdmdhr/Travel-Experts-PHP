<!-- **************************
*
* Author: PLDM Team 2
* Date: Feb. 14, 2019
* Course: CPRG 216 Project
* Description: html element navigation menu
*
************************** -->

<nav class="nav-bar row">

  <div class="nav-tab home col-sm-6 col-md-4 col-lg-2">
    <a href="index.php" target="_blank"><img src="img/home.png" alt="Home">Home</a>
  </div>

  <div class="nav-tab contact col-sm-6 col-md-4 col-lg-2">
    <a href="contact.php" target="_blank"><img src="img/contacts.png" alt="Contact Us">Contact Us</a>
  </div>

  <div class="nav-tab spots col-sm-6 col-md-4 col-lg-2">
    <a href="package.php" target="_blank"><img src="img/package.png" alt="Packages">Packages</a>
  </div>

  <div class="nav-tab dropdown col-sm-6 col-md-4 col-lg-2" id="customer-tab">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/customer.png" alt="Register">Customer</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="customer-signup.php">Signup</a>
      <a class="dropdown-item" href="customer-signin.php">Signin</a>
      <a class="dropdown-item" href="contact.php">Call Us</a>
      <!-- <div class="dropdown-divider"></div> -->
    </div>
  </div>

  <div class="nav-tab dropdown col-sm-6 col-md-4 col-lg-2" id="agent-tab">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/agent.png" alt="Register">Agent</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="login.php">Login</a>
      <a class="dropdown-item" href="new-agent.php">Add New Agent</a>
      <a class="dropdown-item" href="spots.php">Agent Manual</a>
    </div>
  </div>

  <div class="nav-tab links col-sm-6 col-md-4 col-lg-2">
    <a href="links.php" target="_blank"><img src="img/computer.png" alt="tech">Links</a>
  </div>

</nav>
