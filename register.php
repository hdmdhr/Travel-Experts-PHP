<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

  <?php
    require_once('php/header.php');
   ?>


  <article>
    <form action="bouncer.php" name="registerForm">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
          <p class="input-hint-hidden">Your first name and last name.</p>
          <p id="errorName" style="display:none; color:red;">Please enter your full name.</p>
        </div>
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}">
          <p class="input-hint-hidden">Email format: john@example.com</p>
          <p id="errorEmail" style="display:none; color:red;">Please enter your email address.</p>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Gender</label>
          <div class="radio-btns">
            <input type="radio" name="gender" id="male"><label for="male">Male</label>
            <input type="radio" name="gender" id="female"><label for="female">Female</label>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="age">Age</label>
          <input type="number" name="age" id="age" class="form-control" placeholder="Your Age" required>
          <p class="input-hint-hidden">You need to be over 18 to have our services.</p>
          <p id="errorAge" style="display:none; color:red;">You have to be above 18 to have our services.</p>
        </div>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="123 Main St">
        <p class="input-hint-hidden">Your current mailing address, include suite number.</p>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="city">City</label>
          <input type="text" class="form-control" id="city" placeholder="Calgary">
          <p class="input-hint-hidden">City you currently live.</p>
        </div>
        <div class="form-group col-md-4">
          <label for="province">Province</label>
          <select id="province" class="form-control">
            <option selected>--Select Province--</option>
            <option>AB</option>
            <option>BC</option>
            <option>ON</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="zip">Zip</label>
          <input type="text" class="form-control" name="zip" id="zip" placeholder="T3T1O1" pattern="[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d">
          <p class="input-hint-hidden">6 digits zip code without space.</p>
          <p id="errorZip" style="display:none; color:red;">Zip doesn't match the format. eg. T6J0C8.</p>
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
        <input id="fav-city" class="form-control" name="favCity" placeholder="City Name" minlength="2">
        <p class="input-hint-hidden">You can use city code. For example: LA, YYC.</p>
      </div>
      <div class="form-group">
        <label for="comment">Your Comment</label>
        <textarea class="form-control" id="comment" placeholder="Please leave your comment here."></textarea>
        <p class="input-hint-hidden">You can ask questions, give your advices, do claims, basically anything you want to say to us.</p>
      </div>
      <div class="form-btns">
        <button type="submit" name="submitBtn" class="form-btn btn btn-primary btn-lg">Submit</button>
        <button type="reset" name="resetBtn" class="form-btn btn btn-primary btn-lg">Reset</button>
      </div>
    </form>
  </article>


  <hr>

  <footer>
    <p class="copyright">&copy; DongMing Hu 2019</p>
    <p class="company">&reg; Little Bit Everything 2018-2019</p>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="script.js" charset="utf-8"></script>
</body>

</html>
