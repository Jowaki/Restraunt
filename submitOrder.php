<?php

include("database.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);
echo "<link href='receipt.css' rel='stylesheet' type='text/css'/>";
date_default_timezone_set('America/Chicago');


?>
<body style="background-image: url('receiptBackground.png');">
<?php

echo "<title>Receipt</title>
      <header>
        <div class='company-name'>Lettuce Eat</div>
        <div class='receipt'>Receipt</div>
      </header>";

$billTotal = 0;

$query = "SELECT DishID, Name, Price, Course FROM DISH";
$result = $conn->query($query);

if ($result->num_rows > 0)
{
  while($data = $result->fetch_assoc())
  {
    $tempQty = (int)$_POST[$data['DishID']];

    if ($tempQty >= 0)
    {
      $billTotal += $tempQty * $data['Price'];
    }
    else
    {
    }
  }
}

echo "<div class='body'>

        <p class='address'> 1603 W 15th <br> Jayhawk Tower-A Apt. 603 <br> Lawrence, KS 66044 </p>

        Date: " . date('m/d/Y') . "<br>
        Receipt #: ";



echo    "<br><br>
      </div>";



// $query = "INSERT INTO `ORDERS` (`PayMethod`, `Bill`) VALUES('" . $_POST['payment'] . "', " . $billTotal . ")";
// $conn->query($query);

// $myTable = $_POST["table"];

// $test = $_POST["112"];


?>
</body>
<?php

?>
