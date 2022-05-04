<?php

include("database.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);
echo "<link href='receipt.css' rel='stylesheet' type='text/css'/>";
date_default_timezone_set('America/Chicago');


?>
<body style="background-image: url('receiptBackground.png');">
<?php


// math
$arr = array();


$query = "SELECT DishID, Name, Price, Course FROM DISH";
$result = $conn->query($query);

if ($result->num_rows > 0)
{
  while($data = $result->fetch_assoc())
  {
    if ((int)$_POST[$data['DishID']] >= 0)
    {
      array_push($arr, (int)$_POST[$data['DishID']]);
    }
    else
    {
      array_push($arr, 0);
    }
  }
}

echo $arr[0];

echo "<title>Receipt</title>

      <header>
        <div class='company-name'>Lettuce Eat</div>
        <div class='receipt'>Receipt</div>
      </header>

      <div class='body'>

        <p class='address'> 1603 W 15th <br> Jayhawk Tower-A Apt. 603 <br> Lawrence, KS 66044 </p>

        Date: " . date('m/d/Y') . "<br>
        Receipt #: ";


        echo rand(10000, 99999);
        $query = "INSERT INTO Orders () FROM WAITER WHERE WaiterID='$waiter' AND Working='1'";



echo    "<br><br>





      </div>";



// $myTable = $_POST["table"];

// $test = $_POST["112"];


?>
</body>
<?php

?>
