<?php
/*----------------------
*
* Author: PLDM Team 2
* Date: Feb. 14, 2019
* Course: CPRG 216 Project
* Description: check for popular packages
*
*------------------------*/



// if(session_id() == '' || !isset($_SESSION)) {
//     session_start();
// }

//the codes below can have a seperate php for easy usage in multiple pages
include_once('php/function.php');
$dbh= ConnectDB();
$dta= mySqli_query($dbh,"SELECT *FROM customers");

// $dtap= mySqli_query($dbh, "SELECT")

$columnNames = array("CustomerId", "CustFirstName", "CustLastName",
 "CustAddress", "CustCity", "CustProv", "CustPostal", "CustCountry", "CustHomePhone",
 "CustBusPhone", "CustEmail", "AgentId","Password", "PackageId");


//$customerId= $_SESSION['user-id'];


$customerId="106"; ////change this
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
    // $pw=$row[$columnNames[12]];
    $pkgtyp=$row[$columnNames[13]];

    //counting for popular package

    $dtaa= mySqli_query($dbh,"SELECT Packageid, COUNT(*)c
     FROM customers
     WHERE PackageId='1'");

    $dta2= mySqli_query($dbh,"SELECT Packageid, COUNT(*)c
    FROM customers
    WHERE PackageId='2'");

    $dta3= mySqli_query($dbh,"SELECT Packageid, COUNT(*)c
    FROM customers
    WHERE PackageId='3'");

    $dta4= mySqli_query($dbh,"SELECT Packageid, COUNT(*)c
    FROM customers
    WHERE PackageId='4'");

    $dta5= mySqli_query($dbh,"SELECT Packageid, COUNT(*)c
    FROM customers
    WHERE PackageId='5'");

    //looping and counting for popular package types


    while($all=mysqli_fetch_array($dtaa,MYSQLI_NUM))
    {
      $recommend1= $all[1];

    }

    while($all=mysqli_fetch_array($dta2,MYSQLI_NUM))
    {
      $recommend2= $all[1];

    }

    while($all=mysqli_fetch_array($dta3,MYSQLI_NUM))
    {
      $recommend3= $all[1];

    }
    while($all=mysqli_fetch_array($dta4,MYSQLI_NUM))
    {
      $recommend4= $all[1];

    }
    while($all=mysqli_fetch_array($dta5,MYSQLI_NUM))
    {
      $recommend5= $all[1];

    }

    $pkcary= array ($recommend1, $recommend2, $recommend3, $recommend4, $recommend5);

  }



};

$var= max ($pkcary);
$secrec= array_diff($pkcary, array($var));
$var2= max ($secrec);







?>
