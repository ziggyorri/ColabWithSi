<?php session_start();if(!isset($_SESSION['UserData']['Password'])){header("location:../included/login.php");exit;}
require_once('../included/connection.php');
include('../included/query4.php');
include('../included/lighten.php');
$currentPage = '2'; 
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
	<title>Event Form</title>
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
<form action="../included/insert2.php" method="post" Name="indexForm">
<div id="mainbody1" class="mainbody">
<?php include("../included/navbar.php"); ?>
	<div id="titleID" class="title"><input type="text" name="heiti" placeholder="Title" required></div>

	<div id="img"><input id="imgInput" type="text" name="imgUrl" placeholder="Image URL" required></div>
	

	<div id="heading1" class="main">
		
		<textarea id="indexFormTA" style="min-height: 836px;" rows="44" cols="83" name="lysing" placeholder="Description"></textarea>

	</div>
<div id="info" class="Price">
		<div class="meh"><h2>Date</h2><input type="text" name="dags" placeholder="Date" required>
		<input type="text" name="timi" placeholder="Time" required></div>

		<div class="meh">Shown in
		<input type="text" name="shownIn" placeholder="Location" required></div>

		<div>Price <input type="text" name="price" placeholder="Amount" required></div>
	</div>

	<div class="Price">
		<input type="text" name="color1" placeholder="Dark Color (e.g.: '#000000')">
		<input type="text" name="color2" placeholder="Light Color (example: 'darkred')">
		<input type="text" name="color3" placeholder="Font Color (example: '#123')">
		<input type="submit" name="submit" value="Submit" Class="Button3">
	</div>
<?php include("../included/footer.php"); ?>
</div>
</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../js.js"></script>
</body>
</html>