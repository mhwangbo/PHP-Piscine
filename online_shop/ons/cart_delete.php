<?php
require_once('conn.php');
include "header.php";

$order_no = $_POST["delete"];
$sql = "DELETE FROM `cart` WHERE `order_no` = {$order_no}";
mysqli_query($conn, $sql);
echo "<script> alert('Item removed');window.history.back();</script>;";
?>
