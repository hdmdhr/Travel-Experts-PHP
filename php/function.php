<?php
/**************************
*
* Author: DongMing Hu
* Date: Feb. 11, 2019
* Course: CPRG 210 PHP
* Description: include two generic functions, insert object into database table, insert array into database table.
*
**************************/

// ---- Generic Function: insert object into database (OOP) ----

function insertObjIntoDBTable(object $obj, $database, $tableName) {

  $fieldsArray = get_class($obj)::$fields;
  $fields = implode(',',$fieldsArray);  // Note: $fields include AgentId !
  $vPlaceholders = implode(',', array_fill(0,count($fieldsArray),'?'));  // get ?,?,?,?,?,?,?,?
  $fieldsType = get_class($obj)::$fieldsType;  // get 'ssiissss'
  $values = array_values(get_object_vars($obj));  // put $obj properties values into a num array, * only public properties

  $insertSQL = "INSERT INTO $tableName ($fields) VALUES ($vPlaceholders)";

  $stmt =  $database->stmt_init();

   if ($stmt->prepare($insertSQL)){
     $stmt->bind_param($fieldsType,...$values);
     $bool = $stmt->execute();
     $stmt->close();
   };

  $database->close();

  return $bool;
}



// ---- Old Function: insert array into database (Procedural) ----

function insertArrayIntoDBTable(array $agentsArray, $database, $tableName){

  foreach ($agentsArray as $k => $v) {
    $fields[] = $k;
    $values[] = "'".$v."'";  // have to wrap value for insertion in single quote ''
  }
  $fields = implode(",", $fields);
  $values = implode(",", $values);

  $insertSQL = "INSERT INTO $tableName ($fields) VALUES ($values)";
  $result = mysqli_query($database, $insertSQL);
  mysqli_close($database);

  return $result;
}

 ?>
