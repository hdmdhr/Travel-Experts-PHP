<!-- **************************
*
* Author: PLDM Team 2
* Date: Feb. 14, 2019
* Course: CPRG 216 Project
* Description: a reusable customer register form
*
************************** -->

<?php
  if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
  }
    $oldData = array();
    if (isset($_SESSION['invalidated_post'])) {
      $errorMsg = "<p class='alert alert-danger text-center'>".$_SESSION['errorMsg']."</p>";
      $oldData = $_SESSION['invalidated_post'];
      unset($_SESSION['invalidated_post']);
      unset($_SESSION['errorMsg']);
    }
?>


  <form class="needs-validation" name="signupForm" method="post" action="customer-insert.php">
    <?php if (isset($errorMsg)) {
        echo "<h3 class='alert alert-danger text-center'>Could <em>not</em> sign up customer.</h3>";
        echo $errorMsg;
      } ?>

    <h2>Create A New Customer Account</h2>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Your last name" value="<?php if ($oldData):?><?php echo $oldData['firstName']; endif ?>" required>
        <p class="input-hint-hidden">Your first name.</p>
        <p id="errorName" style="display:none; color:red;">Please enter your full name.</p>
      </div>
      <div class="form-group col-md-6">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Your last name" value="<?php if ($oldData):?><?php echo $oldData['lastName']; endif ?>" required>
        <p class="input-hint-hidden">Your last name.</p>
        <p id="errorName" style="display:none; color:red;">Please enter your full name.</p>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Gender</label>
        <div class="radio-btns">
          <input type="radio" name="" id="male"><label for="male">Male</label>
          <input type="radio" name="" id="female"><label for="female">Female</label>
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php if ($oldData):?><?php echo $oldData['email']; endif ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}">
        <p class="input-hint-hidden">Email format: john@example.com</p>
        <p id="errorEmail" style="display:none; color:red;">Please enter your email address.</p>
      </div>
      <div class="form-group col-md-4">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" class="form-control" placeholder="Your Age" value="<?php if ($oldData):?><?php echo $oldData['age']; endif ?>" required>
        <p class="input-hint-hidden">You need to be over 18 to have our services.</p>
        <p id="errorAge" style="display:none; color:red;">You have to be above 18 to have our services.</p>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="homePhone">Home Phone</label>
        <input type="text" class="form-control" id="homePhone" name="homePhone" placeholder="123-456-7890" value="<?php if ($oldData):?><?php echo $oldData['homePhone']; endif ?>">
        <p class="input-hint-hidden">Your home phone.</p>
      </div>
      <div class="form-group col-md-6">
        <label for="busiPhone">Business Phone</label>
        <input type="text" class="form-control" id="busiPhone" name="busiPhone" placeholder="123-456-7890" value="<?php if ($oldData):?><?php echo $oldData['busiPhone']; endif ?>">
        <p class="input-hint-hidden">Your cell phone.</p>
      </div>
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" name="address" class="form-control" id="address" placeholder="123 Main St" value="<?php if ($oldData):?><?php echo $oldData['address']; endif ?>">
      <p class="input-hint-hidden">Your current mailing address, include suite number.</p>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="city">City</label>
        <input type="text" name="city" class="form-control" id="city" placeholder="Calgary" value="<?php if ($oldData):?><?php echo $oldData['city']; endif ?>">
        <p class="input-hint-hidden">City you currently live.</p>
      </div>
      <div class="form-group col-md-4">
        <label for="province">Province</label>
        <select id="province" name="province" class="form-control">
          <option selected>--Select Province--</option>
          <option>AB</option>
          <option>BC</option>
          <option>ON</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="zip">Zip</label>
        <input type="text" class="form-control" name="zip" id="zip" placeholder="T3T1O1" value="<?php if ($oldData):?><?php echo $oldData['zip']; endif ?>" pattern="[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d">
        <p class="input-hint-hidden">6 digits, no space.</p>
        <p id="errorZip" style="display:none; color:red;">Zip doesn't match the format. eg. T6J0C8.</p>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-4">
        <label for="userName">Username</label>
        <input type="text" class="form-control" id="userName" name="CustUserName" placeholder="username" value="<?php if ($oldData):?><?php echo $oldData['userName']; endif ?>" required>
        <p class="input-hint-hidden">Username used to signin.</p>
        <div class="invalid-feedback">
          Username is required.
        </div>
      </div>
      <div class="col-md-4">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="CustPassword" placeholder="password" value="">
        <p class="input-hint-hidden">Please use a strong password.</p>
        <div class="invalid-feedback">
          Password is required.
        </div>
      </div>
      <div class="col-md-4">
        <label for="pinConfirm">Password Confirm</label>
        <input type="password" class="form-control" id="pinConfirm" name="pinConfirm" placeholder="type again" value="">
        <p class="input-hint-hidden">Type password again.</p>
        <div class="invalid-feedback">
          Password doesn't match.
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-3">Prefered Spots</div>
      <div class="col-sm-9">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck1">
          <label class="form-check-label" for="gridCheck1">
            Canada
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck2">
          <label class="form-check-label" for="gridCheck2">
            The US
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck3">
          <label class="form-check-label" for="gridCheck3">
            China
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck4">
          <label class="form-check-label" for="gridCheck4">
            Japan
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="fav-city">Favourite City</label>
      <input id="fav-city" class="form-control" name="" placeholder="City Name">
      <p class="input-hint-hidden">You can use city code. For example: LA, YYC.</p>
    </div>
    <div class="form-group">
      <label for="comment">Your Comment</label>
      <textarea class="form-control" id="comment" name="" placeholder="Please leave your comment here."></textarea>
      <p class="input-hint-hidden">Ask questions, leave comments, do claims, anything you want to say.</p>
    </div>
    <div class="form-btns">
      <button type="submit" name="" class="form-btn btn btn-primary btn-lg">Signup</button>
      <button type="reset" name="resetBtn" class="form-btn btn btn-primary btn-lg">Clear</button>
    </div>
  </form>

  <div class="text-center">
    <label for="" class="mr-4 white-bg"><h5><em>Already have an account?</em></h5></label>
    <a href="customer-signin.php"><button name="" class="btn btn-success btn-lg">Signin</button></a>
  </div>
