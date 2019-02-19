<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}

$dbh= new mySqli("localhost", "admin","P@ssw0rd","travelexperts"); // change the password

$dta= mysqli_query($dbh,"SELECT * FROM customers");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Agent Login</title>

  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">

  <style>
  .recomend{
    position: relative;
    margin-bottom: 20px;
  }

  .imgcaption{
    position: absolute;
    top: 8px;
    right:50%;
  }

  </style>


</head>
<body>


<?php


  $columnNames = array("CustomerId", "CustFirstName", "CustLastName",
   "CustAddress", "CustCity", "CustProv", "CustPostal", "CustCountry", "CustHomePhone",
   "CustBusPhone", "CustEmail", "AgentId");


  $customerId="104"; //this should be equal to userId gotten from login page

  $_SESSION['user-id']=$customerId;

  while ($row = mysqli_fetch_array($dta, MYSQLI_ASSOC))
  {
    if ($row['CustomerId']== $customerId)
    {
      $fname=$row[$columnNames[1]];
      $lname=$row[$columnNames[2]];
      $address=$row[$columnNames[3]];
      $city=$row[$columnNames[4]];
      $provience=$row[$columnNames[5]];
      $postal=$row[$columnNames[6]];
      $country=$row[$columnNames[7]];
      $homephone=$row[$columnNames[8]];
      $busphone=$row[$columnNames[9]];
      $email=$row[$columnNames[10]];
      $agentid= $row[$columnNames[11]];
    }

  };

  include_once('php/header.php');
?>

  <h1>Your Account</h1>
  <h3> Our Recomendation </h3>

  <div >
    <?php
        include_once('recommend.php');
        $imgarray= array("img/Australia.jpg", "img/Norway.jpg", "img/Canada.jpg", "img/Japan.jpg","img/China.jpg");
        $discrip = array("Travel Australia", "Travel Norway", "Travel Canada","Travel Japan", "Travel China");
        $nn=$var;
        $n=$var2;

        //recomend package

        echo "<div class='recomend'><a href='http://localhost/PLDM-Team-2/package.php'><img src='$imgarray[$nn]' width='500px'></a>";
        echo "<p class='imgcaption'>$discrip[$nn]</p></div>";

        echo "<div class='recomend'><a href='http://localhost/PLDM-Team-2/package.php'><img src='$imgarray[$n]' width='500px'></a>";
        echo "<p class='imgcaption'>$discrip[$n]</p></div>";
    ?>

  </div>


</body>
</html>
