<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}

<<<<<<< HEAD
$dbh= new mySqli("localhost", "admin","lol666","travelexperts"); // change the password 
=======
$userID= $_SESSION['user-id'];
$dbh= new mySqli("localhost", "admin", "agent","travelexperts.php");
>>>>>>> c196be0c4bbd710eb667f2d587999f4773d54d05

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

 echo "<h1 class='big-title'>WELCOME BACK</h1>". "<br>";
 echo "<h1 class='big-title'> $fname  $lname</h1>";


 
?>



</header>

<nav class="nav-bar row">
        <div class="nav-tab home col-sm-4 col-md-2">
          <a href="index.php" target="_blank"><img src="img/home.png" alt="Home">Home</a>
        </div>
        <div class="nav-tab contact col-sm-4 col-md-2">
          <a href="contact.php" target="_blank"><img src="img/contacts.png" alt="Contact Us">Contact Us</a>
        </div>
        <div class="nav-tab register col-sm-4 col-md-2">
          <a href="register.php" target="_blank"><img src="img/register.png" alt="Register Now">Booking</a>
        </div>
        <div class="nav-tab spots col-sm-4 col-md-2">
          <a href="customerbody.php" target="_blank"><img src="img/chillies.png" alt="hot spots">Past Purchases</a>
        </div>
       
        <div class="nav-tab links col-sm-4 col-md-2">
          <a href="links.php" target="_blank"><img src="img/computer.png" alt="tech">Links</a>
        </div>
  </nav>


</body>
</html>