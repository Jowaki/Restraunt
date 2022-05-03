
<?php

// merge this with employeeBackend.php, no need to load tables twice 




// load menu

// Note: this query is for testing purposes, won't call this query since we
// have menu pdf (thanks Jowaki)

// get database connection
include("database.php");

$query = "SELECT DishID, Name, Price, Course FROM DISH";

// execute query
$result = $conn->query($query);

?>

<!-- create form -->
<form action="submitOrder.php" method="post">

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
          <td><input type="number" value=0 name="<?php echo $data['DishID']; ?>"</td>
        <tr>
  <?php
      }


       // $test = $_POST[];
       ?>

       <!-- <select name="table">
         <option value=""></option>
       </select> -->

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

  <input type="submit" value="Generate Bill">
</form>

<body style="background-image: url('lettucepic.jpg');"></body>
