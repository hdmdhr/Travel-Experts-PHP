<?php
/**************************
 *
 * Author: PLDM Team 2
 * Date: Feb. 14, 2019
 * Course: CPRG 216 Project
 * Description: agent entry form is posted to this page, and validated here
 *
 **************************/

if (isset($_POST)) {
    // if received a post, do validation: 1.check if any input is empty, 2.check if password confirmation mathches password, 3.if any of the above happened, save error message and the invalidated post into session, head back to form page

    $errorMsg = '';
    foreach ($_POST as $inputName => $inputValue) {
        if (empty($inputValue)) {
            // if any input empty, update error message
            $errorMsg .= "Need a valid <em>" . $inputName . ".</em><br>";
        }
    }

    if ($_POST['AgtPassword'] !== $_POST['pinConfirm']) {
        // if two pins don't match, update error message
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
        header("Location: http://localhost/PLDM-Team-2/agent-signup.php");
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
  <title>Agent Inserted Into Database</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Raleway:400,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php
// validation past, collect data from post and insert into database: 1.include insert func, 2.connect database, 3.use $_POST to create obj, 4.pass obj into insert func, 5.print succeed or fail.
include_once 'php/menu.php';
include_once 'php/function.php';
include_once 'php/classes.php';

$travel_experts = ConnectDB();

$postValueArray = array_values($_POST);

$agentObj = new Agent(...$postValueArray);

// ----- insert new agent object into database -----
$tableName = 'agents';
if (insertObjIntoDBTable($agentObj, $travel_experts, $tableName)) {
    echo "<h2>Great! Agent <em>" . $_POST['AgtFirstName'] . "</em>'s info was inserted into table <em>$tableName</em>.";
} else {
    echo "<h2>The username you input is already used.";
}
// create a button to go back to agent entry page
echo "<a href='agent-signup.php' ><button class='btn btn-outline-secondary ml-4'>Go Back</button></a></h2>";

include_once('php/footer.php');
?>

</body>
</html>
