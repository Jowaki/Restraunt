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
    ?>
    <form action="submitOrder.php" method="post"><?php
    if ($result1->num_rows > 0) {
        // output data of each row
        while($row1 = $result1->fetch_assoc()) {?>
            <?php echo $row1["TableID"]?> 
            <?php
        }
        ?>
        <input type="text" id="tID" name="tID">
        <?php

        // add order.php contents in here, make tables radio button

        $query = "SELECT DishID, Name, Price, Course FROM DISH";

        // execute query
        $result = $conn->query($query);
}
?>
<html>

<!-- create form -->


  <!-- make table -->
  <table border="1" cellspacing="0" cellpadding="10">
    <!-- header row -->
    <tr>
      <th>DishID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Course</th>
      <th>Quantity</th>
    </tr>

  <?php
    // load tuple as row
    if ($result->num_rows > 0) {
      while($data = $result->fetch_assoc())
      {
  ?>
        <tr>
          <td> <?php echo $data['DishID']; ?>  </td>
          <td> <?php echo $data['Name'];   ?>  </td>
          <td>$<?php echo $data['Price'];  ?>  </td>
          <td> <?php echo $data['Course']; ?>  </td>
          <td><input type="number" value=0 name=" <?php echo $data['DishID']; ?>"></td>
        <tr>
       
  <?php
      }

       ?>
       <?php

    }

    else
    {
  ?>
        <tr>
          <td colspan="8">No data found</td>
        </tr>
  <?php
    }
  ?>
  </table>

  <br>
  <br>
  <input type="submit" value="Generate Bill">



  </form>
    <!-- <form action="Order.php" method="post"> -->
    <body style="background-image: url('lettucepic.jpg');">
    
</body>
</html>


<?php

} else {
  echo "<h1>Not Authorised</h1>";
}
$conn->close();
?>
<!-- <html>
<body style="background-image: url('lettucepic.jpg');">
</html> -->




<body style="background-image: url('lettucepic.jpg');"></body>
