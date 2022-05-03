<?php
$mysqli =new mysqli("mysql.eecs.ku.edu", "p695k530", "eFeitu9e", "p695k530");
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);exit();
}
$user=$_POST["username"];

$sql = "SELECT WaiterID, Name FROM WAITER WHERE WaiterID='$user' AND Working='1'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h1>Hello " .$row["Name"]. "\n</h1>";
  }

  echo "<h2>Tables You Are Waiting: \n</h2>";
    $look = "SELECT TableID FROM WAITTABLE WHERE WaiterID='$user'";
    $result1 = $mysqli->query($look);
    if ($result1->num_rows > 0) {
        // output data of each row
        while($row1 = $result1->fetch_assoc()) {
            echo "<h3> * " .$row1["TableID"]. "\n</h3>";
        }

        
}
?>
<html>
    <form action="Order.php" method="post">
    <body style="background-image: url('lettucepic.jpg');">
    <button style="height:35px" type="submit" value="Submit ">Order</button>
    </form>
</body>
</html>


<?php

} else {
  echo "<h1>Not Authorised</h1>";
}
$mysqli->close();
?>
<html>
<body style="background-image: url('lettucepic.jpg');">
</html>

