<?php session_start();if(!isset($_SESSION['UserData']['Username'])){header("location:../included/login.php");exit;}
require_once('../included/connection.php');
/*list($width, $height) = getimagesize("http://bit.ly/2g6lqsi");
echo($width." ".$height);*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Viðburða</title>
	<link rel="stylesheet" type="text/css" href="../DropDead.css">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
</head>
<body>
<form action="../included/insert2.php" method="post" Name="indexForm">
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

	<div class="opnun">
	<h2>Opnunartímar</h2>
		<div class="meh">Virka Daga: <h3>9:00 - 18:00</h3></div>

		<div>Helgar: <h3>10:00 - 18:00</h3></div>
	</div>
		<div id="mapi">
			<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13918.706224510119!2d-21.934276045776542!3d64.14662947364903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48d674d3023a19c7%3A0xdbbf050da40f5d28!2sHarpan%2C+101+Reykjav%C3%ADk!5e0!3m2!1sis!2sis!4v1478866535521" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="Price">
			<input type="text" name="color1" placeholder="Dark Color">
			<input type="text" name="color2" placeholder="Light Color">
			<input type="text" name="color3" placeholder="Font Color">
			<input type="submit" name="submit" value="Submit" Class="Button3">
		</div>
		

	<footer>
		<ul>
		Harpa
			<li><a href="">Austurbakka 2, 101 Reykjavík</a></li>
			<li><a href="">Sími: 528 5000</a></li>
			<li><a href="">Miðasala: 528 5050</a></li>
			<li><a href="">harpa@harpa.is</a></li>
		</ul>
		<ul>
		Íbúar
			<li><a href="">Sinfóníuhljómsveit Íslands</a></li>
			<li><a href="">Íslenska óperan</a></li>
			<li><a href="">Stórsveit Reykjavíkur</a></li>
			<li><a href="">Maxímús Músíkús</a></li>
		</ul>
		<ul id="ref">
		referenslist
			<li><a href="https://www.harpa.is/">https://www.harpa.is/</a></li><!--https://www.harpa.is/dagskra/vidburdur/icelandic-sagas/-->
			<li><a href="http://www.w3schools.com/">http://www.w3schools.com/</a></li>
			<li><a href="http://stackoverflow.com/">http://stackoverflow.com/</a></li>
		</ul>
	</footer>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../js.js"></script>
</div>
</body>
</html>