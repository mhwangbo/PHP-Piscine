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
	$s = "SELECT * FROM pduct WHERE cat={$cat} and {$genre}";
elseif ($cat)
	$s = "SELECT *  FROM `pduct` WHERE `cat` = {$cat}";
else
	$s = "SELECT *  FROM `pduct`";

$resource = mysqli_query($conn, $s);
?>
<table style="width:70%";height:"50px";border:"5px solid black">
	<tr>
		<td align="center" valign="middle" style="font-size:15px; font-weight:bold;">Product list</td>
	</tr>
</table>
<br />
<table cellspacing="1" style="width:1000px;height:50px;border:0px;background-color:#999999;">
   <tr>
       <td align="center" valign="middle" width="5%" style="height:30px;background-color:grey;">no</td>
       <td align="center" valign="middle" width="10%" style="height:30px;background-color:grey;">Title</td>
       <td align="center" valign="middle" width="60%" style="height:30px;background-color:grey;">Product Name</td>
       <td align="center" valign="middle" width="25%" style="height:30px;background-color:grey;">Price</td>
   </tr>
<?php
$i = 0;
while ($data = mysqli_fetch_assoc($resource))
{
$i++;
?>
<tr>
<td align = "center" valign="middle" style="height:30px;"><?php echo "$i"; ?></td>
<td align = "center" valign="middle" style="height:30px;"><img src="<?php echo ($data['image']);?>"/></td>
<td align = "left" valign="middle" style="height:30px;"><?php echo "$data[pdname]"; ?></td>
<td align = "center" valign="middle" style="height:30px;"><?php echo "$"."$data[price]"; ?></td>
</tr>
<?php
}
?>
<?
if($i == 0){
?>
   <tr>
       <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">No Product Available</td>
   </tr>
<?
}
?>
</table>
	</body>
</html>
