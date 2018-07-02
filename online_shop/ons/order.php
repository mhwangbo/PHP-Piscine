<?php
require_once('conn.php');
include "header.php";

$user = $_SESSION["logged_on_user"];
if (!$user)
{
	echo "<script> alert('Please Login'); window.location.href='index.php';</script>";
}
$sql = "SELECT * FROM cart WHERE name = '{$user}'";
$resource = mysqli_query($conn, $sql);
$i = 0;
while ($data = mysqli_fetch_assoc($resource))
{
	$sql = "DELETE FROM `cart` WHERE `order_no` = {$data['order_no']}";
	mysqli_query($conn, $sql);
	if ($i == 0)
		$product_list = $data['pdname'];
	else
		$product_list = $product_list.", ".$data['pdname'];
	$total_price = $data["quantity"] * $data["price"];
	$sum += $total_price;
	$i++;
}
if ($i == 0)
	echo "<script> alert('No item to purchase');window.history.back();</script>;";
else
{
$sql = "INSERT INTO `orders`(`user`, `total`, `pdlist`) VALUES ('{$user}', '{$sum}', '{$product_list}')";
$resource = mysqli_query($conn, $sql);
echo "<script> alert('Thank you for Purchasing!');window.history.back();</script>;";}
?>
