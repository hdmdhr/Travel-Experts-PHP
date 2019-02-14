<!-- **************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: home page of Travel Experts website
*
************************** -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Travel Experts</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div class="veil">
  <?php
    require_once('php/header.php')
   ?>


  <div class="gallery row">
    <div class="picture-box col-md-4 col-lg-2">
      <img src="img/Australia.jpg" alt="Australia Landscape">
      <p class="caption">Australia Landscape</p>
    </div>
    <div class="picture-box col-md-4 col-lg-2">
      <img src="img/Norway.jpg" alt="Norway Landscape">
      <p class="caption">Norway Forest</p>
    </div>
    <div class="picture-box col-md-4 col-lg-2">
      <p class="caption">Canadian Mountains</p>
      <img src="img/Canada.jpg" alt="Canada Landscape">
    </div>
    <div class="picture-box col-md-6 col-lg-2">
      <p class="caption">Japanese Temple</p>
      <img src="img/Japan.jpg" alt="Canada Landscape">
    </div>
    <div class="picture-box col-md-6 col-lg-2">
      <p class="caption">China Valley</p>
      <img src="img/China.jpg" alt="Canada Landscape">
    </div>
  </div>


  <aside class="side-bar">
    <ul>
      <a href="">
        <li>See Gallery</li>
      </a>
      <a href="">
        <li>Register Now</li>
      </a>
      <a href="">
        <li>Contact Us</li>
      </a>
    </ul>
  </aside>



  <div id="carousel" class="carousel slide hide" data-ride="carousel" data-interval="3000">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0"></li>
      <li data-target="#carousel" data-slide-to="1" class="active"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
      <li data-target="#carousel" data-slide-to="3"></li>
      <li data-target="#carousel" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item">
        <img src="img/Australia.jpg" class="d-block w-50" alt="...">
        <div class="carousel-caption d-none d-md-inline-block">
          <h5>Australia</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
      <div class="carousel-item active">
        <img src="img/Norway.jpg" class="d-block w-50" alt="...">
        <div class="carousel-caption d-none d-md-inline-block">
          <h5>Norway</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/Canada.jpg" class="d-block w-50" alt="...">
        <div class="carousel-caption d-none d-md-inline-block">
          <h5>Rocky Mountain</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/Japan.jpg" class="d-block w-50" alt="...">
        <div class="carousel-caption d-none d-md-inline-block">
          <h5>Japanese Temple</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/China.jpg" class="d-block w-50" alt="...">
        <div class="carousel-caption d-none d-md-inline-block">
          <h5>China ZhangJiaJie</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>



  <article id="form" class="hide" style="display:none;">
    <?php include_once('php/register-form.php'); ?>
  </article>


  <table id="table" class="table hide" style="display:none;">
    <thead>
      <tr>
        <th colspan="4">Contact List</th>
      </tr>
    </thead>
    <tr>
      <th>Region</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Agent</th>
    </tr>
    <tr>
      <th>Asia</th>
      <td>asia@travel.com</td>
      <td>111000111</td>
      <td>Tanaka</td>
    </tr>
    <tr>
      <th>North America</th>
      <td>namerica@travel.com</td>
      <td>222000222</td>
      <td>Clare</td>
    </tr>
    <tr>
      <th>Europe</th>
      <td>eu@travel.com</td>
      <td>333000333</td>
      <td>Vector</td>
    </tr>
    <tr>
      <th>China</th>
      <td>cn@travel.com</td>
      <td>444000444</td>
      <td>Mei</td>
    </tr>
  </table>

<?php
  require_once('php/footer.php');
 ?>

</div>
</body>

</html>
