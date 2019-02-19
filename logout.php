<?php
/**************************
*
* Author: PLDM Team 2
* Date: Feb. 14, 2019
* Course: CPRG 216 Project
* Description: logout user, return to home page.
*
**************************/
  session_start();

  unset($_SESSION['loggedin-id-fn']);

  header("Location: http://localhost/PLDM-Team-2/index.php");
 ?>
