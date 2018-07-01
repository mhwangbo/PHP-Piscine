<?php
require_once('conn.php');

session_start();

function paging($page, $page_row, $page_scale, $total_count, $ext = '')
{
   $total_page  = ceil($total_count / $page_row);

   $paging_str = "";

   if ($page > 1) {
       $paging_str .= "<a href='".$_SERVER['PHP_SELF']."?page=1&'".$ext.">First</a>";
   }

   $start_page = ( (ceil( $page / $page_scale ) - 1) * $page_scale ) + 1;

   $end_page = $start_page + $page_scale - 1;
   if ($end_page >= $total_page) $end_page = $total_page;

   if ($start_page > 1){
       $paging_str .= " &nbsp;<a href='".$_SERVER['PHP_SELF']."?page=".($start_page - 1)."&'".$ext.">Previous</a>";
   }

   if ($total_page > 1) {
       for ($i=$start_page;$i<=$end_page;$i++) {
           if ($page != $i){
               $paging_str .= " &nbsp;<a href='".$_SERVER['PHP_SELF']."?page=".$i."&'".$ext."><span>$i</span></a>";
           }else{
               $paging_str .= " &nbsp;<b>$i</b> ";
           }
       }
   }

   if ($total_page > $end_page){
       $paging_str .= " &nbsp;<a href='".$_SERVER['PHP_SELF']."?page=".($end_page + 1)."&'".$ext.">Next</a>";
   }

   if ($page < $total_page) {
       $paging_str .= " &nbsp;<a href='".$_SERVER['PHP_SELF']."?page=".$total_page."&'".$ext.">Last</a>";
   }

   return $paging_str;
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="drop_menu.css">
	<title>Online Store</title>
</head>
<body leftmargin="0" topmargin="0">

<div class="top_block block">
	<div class="menu_b">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="category.php">All</a></li>
			<li><a href="category.php?cat='fiction'">Fiction</a>
				<ul>
					<li><a href="category.php?cat='fiction'&&genre='action'">Action</a></li>
					<li><a href="category.php?cat='fiction'&&genre='children'">Children</a></li>
					<li><a href="category.php?cat='fiction'&&genre='romance'">Romance</a></li>
				</ul>
			</li>
			<li><a href="category.php?cat='nonfiction'">Non-Fiction</a>
				<ul>
					<li><a href="category.php?cat='nonfiction'&&genre='action'">Action</a></li>
					<li><a href="category.php?cat='nonfiction'&&genre='children'">Children</a></li>
					<li><a href="category.php?cat='nonfiction'&&genre='nonfiction'">Non-Fiction</a></li>
					<li><a href="category.php?cat='nonfiction'&&genre='romance'">Romance</a></li>
				</ul>
			</li>
<?php
	if (isset($_SESSION['logged_on_user']))
	{
		$name = $_SESSION['logged_on_user'];
		$sql = "SELECT * FROM user WHERE admin IS NOT NULL and name='{$name}'";
		$resource = mysqli_query($conn, $sql);
		$num = mysqli_fetch_assoc($resource);
		if ($num > 0)
		{
?>
			<li><a href="admin.php">Admin</a></li>
<?php
		}
?>
<a href="cart.php">
<img src="resources/cart.png" title="cart" alt="cart" id="cart"/></a>
<?php
	}
?>
		</ul>
	</div>
</div>
