<?php
require_once('conn.php');
include "header.php";

if ($_GET['cat'])
{
	$cat = $_GET['cat'];
	if ($_GET['genre'])
		$genre = $_GET['genre'];
}

if ($cat && $genre)
	$s = "SELECT * FROM pduct WHERE `cat` = {$cat} and `genre` = {$genre}";
elseif ($cat)
	$s = "SELECT *  FROM `pduct` WHERE `cat` = {$cat}";
else
	$s = "SELECT *  FROM `pduct`";

$resource = mysqli_query($conn, $s);
?>
<table class="table_list">
	<tr>
		<td align="center" valign="middle" style="font-size:15px; font-weight:bold;">Product list</td>
	</tr>
</table>
<br />
<table cellspacing="1" style="width:1000px;height:50px;border:0px;background-color:#999999;">
   <tr>
       <td align="center" valign="middle" width="5%" style="height:30px;background-color:grey;">no</td>
       <td align="center" valign="middle" width="10%" style="height:30px;background-color:grey;">Title</td>
       <td align="center" valign="middle" width="50%" style="height:30px;background-color:grey;">Product Name</td>
       <td align="center" valign="middle" width="23%" style="height:30px;background-color:grey;">Price</td>
       <td align="center" valign="middle" width="10%" style="height:30px;background-color:grey;"></td>
   </tr>
<?php
$i = 0;
while ($data = mysqli_fetch_assoc($resource))
{
$i++;
?>
<tr>
<td align = "center" valign="middle" style="height:30px;"><?php echo "$i"; ?></td>
<td align = "center" valign="middle" style="height:30px;"><img src="<?php echo ($data['image']);?>" width ="100%"/></td>
<td align = "left" valign="middle" style="height:30px;"><?php echo "$data[pdname]"; ?></td>
<td align = "center" valign="middle" style="height:30px;"><?php echo "$"."$data[price]"; ?></td>
<td align = "center" valign="middle" style="height:30px;">
<a href="cart_save.php?pdname='<?php echo "$data[pdname]";?>">Add to Cart</a>
</td>
</tr>
<?php
}
?>
   <tr>
       <td align="center" valign="middle" colspan="5" style="height:50px;background-color:#FFFFFF;">End of Product</td>
   </tr>
</table>
	</body>
</html>
