<?php


function insertObjIntoDBTable(object $obj, $database, $tableName) {

  $fieldsArray = get_class($obj)::$fields;
  $fields = implode(',',$fieldsArray);  // Note: $fields has AgentId !!
  $vPlaceholders = implode(',', array_fill(0,count($fieldsArray),'?'));
  $fieldsType = get_class($obj)::$fieldsType;  // get 'ssiissss'
  $values = array_values(get_object_vars($obj));  // put $obj properties values in num array, *can only access public properties

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



// ---- Func Insert Array Into Database ----

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
