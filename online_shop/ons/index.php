<?php
	include "header.php";
?>
	<div class="left_block block">
		<img src="resources/books.jpg" width = "100%" title="books" alt="books"/>
	</div>
	<div class="right_block block">
		<div class="right_top_block">
			<?php
			if (!isset($_SESSION['logged_on_user'])){
			?>
			<form action="login.php" method="POST">
				Username: <br /><input type="text" name="name"><br />
				Password: <br /><input type="text" name="pass"><br />
				<input type="submit" value="OK"><br />
			</form>
			<a href="create.php">Register</a>
			<?php
			}else{
			?>
			Welcome <?php echo $_SESSION['logged_on_user']; ?> <br />
			<a href="logout.php">Logout</a>
			<?php
			}
			?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
