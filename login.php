<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}

// if (!isset($_COOKIE['login-session'])) {
//   setcookie('login-session', $_SESSION['user-id'], time()+3600*5);
// }

  // --- Reading users-info.txt and convert to hashtable ---
  // TODO: read from database agent table instead
  $array = array();
  foreach (file('users-info.txt') as $line) {  // file() generate a num array
    list($userId,$password) = explode(",",trim($line));
    $array += [$userId => $password];  // array is (userId => pin), use to validate login
  }
  print_r($array);

  if ($_POST) {
    print_r($_POST);
    $_POST['tries']++;
    $_SESSION['try-times'] = $_POST['tries'];  // save try times to a session
    if ($_SESSION['try-times'] >= 5) {
      echo "<h2>You've reached the maximum try times, try 5 hours later.</h2>";
    }

    $ID = $_POST['UserId'];
    if (array_key_exists($ID,$array)) {  // user-id match
      if ($_POST['Password'] === $array[$ID]) {  // pin match
        // save user-id to session, head to agent entry page
        $_SESSION['user-id'] = $_POST['UserId'];
        header("Location: http://localhost/CPRG-210-OSD-Assignment/new-agent.php");
      } else { echo "<h2 class='alert alert-danger' role='alert'>Password or User ID do NOT match.</h2>"; }
    } else { echo "<h2 class='alert alert-danger' role='alert'>User ID or Password do NOT match.</h2>"; }
  } else { echo "No post received."; }

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
    <a href="index.php" target="_blank">
      <img class="mb-2" src="img/balloon.png" alt="logo" width="72" height="72">
    </a>
    <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>
    <label for="user-id" class="sr-only">User ID</label>
    <input type="text" id="user-id" class="form-control" name="UserId" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="rememberMe" value="rememberMe"> Remember me
      </label>
    </div>
    <input type="hidden" name="tries" value="0">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
  </form>
</body>

<?php include_once('php/footer.php') ?>

</html>
