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
<h1 class= "h1 package_head">Choose Your Favourite Travel Package!</h1>

  <table class="table package-table">

  <?php

  $array1=array(
    "img/Australia.jpg",
    "img/Norway.jpg",
    "img/Canada.jpg",
    "img/Japan.jpg",
    "img/China.jpg"
);

      print("<thead><tr>");
      print("<th class='tdpackage'>Package ID</th>");
      print("<th class='tdpackage'>Package Name</th>");
      print("<th class='tdpackage'>Start Date</th>");
      print("<th class='tdpackage'>End Date</th>");
      print("<th class='tdpackage'>Description</th>");
      print("<th class='tdpackage'>Price</th>");
      print("<th class='packageImg''>Local scenery</th>");
      print("<th class='tdpackage'>Order</th>");
      print("</tr></thead>");

      $i = 0;
      foreach ($packages as $pack) {
        $id = $pack->getId();
        $name = $pack->getPkName();
        $sDate = $pack->getPkStartDate();
        $eDate =$pack->getPkEndDate();
        $des = $pack->getPkDesc();
        $price = $pack->getPkBasePrice();

        print("<tr>");
        print("<td class='tdpackage'>". $id ."</td>");
        print("<td class='tdpackage'>". $name ."</td>");
        print("<td class='tdpackage'>". $sDate ."</td>");
        print("<td class='tdpackage'>".  $eDate ."</td>");
        print("<td class='tdpackage'>". $des ."</td>");
        print("<td class='tdpackage'>$". $price ."</td>");
        print("<td class='packageImg'><img src=".$array1[$i]." class='packageImg' alt='picture'></td>");

        if(session_id() == '' || !isset($_SESSION)) {
          session_start();  // if session isn't start, start session
        }

        if (isset($_SESSION['loggedin-id-fn'])) {
          // if there is already a signed in user, click button to booking page
          print("<td><a href='booking.php?id=$id&name=$name&sDate=$sDate&eDate=$eDate&des=$des&price=$price'>");
        } else {
          // if no signed in user, click button to signin page
          print("<td><a href='customer-signin.php?alert=Please sign in first before continue.'>");
        }

        print("<button class='btn btn-primary'>BOOK NOW!</button></a></td></tr>");

        $i++;
      }

  ?>
  </table>

<?php
  require_once('php/footer.php');
 ?>


</body>

</html>
