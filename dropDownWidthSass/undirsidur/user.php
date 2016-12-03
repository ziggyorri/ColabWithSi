<?php session_start();if(!isset($_SESSION['UserData']['Username'])&&!isset($_SESSION['UserData']['Password'])){header("location:../included/login.php");exit;} 
require_once('../included/connection.php');
include('../included/query4.php');
include('../included/lighten.php');
$currentPage = '4'; ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit User</title>
		<link rel="stylesheet" type="text/css" href="../DropDead.css">
		<meta name="viewport" content="width=device-width">
		<meta charset="utf-8">
	</head>
	<body>
		<div id="mainbodyB" class="mainbody">
			<?php include '../included/navbar.php'; ?>
			<form action="" method="post" name="Edit">
				<label class="userLabel">Username:</label>
				<input class="formInput" name="Username" type="text" class="Input" <?php echo('value="'.$dataUser[0].'"'); ?> placeholder="Username">
				<label class="userLabel">Password:</label>
				<input class="formInput" name="Password" type="password" class="Input" <?php echo('value="'.$dataUser[1].'"'); ?> placeholder="Password">
				<label class="userLabel">Profile Image:</label>
				<input class="formInput" name="ProfilePic" type="text" class="Input" <?php echo('value="'.$dataUser[2].'"'); ?> placeholder="Image URL">
				<label class="userLabel">Name:</label>
				<input class="formInput" name="Name" type="text" class="Input" <?php echo('value="'.$dataUser[3].'"'); ?> placeholder="Name">
				<input class="formInput" name="Submit" type="submit" value="Save Changes" class="Button3">
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="../js.js"></script>
	</body>
</html>