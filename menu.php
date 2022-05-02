<?php

// get database connection
include("database.php");


// retreving data
$db = $conn;
$tableName = "DISH";
$columns = ['DishID', 'Name','Price','Course'];
$fetchData = fetch_data($db, $tableName, $columns);

// fetch food menu
function fetch_data($db, $tableName, $columns)
{
  if(empty($db)){
    $msg= "Database connection error";
  }

  elseif (empty($columns) || !is_array($columns)){
    $msg="columns Name must be defined in an indexed array";
  }

  elseif(empty($tableName)){
    $msg= "Table Name is empty";
  }

  else{
    $columnName = implode(", ", $columns);
    $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY DishID ASC";
    $result = $db->query($query);

    if($result == true)
    {
      if ($result->num_rows > 0)
      {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg = $row;
      }

      else
      {
        $msg = "No Data Found";
      }
    }

    else
    {
      $msg = mysqli_error($db);
    }
  }

  return $msg;
}

?>
