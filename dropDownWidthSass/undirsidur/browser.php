<?php session_start();if(!isset($_SESSION['UserData']['Username'])){header("location:../included/login.php");exit;} 
require_once('../included/connection.php');
include("../included/query3.php");

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
			<?php 
			/*foreach ($vidburdur as $a) {
				echo("<div class='browserDiv'><a href='../index.php?viID=".$a[0]."'>".$a[1]."</a></div>");
			}*/
			 ?>
			 <div id="brosercontainer">
			 <div style="border: 2px solid black;background-color:darkred;color:#112233;" class="browserDiv">
				 	<img src="http://www.msf-me.org/en/media/get/20100902_img-test.jpg">
				 	<div class="browserTitle">Texti</div>
				 </div>
				 <div style="border: 2px solid black;background-color:darkred;color:#112233;" class="browserDiv">
				 	<img src="http://www.msf-me.org/en/media/get/20100902_img-test.jpg">
				 	<div class="browserTitle">Texti</div>
				 </div>
				 <div style="border: 2px solid black;background-color:darkred;color:#112233;" class="browserDiv">
				 	<img src="http://www.msf-me.org/en/media/get/20100902_img-test.jpg">
				 	<div class="browserTitle">Texti</div>
				 </div>
				 <div style="border: 2px solid black;background-color:darkred;color:#112233;" class="browserDiv">
				 	<img src="http://www.msf-me.org/en/media/get/20100902_img-test.jpg">
				 	<div class="browserTitle">Texti</div>
				 </div>
			 </div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="../js.js"></script>
	</body>
</html>