<?php
require_once('conn.php');
include "header.php";

if(!$_SESSION["logged_on_user"])
{
	echo 'Please login';
?>
<br />
<br />
<a href='Index.php'>Go to main page</a>
<br />
<?php
}

$pdname = $_GET["pdname"];
if(!$pdname)
{
	echo 'Please select the item';
?>
	<a href='Index.php'>Go to main page</a>
<?php
}

$sql = "SELECT * FROM `pduct` WHERE `pdname` = {$pdname}'";
$resource = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($resource);

$user = $_SESSION["logged_on_user"];
$pdname = $data["pdname"];

$quantity = 1;

$sql = "INSERT INTO `cart`(`name`, `price`, `quantity`, `pdname`) VALUES ('{$user}', '{$data["price"]}', '{$quantity}', '{$pdname}')";

mysqli_query($conn, $sql);


echo 'Added to cart';
?>
<a href='index.php'>Go to main page</a>
<a href='cart.php'>Go to Cart</a>
