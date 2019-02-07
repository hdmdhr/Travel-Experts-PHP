
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
        static $i = 1;
        echo "<tr>
        <td>no.$i</td>
        <td>$v</td>
        <td><a href='$k' target='_blank'>Link</a></td>
        </tr>";
        $i++;
      }

      // for ($i=1; $i<7; $i++) {
      //   $href = "dummy/page$i.php";
      //   echo "<tr><td>cell no$i</td><td><a href=\"$href\" target=\"_blank\">to page$i</a></td></tr>";
      // }

      echo "</table>";

      include_once('php/footer.php');

     ?>
   </body>



   </html>
