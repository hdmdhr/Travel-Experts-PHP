<?php
/**************************
 *
 * Author: PLDM Team 2
 * Date: Feb. 14, 2019
 * Course: CPRG 216 Project
 * Description: customer signup form is posted to this page, and validated here, and inserted into database, print success or not
 *
 **************************/

if (isset($_POST)) {

    $errorMsg = '';
    foreach ($_POST as $inputName => $inputValue) {
        if (empty($inputValue)) {
            // if any input empty, add error and old data,
            $errorMsg .= "Need a valid <em>" . $inputName . ".</em><br>";
        }
    }

    if ($_POST['CustPassword'] !== $_POST['pinConfirm']) {
        // if two pins don't match, add error message
        $errorMsg .= "Password confirmation doesn't match password.<br>";
    } else {
        // if two pins match, remove the pinConfirm from $_POST
        unset($_POST['pinConfirm']);
    }

    if ($errorMsg) {
        // if have error message, save the filled data in session, head back to the form page
        session_start();
        $_SESSION['errorMsg'] = $errorMsg;
        $_SESSION['invalidated_post'] = $_POST;
        header("Location: http://localhost/PLDM-Team-2/customer-signup.php");
        exit;
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Customer Signed Up</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php
include_once 'php/menu.php';

// 1.connect database, 2.include insert func, 3.use $_POST to create obj, 4.pass obj into insert func, 5.print succeed or fail.

$travel_experts = mysqli_connect("localhost", "admin", "P@ssw0rd", "travelexperts");
if (!$travel_experts) {
    echo "Error number:" . mysqli_connect_errno() . PHP_EOL;
    echo "Error message:" . mysqli_connect_error() . PHP_EOL;
    exit;
}

include_once 'php/function.php';
include_once 'php/classes.php';

unset($_POST['age']);  // do not need age for database
$postValueArray = array_values($_POST);

$customerObj = new Customer(...$postValueArray);
// var_dump($customerObj);

// ---- New: insert object into database ---
$tableName = 'customers';
if (insertObjIntoDBTable($customerObj, $travel_experts, $tableName)) {
    echo "<h2>Congratulations, <em>".$_POST['firstName']."!</em> You are successfully registered.<a href='customer-signin.php' ><button class='btn btn-outline-secondary ml-4'>Go Signin</button></a></h2>";
} else {
    echo "<h2 class='alert alert-danger'>Sorry! The username is already used.<a href='customer-signup.php' ><button class='btn btn-outline-secondary ml-4'>Go Back</button></a></h2>";
    // if cannot insert into database, save the filled data in session
    session_start();
    $_SESSION['errorMsg'] = $errorMsg;
    $_SESSION['invalidated_post'] = $_POST;
}

include_once 'php/footer.php';
?>

</body>
</html>
