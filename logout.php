<?php
  session_start();

  unset($_SESSION['user-id']);

  header("Location: http://localhost/CPRG-210-OSD-Assignment/login.php");
 ?>
