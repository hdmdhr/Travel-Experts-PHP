<?php
 include_once("php/function.php");
 $packages = GetPackage();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Package</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
<header>
<h1>
Please select your travelling ticket 
</h1>
</header>
  <section>
  <table class="table package-table">
  <?php

  $array1=array( "img/Australia.jpg",
  "img/Norway.jpg",
  "img/Canada.jpg",
  "img/Japan.jpg",
  "img/China.jpg"
);
      $i = 0;
      foreach ($packages as $pack) {
      print("<tr>");
      print("<td>". $pack->getId() ."</td>");
      print("<td>". $pack->getPkName() ."</td>");
      print("<td>". $pack->getPkStartDate() ."</td>");
      print("<td>". $pack->getPkEndDate() ."</td>");
      print("<td>". $pack->getPkDesc() ."</td>");
      print("<td>". $pack->getPkBasePrice() ."</td>");

      print("<td><img src=".$array1[$i]." class='packageImg'></td>");
      print("<td><a href='booking.php'><button class='btn btn-primary'>Order Now!</button></button>");
      $i++;
      print("</tr>");

      }

      

  ?>
  </table>
</section>

<?php
  require_once('php/footer.php');
 ?>


</body>

</html>