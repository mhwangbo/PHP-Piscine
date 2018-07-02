<?php
require_once('conn.php');
include ("header.php");
if(!$_SESSION["logged_on_user"])
{
    echo '<script> alert("Please login.", "./login.php") </sript>';
}

$sql = "SELECT *  FROM `cart` WHERE ORDER BY `pdname` ASC";
$result = mysql_query($sql, $connect);
echo $sql;
?>
<br/>
<table style="width:1000px;height:50px;border:5px #CCCCCC solid;">
    <tr>
        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">cart</td>
    </tr>
</table>
<br/>
<table style="width:1000px;height:50px;border:0px;">
<table cellspacing="1" style="width:1000px;height:50px;border:0px;background-color:#999999;">
    <tr>
        <td align="center" valign="middle" width="40%" style="height:30px;background-color:#CCCCCC;">Prodcut</td>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">Price</td>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">Quantity</td>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">Total</td>
	</tr>

    <tr>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?php=$data[i_name]?></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;">$<?php=number_format($data["price"])?></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?php=number_format($data["count"])?></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;">$<?php=number_format($data["total"])?></td>
    </tr>
    <tr>
        <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">No items in the cart</td>
    </tr>
    <tr>
        <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">Total : %<?php=number_format($sum)?></td>
    </tr>
</table>
<br/>
<table style="width:1000px;height:50px;">
    <tr>
        <td align="center" valign="middle"><input type="button" value="Purchase" onClick="location.href='./order.php';"></td>
    </tr>
</table>

