<?php session_start();if(!isset($_SESSION['UserData']['Username'])&&!isset($_SESSION['UserData']['Password'])){header("location:../included/login.php");exit;} 
require_once('../included/connection.php');
include('../included/query4.php');
include('../included/lighten.php');
$currentPage = '4'; 
$litir1 = '#000000';
$litir2 = '#8B0000';
$litir3 = '#112233';

$litir2r=RGB($litir2,'1');
$litir2g=RGB($litir2,'2');
$litir2b=RGB($litir2,'3');

$litir3r=RGB($litir3,'1');
$litir3g=RGB($litir3,'2');
$litir3b=RGB($litir3,'3');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit User</title>
		<link rel="stylesheet" type="text/css" href="../DropDead.css">
		<meta name="viewport" content="width=device-width">
		<meta charset="utf-8">
		<style type="text/css">
		body{
			color: <?php echo $litir3 ?>;
			background-color:<?php echo $litir2 ?>;
		}
		nav ul li ul li,
		.navcontainer #mainlabel,
		#mainbody1{
			background-color:<?php echo $litir2; ?>;
		}
		a{
			color: <?php echo $litir3 ?>;
		}
		a:hover{
			color:rgb(<?php echo $litir3r.",".$litir3g.",".$litir3b; ?>);
		}
		nav ul li ul li:hover,
		nav ul li,
		.info,
		.opnun,
		footer,
		div{
			background-color:rgb(<?php echo $litir2r.",".$litir2g.",".$litir2b; ?>);
		}

		.navcontainer{
			background-color: transparent;
		}
	</style>
	</head>
	<body>
		<div id="mainbodyB" class="mainbody">
			<?php include '../included/navbar.php'; ?>
			<div id="userFormContainer">
				<form action="../included/insert3.php" method="post" name="Edit">
				
				<h3 class="userLabel"><b>Username:</b><input class="formInput" name="userUsername" type="text" class="Input" <?php echo('value="'.$dataUser[0].'"'); ?> placeholder="Username"></h3>
				
				<h3 class="userLabel"><b>Password:</b><input class="formInput" name="userPassword" type="password" class="Input" <?php echo('value="'.$dataUser[1].'"'); ?> placeholder="Password"></h3>
				
				<h3 class="userLabel"><b>Profile Image:</b><input class="formInput" name="userProfilePic" type="text" class="Input" <?php echo('value="'.$dataUser[2].'"'); ?> placeholder="Image URL"></h3>
				
				<h3 class="userLabel"><b>Name:</b> <input class="formInput" name="userNafn" type="text" class="Input" <?php echo('value="'.$dataUser[3].'"'); ?> placeholder="Name"></h3>
				<input id="subbmit" name="Submit" type="submit" value="Save Changes" class="Button3">
			</form>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="../js.js"></script>
	</body>
</html>