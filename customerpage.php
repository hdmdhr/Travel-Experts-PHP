<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}

$userID= $_SESSION['user-id'];
$dbh= new mySqli("localhost", "admin"l "agent","travelexperts.php");;


$result = $

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



<?php


?>
    
</body>
</html>