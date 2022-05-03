<?php
// load menu

// Note: this query is for testing purposes, won't call this query since we
// have menu pdf (thanks Jowaki)

// get database connection
include("database.php");

// query table
$query = "SELECT WaiterID, Name FROM WAITER WHERE WaiterID=1";

// execute query
$result = $conn->query($query);

?>
