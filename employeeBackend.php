<?php

// get database connection
include("database.php");

// get waiterID (from login.html)
$waiter=$_POST["username"];


$query = "SELECT WaiterID, Name FROM WAITER WHERE WaiterID='$waiter' AND Working='1'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h1>Hello " .$row["Name"]. "\n</h1>";
  }

  echo "<h2>Tables You Are Waiting: \n</h2>";
    $look = "SELECT TableID FROM WAITTABLE WHERE WaiterID='$waiter'";
    $result1 = $conn->query($look);
    if ($result1->num_rows > 0) {
        // output data of each row
        while($row1 = $result1->fetch_assoc()) {
            echo "<h3> * " .$row1["TableID"]. "\n</h3>";
        }

        // add order.php contents in here, make tables radio button

}
?>
<html>
    <form action="order.php" method="post">
    <body style="background-image: url('lettucepic.jpg');">
    <button style="height:35px" type="submit" value="Submit ">Order</button>
    </form>
</body>
</html>


<?php

} else {
  echo "<h1>Not Authorised</h1>";
}
$conn->close();
?>
<html>
<body style="background-image: url('lettucepic.jpg');">
</html>
