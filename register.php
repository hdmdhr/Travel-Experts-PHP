<!-- **************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: register page for customers
*
************************** -->

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
    include_once('php/register-form.php');
   ?>


  <hr>

  <footer>
    <p class="copyright">&copy; DongMing Hu 2019</p>
    <p class="company">&reg; Little Bit Everything 2018-2019</p>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="script.js" charset="utf-8"></script>
</body>

</html>
