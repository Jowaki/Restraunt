<?php

// get database connection
include("database.php");

// get waiterID (from login.html)
$waiter=$_POST["username"];

if ($waiter == 000)
{
  $query = "SELECT WaiterID, Name FROM WAITER WHERE Working='1'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<h3>" .$row["Name"]. "\n</h3>";
      $current = $row["WaiterID"];

      if($current == "000")
      {
        echo "Manager";
        continue;
      }
      echo "<b>Tables: </b> ";

      $look = "SELECT * FROM WAITTABLE WHERE WaiterID = $current ";
      $result1 = $conn->query($look);

      if ($result1->num_rows > 0) {
          // output data of each row
          while($row1 = $result1->fetch_assoc()) {
              echo $row1["TableID"] ." ";
              
          }
        }
      }

    }
  }
  else 
  {
    echo "<h1>Not Authorised</h1>";
  }
  ?>
<html>
<body style="background-image: url('lettucepic.jpg');"></body>
</html>