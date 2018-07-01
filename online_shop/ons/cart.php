<?php
require_once('conn.php');

session_start();

if(isset($_POST["add_to_cart"]))
{
	if (isset($_SESSION["shopping_cart"]))
	{
		$item_arr = array_column($_SESSION["shopping_cart"], "pdname");
		if(!in_array($_GET["name"], $item_arr))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_arr = array(
				'pdname' => $_POST["hidden_name"],
				'price' => $_POST["hidden_price"],
				'quantity'=> $_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_arr;
		}
		else
		{
			echo '<script>alert("Same item is already in the cart")</script>';
			echo '<script>window.location="index.php"</script>';
		}
	}
	else
	{
		$item_arr = array(
			'pdname' => $_POST["hidden_name"],
			'price' => $_POST["hidden_price"],
			'quantity'=> $_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_arr;
	}
}

if(isset($_GET["action"]))
{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
	</head>
	<body>
	<br />
	<h3>Shopping Cart</h3>
	<br>
<?php
	$sql = "SELECT * FROM pduct ORDER BY name ASC";
	$resource = mysqli_query($conn, $sql);
	if (mysqli_fetch_assoc($resource) > 0)
	{
		while($row = mysqli_fetch_assoc($resource))
		{
?>
	<form method="POST" action='cart.php?action=add&id=<?php echo $row["name"]; ?>'>
		<h4><?php echo $row["name"]; ?></h4>
		<h4><?php echo $row["price"]; ?></h4>
	
		<input type="text" name="quantity" class="form-control" value="1" />
		<input type="hidden" name="hidden_name" value="<?php echo $row["pdname"] ?>" />
		<input type="hidden" name="hidden_price" value="<?php echo $row["price"] ?>" />
		<input type="submit" name="add_to_cart" style="margin-top:5px;" value="add"/>
	</form>
<?php
		}
	}
?>
