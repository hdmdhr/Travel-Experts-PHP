<!-- **************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: page with links to external websites.
*
************************** -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Links</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

  </head>
  <body>

    <?php
      require_once('php/header.php');
      require_once('php/var.php');

      echo "<table class='table'>";

      foreach ($var as $k => $v) {
        echo "<tr>
        <td><p>$v</p></td>
        <td><a href='$k' target='_blank'><p>Go</p></a></td>
        </tr>";
      }

      echo "</table>";

      include_once('php/footer.php');
     ?>
   </body>



   </html>
