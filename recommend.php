<?php
// if(session_id() == '' || !isset($_SESSION)) {
//     session_start();
// }

//the codes below can have a seperate php for easy usage in multiple pages
$dbh= new mySqli("localhost", "admin","lol666","travelexperts"); // change the password 

$dta= mySqli_query($dbh,"SELECT * FROM customers");

$columnNames = array("CustomerId", "CustFirstName", "CustLastName",
 "CustAddress", "CustCity", "CustProv", "CustPostal", "CustCountry", "CustHomePhone",
 "CustBusPhone", "CustEmail", "AgentId","Password", "PackageId");


//$customerId= $_SESSION['user-id'];
$customerId="109";
while ($row = mysqli_fetch_array($dta, MYSQLI_ASSOC))
{
  if ($row['CustomerId']== $customerId)
  {
    $fname=$row[$columnNames[1]];
    $lname=$row[$columnNames[2]];
    $address=$row[$columnNames[3]];
    $city=$row[$columnNames[4]];
    $provience=$row[$columnNames[5]];
    $postal=$row[$columnNames[6]];
    $country=$row[$columnNames[7]];
    $homephone=$row[$columnNames[8]];
    $busphone=$row[$columnNames[9]];
    $email=$row[$columnNames[10]];
    $agentid= $row[$columnNames[11]];
    $pw=$row[$columnNames[12]];
    $pkgtyp=$row[$columnNames[13]];

    $arr=array();
    while($all=mysqli_fetch_array($dbh,MYSQLI_NUM))
    {
        foreach ($all as $k) {
            if(empty(k))
            {
                continue;
            }
            $arr[]=$val;
          
        }
    }

    $recommend= array_count_values($arr);
    


  }

  
  
};









?>