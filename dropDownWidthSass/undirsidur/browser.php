<?php session_start();if(!isset($_SESSION['UserData']['Password'])){header("location:../included/login.php");exit;} 
require_once('../included/connection.php');
include("../included/query3.php");
include('../included/query4.php');
include('../included/lighten.php');
$currentPage = '3';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Browse Events</title>
		<link rel="stylesheet" type="text/css" href="../DropDead.css">
		<meta name="viewport" content="width=device-width">
		<meta charset="utf-8">
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