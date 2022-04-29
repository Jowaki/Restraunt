<?php

// testing commit -Andrew 

$hostName = "mysql.eecs.ku.edu";
$userName = "p695k530";
$password = "eFeitu9e";
$databaseName = "p695k530";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//retreving data
$db= $conn;
$tableName="DISH";
$columns= ['DishID', 'Name','Price','Course'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY DishID ASC";
$result = $db->query($query);

if($result== true){
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found";
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>



<!DOCTYPE html>
<html>
<head>
</head>
<body>

  <br><br><br>
  <Tables>
    <label for="ttype">Available tables:</label>
    <select name="ttype" id="ttype">
      <option value="Booth">Booth (4ppl) </option>
      <option value="Bar">Bar (1ppl)</option>
      <option value="Table">Table (4ppl)</option>
    </select>
  </Tables>

  <br><br><br>


<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr>

         <th>DishID</th>
         <th>Name</th>
         <th>Price</th>
         <th>Course</th>
         <th>Quantity</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>

      <td><?php echo $data['DishID']??''; ?></td>
      <td><?php echo $data['Name']??''; ?></td>
      <td><?php echo $data['Price']??''; ?></td>
      <td><?php echo $data['Course']??''; ?></td>
      <td><input type="number"</td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="15">
    <?php echo $fetchData; ?>
  </td>
    <tr>
      <?php
      }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
<br><br><br>

  <input type="submit">



</body>
</html>
