<?php
/**************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: login page, before log user in, check login try times, check if user id and password match
*
**************************/

if(session_id() == '' || !isset($_SESSION)) {
    session_start();  // if session isn't start, start it
}

  if ($_POST) {

    // ---- Check if user reached maximum try times(5) per hour ----

    function checkTryTimes($tryTimes) {
      // check try times to show corresponding message
      if ($tryTimes >= 5) {
        echo "<h1 class='alert alert-danger'>You've reached the maximum try times, please try an hour later.</h1>";
        exit;
      } else {
        echo "<h2 class='alert alert-danger'>You've tried ".$tryTimes." times, ".(5 - $tryTimes)." times left.</h2>";
      }
    }

    if (!isset($_SESSION['try-times']) || time() - $_SESSION['try-times']['time'] > 3600) {
      // if session doesn't exist or expired, create a new one, check try times
      $_SESSION['try-times'] = array('try' => 1, 'time' => time() );
      checkTryTimes($_SESSION['try-times']['try']);
    } else {
      // session exist less than 1 hour, check try times
      $_SESSION['try-times']['try'] += 1;
      checkTryTimes($_SESSION['try-times']['try']);
    }


    // ---- Read users-info.txt and convert to hashtable ----

    $userPinArray = array();
    foreach (file('users-info.txt') as $line) {  // file() return a num array
      list($userId,$password) = explode(",",trim($line));
      $userPinArray += [$userId => $password];  // $userPinArray is (userId => pin), use it to validate login
    }

    // ---- Test if user-id and password match ----

    $userId = $_POST['UserId'];
    if (array_key_exists($userId,$userPinArray)) {
      // user-id match, check password
      if ($_POST['Password'] === $userPinArray[$userId]) {
        // password match, save user-id into a session, head to agent entry page
        $_SESSION['user-id'] = $_POST['UserId'];
        header("Location: http://localhost/CPRG-210-OSD-Assignment/new-agent.php");
      } else { $errorMsg = "<h4 class='alert alert-danger'>Password or User ID do NOT match.</h4>"; }
    } else { $errorMsg = "<h4 class='alert alert-danger'>User ID or Password do NOT match.</h4>"; }
  }

 ?>

<!doctype html>
<html lang="en">

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

<body class="text-center">
  <?php include_once('php/header.php') ?>

  <form class="form-signin mt-5" method="post" action="#">
    <?php
      if (isset($errorMsg)) {
        echo $errorMsg;
      }
     ?>
    <a href="index.php" target="_blank">
      <img class="mb-2" src="img/balloon.png" alt="logo" width="72" height="72">
    </a>
    <h1 class="h3 mb-3 font-weight-normal">Please Log In</h1>
    <div class="signin-section mb-3">
      <label for="user-id">User ID</label>
      <input type="text" id="user-id" class="form-control" name="UserId" placeholder="Your user id or email" required autofocus>
    </div>
    <div class="signin-section mb-3">
      <label for="inputPassword">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required>
    </div>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="rememberMe" value="rememberMe"> Remember me
      </label>
    </div>
    <input type="hidden" name="tries" value="1">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
  </form>
</body>

<?php include_once('php/footer.php') ?>

</html>
