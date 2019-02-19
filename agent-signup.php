<?php
/**************************
*
* Author: PLDM Team 2
* Date: Feb. 14, 2019
* Course: CPRG 216 Project
* Description: agent entry page whcih requires a agent login to view
*
* Author of this page: DongMing Hu
**************************/

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

if (!isset($_SESSION['loggedin-id-fn'])) {
  // if there isn't login session, head to agent login page
  header("Location: http://localhost/PLDM-Team-2/agent-login.php?alert=Please login to continue.");
} else {
  if ($_SESSION['loggedin-id-fn'][0]==='Customer') {
    // if there is login session, but user is a customer, head to home page with alert message
    header("Location: http://localhost/PLDM-Team-2/index.php?alert=You don't have authorization for that.");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add New Agent</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

  <?php
  include_once('php/header.php');

  // check if there is error message and invalidated data, if yes, save into new var
  $oldData = array();
  if (isset($_SESSION['invalidated_post'])) {
    $errorMsg = "<p class='alert alert-danger text-center'>".$_SESSION['errorMsg']."</p>";
    $oldData = $_SESSION['invalidated_post'];
    unset($_SESSION['invalidated_post']);
    unset($_SESSION['errorMsg']);
  }

 ?>

  <form class="needs-validation" method="post" action="agent-insert.php">
    <?php if (isset($errorMsg)) {
        // show error message about reasons of invalidation
        echo "<h4 class='alert alert-danger text-center'>Could <em>not</em> complete due to following issues.</h4>";
        echo $errorMsg;
      } ?>

    <h2>Enter a New Agent</h2>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="firstName">First name</label>
        <!-- if have saved old value from last submission, show it, otherwise, no value -->
        <input type="text" class="form-control" id="firstName" name="AgtFirstName" placeholder="First Name" value="<?php if ($oldData):?><?php echo $oldData['AgtFirstName']; endif ?>" autofocus required>
        <div class="invalid-feedback">
          Valid first name is required.
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <label for="lastName">Last name</label>
        <input type="text" class="form-control" id="lastName" name="AgtLastName" placeholder="Last Name" value="<?php if ($oldData):?><?php echo $oldData['AgtLastName']; endif ?>">
        <div class="invalid-feedback">
          Valid last name is required.
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" id="phone" name="AgtBusPhone" placeholder="(123)456-7890" pattern="\([0-9]{3}\)[0-9]{3}-[0-9]{4}" value="<?php if ($oldData):?><?php echo $oldData['AgtBusPhone']; endif ?>">
      <div class="invalid-feedback">
        Please enter a valid phone number.
      </div>
    </div>

    <div class="mb-3">
      <label for="email">Email <span class="text-muted"></span></label>
      <input type="email" class="form-control" id="email" name="AgtEmail" placeholder="you@example.com" value="<?php if ($oldData):?> <?php echo $oldData['AgtEmail']; endif ?>">
      <div class="invalid-feedback">
        Please enter a valid email address.
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="position">Position</label>
        <select class="custom-select d-block w-100" id="position" name="AgtPosition">
          <option value="">--- Choose ---</option>
          <option value="Junior Agent">Junior Agent</option>
          <option value="Intermediate Agent">Intermediate Agent</option>
          <option value="Senior Agent">Senior Agent</option>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label for="agency">From Agency</label>
        <select class="custom-select d-block w-100" id="agency" name="AgencyId">
          <option value="">--- Choose ---</option>
          <option value="1">Agency 1</option>
          <option value="2">Agency 2</option>
        </select>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-4">
        <label for="userName">Username</label>
        <input type="text" class="form-control" id="userName" name="AgtUserName" placeholder="username" value="<?php if ($oldData):?><?php echo $oldData['AgtUserName']; endif ?>" required>
        <div class="invalid-feedback">
          User name is required.
        </div>
      </div>
      <div class="col-md-4">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="AgtPassword" placeholder="password" value="" required>
        <div class="invalid-feedback">
          Password is required.
        </div>
      </div>
      <div class="col-md-4">
        <label for="pinConfirm">Password Confirm</label>
        <input type="password" class="form-control" id="pinConfirm" name="pinConfirm" placeholder="type again" value="">
        <div class="invalid-feedback">
          Password doesn't match.
        </div>
      </div>
    </div>

    <button class="btn btn-primary btn-lg btn-block" type="submit">Enter New Agent</button>
  </form>

<?php
  include_once('php/footer.php');
 ?>

</body>
