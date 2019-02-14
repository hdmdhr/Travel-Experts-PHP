<?php
/*****************************************
 * 
 * Author: Liming Hong 
 * Date: February 13, 2019 
 * Purpose: This is the add package list for travel Agency website  
 * 
 ****************************************/ 

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

<?php
    require_once('php/header.php')
   ?>
<h1 class= "h1 package_head">
Please select your travelling ticket
</h1>

  <section>
  <table class="table package-table">
  <?php

  $array1=array(
    "img/Australia.jpg",
    "img/Norway.jpg",
    "img/Canada.jpg",
    "img/Japan.jpg",
    "img/China.jpg"
);
print("<tr>"); 
      print("<td class='tdpackage'>Package ID</td>");
      print("<td class='tdpackage'>Place to visit</td>");
      print("<td class='tdpackage'>Start Date</td>");
      print("<td class='tdpackage'>End Date</td>");
      print("<td class='tdpackage'>Description</td>");
      print("<td class='tdpackage'>Price</td>");
      print("<td class='packageImg''>Local scenery</td>");
      print("<td class='tdpackage'>Click to Order!</td>");
      
      print("</tr>"); 
      $i = 0;
      foreach ($packages as $pack) {
        $id = $pack->getId();
        $name = $pack->getPkName();
        $sDate = $pack->getPkStartDate();
        $eDate =$pack->getPkEndDate();
        $des=$pack->getPkDesc();
        $price=$pack->getPkBasePrice();
      
      
      print("<tr>");
      print("<td class='tdpackage'>". $id ."</td>");
      print("<td class='tdpackage'>". $name ."</td>");
      print("<td class='tdpackage'>". $sDate ."</td>");
      print("<td class='tdpackage'>".  $eDate ."</td>");
      print("<td class='tdpackage'>". $des ."</td>");
      print("<td class='tdpackage'>$". $price ."</td>");

      print("<td class='packageImg'><img src=".$array1[$i]." class='packageImg'></td>");
      print("<td><a href='booking.php? id=$id&name=$name&sDate=$sDate&eDate=$eDate&des=$des&price=$price' alt='picture'><button class='btn btn-primary'>Order Now!</button></button>");
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
