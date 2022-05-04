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
      </header>

      <div class='body'>
        <p class='address'>  122231 W 15th <br> Eaton Allot-A Apt. 603 <br> Lawrence, KS 66044 </p>

        <p>
        Date: " . date('m/d/Y') . "<br>
        Seating ID: " . $_POST["table"] . "<br>
        </p>

        <table class='receiptTable'>
          <tr>
            <th>Quantity</th>
            <th>Food Item</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        ";

$query = "SELECT DishID, Name, Price, Course FROM DISH";
$result = $conn->query($query);
$billTotal = 0;

if ($result->num_rows > 0)
{
  while($data = $result->fetch_assoc())
  {
    $tempQty = (int)$_POST[$data['DishID']];

    if ($tempQty > 0)
    {
      $itemTotal = $tempQty * $data['Price'];
      $billTotal += $itemTotal;

      echo "<tr>";
      echo "<td>"  . $tempQty       . "</td>";
      echo "<td>"  . $data['Name']  . "</td>";
      echo "<td>$" . $data['Price'] . "</td>";
      echo "<td>"  . $itemTotal     . "</td>";
      echo "</tr>";
    }
  }
}

$query = "INSERT INTO `ORDERS` (`PayMethod`, `Bill`) VALUES('" . $_POST['payment'] . "', " . $billTotal . ")";
$conn->query($query);

echo "
            <td colspan='2'></td>
            <td><b>Order #" . mysqli_insert_id($conn) ." Total</b></td>
            <td><b>" . $billTotal ."</b></td>
          </table>
        </div>";




?>
</body>
<?php

?>
