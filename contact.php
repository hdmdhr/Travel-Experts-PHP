<!-- /**************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: the a contact page includes two tables
*
**************************/ -->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Contact Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php
  require_once('php/header.php');
 ?>


  <h2>International Contacts Table</h2>
  <table class="table">
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

  <h2>Most Common Contacts List</h2>
  <ul class="list-group">
    <li class="list-group-item list-group-item-danger">
      <p>Clare: 222-000-222</p>
    </li>
    <li class="list-group-item list-group-item-warning">
      <p>Mei: 444-000-444</p>
    </li>
    <li class="list-group-item list-group-item-success">
      <p>Vector: 333-000-333</p>
    </li>
    <li class="list-group-item list-group-item-primary">
      <p>Tanaka: 111-000-111</p>
    </li>
  </ul>

  <hr>

  <footer>
    <p class="copyright">&copy; DongMing Hu 2019</p>
    <p class="company">&reg; Little Bit Everything 2018-2019</p>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="script.js" charset="utf-8"></script>
</body>

</html>
