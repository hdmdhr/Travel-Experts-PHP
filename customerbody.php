<?php

/****************************
*
This page is created by Paru
*
****************************/

if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
//the codes below can have a seperate php for easy usage in multiple pages
include_once('php/function.php');
$dbh= ConnectDB();

$sql= "SELECT * FROM customers";
$dta= mysqli_query($dbh,$sql);
$columnNames = array("CustomerId", "CustFirstName", "CustLastName",
 "CustAddress", "CustCity", "CustProv", "CustPostal", "CustCountry", "CustHomePhone",
 "CustBusPhone", "CustEmail", "AgentId");

 $customerId= $_SESSION['loggedin-id-fn'][1];

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
//till here------------
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Purchase History</title>

  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">

  <style>
      table{
          margin-top: 20px;
          margin-right: auto;
          margin-left: auto;
          width:33.33%;
          border:2px solid black;
      }

      </style>


</head>
<body>
  <?php
    include_once('php/header.php');
   ?>

   <h1>Your Account Infomation</h1>
   <h2>Your Booking History</h2>

    <table class="mb-5 table">
        <?php
        echo "<tr>";
        echo "<th> Package Type </th>";
        echo "<th> Agent Id </th>";
        echo "</tr>";

        $sql= "SELECT GROUP_CONCAT(CustomerId), Count(*)CustomerId
         FROM purchases
         WHERE CustomerId='106'
         Group by 'CustomerId'";

        $dtap=mysqli_query($dbh, "SELECT * FROM purchases");

        $discrip = array("Travel Australia", "Travel Norway", "Travel Canada","Travel Japan", "Travel China");
        while ($row= mysqli_fetch_array($dtap, MYSQLI_ASSOC))
        {
            if ($row['CustomerId']==$customerId)
            {
                $cusId= $row['CustomerId'];
                $pkgId= $row['PackageId']-1;
                $agtId= $row['AgentId'];

                for ($i=0; $i< 1; $i++)
                {
                    echo "<tr>";
                    echo "<td>$discrip[$pkgId]</td>";
                    echo "<td>$agtId</td>";
                    echo "</tr>";
                }
            }
        }
        ?>

    </table>

    <h2>You may also want to check these packages!</h2>

    <?php
        include_once('recommend.php');
        $imgarray= array("img/Australia.jpg", "img/Norway.jpg", "img/Canada.jpg", "img/Japan.jpg","img/China.jpg");
        $discrip = array("Travel Australia", "Travel Norway", "Travel Canada","Travel Japan", "Travel China");

        $nn=$recval-1;
        if ($nn==0 || $recval==5)
        {
            $n=1;
        }else{
            $n=$recval;
        }
        

        // echo $imgarray[$nn];
        //recomend package

        echo "<div class='recomend'><a href='http://localhost/PLDM-Team-2/package.php'><img src='$imgarray[$nn]' width='500px'></a>";
        echo "<p class='imgcaption'>$discrip[$nn]</p></div>";
        echo "<div class='recomend'><a href='http://localhost/PLDM-Team-2/package.php'><img src='$imgarray[$n]' width='500px'></a>";
        echo "<p class='imgcaption'>$discrip[$n]</p></div>";

        include_once('php/footer.php');
    ?>

</body>
</html>
