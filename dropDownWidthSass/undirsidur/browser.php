<?php session_start();if(!isset($_SESSION['UserData']['Password'])){header("location:../included/login.php");exit;} 
require_once('../included/connection.php');
include("../included/query3.php");
include('../included/query4.php');
include('../included/lighten.php');
$currentPage = '3';
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
		<title>Browse Events</title>
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
		.mainbody,
		footer{
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
			 <div id="brosercontainer">
			<?php 
			foreach ($vidburdur as $a) {
			$litir2r=RGB($a[4],'1');
			$litir2g=RGB($a[4],'2');
			$litir2b=RGB($a[4],'3');
				echo '<div style="background-color:rgb('. $litir2r.','.$litir2g.','.$litir2b.');border: 5px ridge '.$a[3].';color:'.$a[5].';" class="browserDiv">';
				echo 	'<a href="../index.php?viID='.$a[0].'">';
				echo 		'<img src="'.$a[2].'">';
				echo	  '<div class="browserTitle">'.$a[1].'</div>';
				echo	"</a>";			 
				echo "</div>";
			}
			 ?>
			 </div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="../js.js"></script>
	</body>
</html>