<?php session_start();if(!isset($_SESSION['UserData']['Username'])){header("location:../included/login.php");exit;
require_once('./included/connection.php');
$ID = '1';
if (isset($_POST['vidburdurID'])) {
	$ID = $_POST['vidburdurID'];
}
else{
}
} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Viðburða</title>
	<link rel="stylesheet" type="text/css" href="../DropDead.css">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
</head>
<body>
<form action="insert2.php" method="post" Name="indexForm">
<div id="mainbody1" class="mainbody">
<div class="navcontainer">
<input type="checkbox" id="toggle">
	<label for="toggle">&#9776menu</label>
<nav>
      <ul>
		<li>Curent page
			<ul>
				<li><a id="link1" href="#">Discription</a></li>
				<li><a id="link2" href="#">Map</a></li>
				<li><a id="link3" href="#">Other info</a></li>
				<li><a id="link4" href="#">Contacts</a></li>
			</ul>
		</li>
		<li>Top tengill
			<ul>
				<li><a onclick="" href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
			</ul>
		</li>
		<li>Top tengill
			<ul>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
			</ul>
		</li>
		<li><a href="included/logout.php">Logout</a></li>
	</ul>
</nav>
</div>
	<div id="titleID" class="title"><input type="text" name="heiti" placeholder="Title" required></div>

	<div id="img"><input type="text" name="imgURL" placeholder="Image URL" required></div>
	

	<div id="heading1" class="main">
		
		<input type="text" name="lysing" placeholder="Description">

	</div>
<div id="info" class="Price">
		<div class="meh"><h2>Date</h2><input type="text" name="dags" placeholder="Date" required><input type="text" name="timi" placeholder="Time" required></div>

		<div class="meh">Shown in<input type="text" name="shownIn" placeholder="Location" required></div>

		<div>Price <input type="text" name="price" placeholder="Amount" required=></div>
	</div>

	<div class="opnun">
	<h2>Opnunartímar</h2>
		<div class="meh">Virka Daga: <input type="text" name="virka" placeholder="Time" required></div>

		<div>Helgar: <input type="text" name="helgar" placeholder="Time" required></div>
	</div>
		<div id="mapi">
			<input type="text" name="GoogleMapURL" placeholder="Google Map URL">
		</div>

	<footer>
		<ul>
		<input type="text" name="Title 1" placeholder="Title">
			<input type="text" name="Link 1" placeholder="Link 1">
			<input type="text" name="Link 2" placeholder="Link 2">
			<input type="text" name="Link 3" placeholder="Link 3">
			<input type="text" name="Link 4" placeholder="Link 4">
		</ul>
		<ul>
		<input type="text" name="Title 2" placeholder="Title">
			<input type="text" name="Link 5" placeholder="Link 1">
			<input type="text" name="Link 6" placeholder="Link 2">
			<input type="text" name="Link 7" placeholder="Link 3">
			<input type="text" name="Link 8" placeholder="Link 4">
		</ul>
		<ul id="ref">
		<input type="text" name="Title 3" placeholder="Title">
			<input type="text" name="Link 9" placeholder="Link 1">
			<input type="text" name="Link 10" placeholder="Link 2">
			<input type="text" name="Link 11" placeholder="Link 3">
			<input type="text" name="Link 12" placeholder="Link 4">
			<input type="submit" name="submit" value="Submit" Class="Button3">
		</ul>
	</footer>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js.js"></script>
</div>
</body>
</html>