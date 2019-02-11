<?php
/**************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: agent entry form is posted to this page, and validated here
*
**************************/

if (isset($_POST)) {
    // if any input invalid, save error and old data, send back to agent entry form
  $errorMsg = '';
  foreach ($_POST as $inputName => $inputValue) {
    if (empty($inputValue)) {
      $errorMsg .= "Need a valid <em>".$inputName.".</em><br>";
    }
  }

  if ($errorMsg) {
    session_start();
    $_SESSION['errorMsg'] = $errorMsg;
    $_SESSION['invalidated_post'] = $_POST;
    header("Location: http://localhost/CPRG-210-OSD-Assignment/new-agent.php");
  }

}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Agent Inserted Into Database</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php
  include_once('php/menu.php');

    // 1.connect database, 2.include insert func, 3.use $_POST to create obj, 4.pass obj into insert func, 5.print succeed or fail.

    $travel_experts = mysqli_connect("localhost", "admin", "P@ssw0rd", "travelexperts");
    if (!$travel_experts) {
      echo "Error number:".mysqli_connect_errno().PHP_EOL;
      echo "Error message:".mysqli_connect_error().PHP_EOL;
      exit;
    }

    include_once('php/function.php');
    include_once('php/classes.php');

    $postValueArray = array_values($_POST);

    $agentObj = new Agent(...$postValueArray);

    // ---- New: insert object into database ---
    $tableName = 'agents';
    if (insertObjIntoDBTable($agentObj, $travel_experts, $tableName)) {
      echo "<h2>Great! Agent <em>".$_POST['AgtFirstName']."</em>'s info was inserted into table <em>$tableName</em>.";
    } else {
      echo "<h2>Couldn't insert agent information.";
    }
    // create a button to go back to agent entry page
    echo "<a href='new-agent.php' ><button class='btn btn-outline-secondary ml-4'>Go Back</button></a></h2>";


  /*  ---- Old: insert array into database ----

    if (insertArrayIntoDBTable($_POST, $travel_experts, $tableName)) {
      echo "<h2>Agent <em>".$_POST['AgtFirstName']."</em>'s info was successfully inserted into database table <em>$tableName</em>.";

      // succeed, apeend a message to logs.txt
      $text = "".$_POST['AgtFirstName']." ".$_POST['AgtLastName']."'s information was added at ".date('l jS \of F Y h:i:s A').".";
      $myfile = file_put_contents('logs.txt', $text.PHP_EOL , FILE_APPEND | LOCK_EX);
    } else {
      echo "<h2>Sorry, couldn't insert agent information.";
    }
      // Create a button to go back
    <a href='new-agent.php' ><button class='btn btn-outline-secondary ml-4'>Go Back</button></a></h2>
*/

 ?>

</body>
</html>
