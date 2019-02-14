<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}

//the codes below can have a seperate php for easy usage in multiple pages
$dbh= new mySqli("localhost", "admin","lol666","travelexperts"); // change the password 

$sql= "SELECT * FROM customers";
$dta= mysqli_query($dbh,$sql);




$columnNames = array("CustomerId", "CustFirstName", "CustLastName",
 "CustAddress", "CustCity", "CustProv", "CustPostal", "CustCountry", "CustHomePhone",
 "CustBusPhone", "CustEmail", "AgentId");


 $customerId= $_SESSION['user-id'];
 echo $customerId;

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
  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">

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
    <header>

        <div class="welcome-banner">

            <?php
                

                // --- Send regards according to the current time ---
                    date_default_timezone_set("Canada/Mountain");
                    $hour = localtime()[2];  // 24 hour unit
                    $time = substr(date('h:i'), 0, 5);  // 12 hour unit
                    echo "<h3>It's $time ".date('A').", ";
                    if ($hour < 12){
                    echo "<img src='img/avatar.gif' class='mx-2'>Good Morning";
                    } elseif ($hour >= 12 && $hour < 17) {
                    echo "<img src='img/balloon.png' class='mx-2'>Good Afternoon";
                    } elseif ($hour >= 17) {
                    echo "<img src='img/home.png' class='mx-2'>Good Evening";
                    }
                
            ?>
        </div>

         <?php 
                

                echo "<h1 class='big-title'>Your Previous Purchases</h1>". "<br>";
                echo "<h1 class='big-title'> $fname  $lname</h1>";

         ?>
         <nav class="nav-bar row">

            <div class="nav-tab home col-sm-4 col-md-2">
            <a href="index.php" ><img src="img/home.png" alt="Home">Home</a>
            </div>

        </nav>  

    </header>


    <table>
        <?php

        echo "<tr>";
        echo "<th> Package Type </th>";
        echo "<th> Agent Id </th>";
        echo "</tr>";

   
        $customerId= $_SESSION['user-id'];

        $sql= "SELECT GROUP_CONCAT(CustomerId), Count(*)CustomerId 
         FROM purchases 
         WHERE CustomerId='106' 
         Group by 'CustomerId'";
         

        $dtap=mysqli_query($dbh, "SELECT * FROM purchases");
        
        // mysqli_fetch_array($dtp, MYSQLI_ASSOC)
        // $rows = mysqli_fetch_assoc($dtp);
        // $rowcount= $rows['ttlrow'];

      
        while ($row= mysqli_fetch_array($dtap, MYSQLI_ASSOC))
        {            
            if ($row['CustomerId']==$customerId)
            {
                
                
                $cusId= $row['CustomerId'];
                $pkgId= $row['PackageId'];
                $agtId= $row['AgentId'];
             
                
                for ($i=0; $i< 1; $i++)
                {
                    echo "<tr>";
                    echo "<td>$pkgId</td>";
                    echo "<td>$agtId</td>";
                    echo "</tr>";
                    

                }
            }
        }

        ?>



    </table>

         
</body>
</html>