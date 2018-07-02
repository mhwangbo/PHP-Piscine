<?php
require_once('conn.php');
include "header.php";

$user = $_SESSION["logged_on_user"];
$sql = "SELECT * FROM cart WHERE name='{$user}'";
$resource = mysqli_query($conn, $sql);
?>
<br />
<table style ="width:70%; height:50px; border: 5px #CCCCCC solid;">
	<tr>
		<td align="center" valign="middle" style="font-size:15px;font-weight:bold;">Shopping cart</td>
</tr>
</table>
<br />
<table style ="width:70%; height:50px; border: 0">
<table cellspacing="1" style="width:70%; height:50px; border:0px;">
	<tr style="border: 1px;">
		<td align="center" valign="middle" width="40%" style="height:30px;backgournd-color:#CCCCCC;"><b>Product</b></td>
		<td align="center" valign="middle" width="20%" style="height:30px;backgournd-color:#CCCCCC;"><b>Price</b></td>
		<td align="center" valign="middle" width="20%" style="height:30px;backgournd-color:#CCCCCC;"><b>Quantity</b></td>
		<td align="center" valign="middle" width="20%" style="height:30px;backgournd-color:#CCCCCC;"><b>Total</b></td>
		<td align="center" valign="middle" width="20%" style="height:30px;backgournd-color:#CCCCCC;"><b>Delete</b></td>
	</tr>
<?php
$i = 0;
while ($data = mysqli_fetch_assoc($resource))
{
?>
	<tr>
	<td align="center" valign="middle" style="height:30px;backgournd-color:#FFFFFF;"><?php echo $data["pdname"]?></td>
	<td align="center" valign="middle" style="height:30px;backgournd-color:#FFFFFF;">$<?php echo$data["price"]?></td>
	<td align="center" valign="middle" style="height:30px;backgournd-color:#FFFFFF;"><?php echo $data["quantity"]?></td>
<?php
	$total_price = $data["quantity"] * $data["price"];?>
	<td align="center" valign="middle" style="height:30px;backgournd-color:#FFFFFF;">$<?php echo $total_price?></td>
	<td align="center" valign="middle" style="height:30px;backgournd-color:#FFFFFF;">
<form action="cart_delete.php" method="POST">
	<button type="submit" name="delete" value="<?php echo ($data['order_no']);?>">REMOVE</button><br />
</tr>
<?php
	$i++;
	$sum += $total_price;
}
if ($i == 0)
{
?>
    <tr>
        <td align="center" valign="middle" colspan="5" style="height:50px;background-color:#FFFFFF;">Nothing in the Cart</td>
    </tr>
<?php
}
?>
    <tr>
        <td align="right" valign="middle" colspan="5" style="height:50px;background-color:#FFFFFF;"><b>Total:</b>     $<?php echo $sum;?></td>
    </tr>
</table>
<br/>
<?php
if ($user)
{
?>
<table style="width:1000px;height:50px;">
    <tr>
        <td align="center" valign="middle"><input type="button" value="purchase" onClick="location.href='order.php';"></td>
    </tr>
</table>
<?php
}
?>
