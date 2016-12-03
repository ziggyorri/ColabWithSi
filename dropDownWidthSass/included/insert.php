<meta charset="utf-8"> <!-- fyrir íslensk stafamengi -->
<title>Registration Error</title>
<link rel="stylesheet" type="text/css" href="../DropDead.css">

<?php
// sækja skrá sem geymir tengingu við gagnagrunn
require_once("connection.php");
include("query.php");

// erum hér að ná í playerinn úr forminu
$Usernafn = $_POST['RegisterUsername'];
// erum hér að ná í skorið úr forminu, ath tölugildi koma sem strengur frá input í formi.
$Passord = $_POST['RegisterPassword'];
$Teljari = 0;
$Tjekk = 0;

foreach ($tafla as $k)
{
	if ($k[0] != $Usernafn){$Teljari++;}
	elseif ($k[0] == $Usernafn){$Teljari = 0;}
	if ($Teljari == 0){$Tjekk = 1;break;}
}

	


//er hérna að athuga hvort breyturnar séu ekki tómar
if(!empty($Usernafn) && !empty($Passord) && $Tjekk != 1)
{
	// SQL skipun/fyrirspurnin - gott að athuga fyrst hvort hún sé rétt  með að skrifa í og prófa í phpmyadmin eða workbench 
	// hér erum við að nota placeholder (er með : á undan) fyrir gildi úr $_POST fylki.
	$sql = 'INSERT INTO tafla(Usernafn, Password, profilePic)VALUES(:Usernafn,:Passord,"http://bit.ly/2gyDNpu")'; 
	
	// Prepare setning (e. statement) er sql fyrirspurn sem þú sendir til miðlara (e. server) áður en þú framkvæmir hana
	// þetta er gerir miðlaranum (MySQL) kleift að undirbúa sig fyrir keyrslu (kemur í veg árásir á gagnagrunn (SQL injection))
	// sql kóði ($sql) inniheldur "placeholder" sem mun geyma gildi þegar fyrirspurn er keyrð
	$q = $pdo->prepare($sql);

	try{
		// MySQL er núna tilbúið fyrir gildin í placeholders, 
		// Við sendum gildin með bindValue() aðferð sem PDOStatement object á ($q). 
		// Við köllum á þessa aðferð fyrir hvert og eitt gildi sem við sendum.
		// Þar sem MySQL veit á þessum tímapunkti að hann á von á gildi fremur en SQL kóða sem hann þarf ekki að þátta (e. parse)
		// þá komum við í veg fyrir að input frá notanda sé meðhöndlað sem SQL kóði (og keyrður) sem gæti hugsanlegt skemmt gagnagrunn okkar.
		$q->bindValue(':Usernafn',$Usernafn); // gildið í $player er sett í placeholder player og sent.
		$q->bindValue(':Passord',$Passord);

		// execute segir MySQL að framkvæma SQL kóða á gagnagrunn með gildunum.
		$q->execute();  
		echo "Það tókst að skrifa eftirfarandi upplýsingar í gagnagrunn<br>";
		echo "Usernafn: $Usernafn og Passord: $Passord";
		echo("<br><a href='login.php'>Til baka</a>");
	}
	//
	catch (PDOException $ex){
		echo 'Það tókst ekki að skrifa í gagnagrunn: '.$ex->getMessage();
	}

}
elseif ($Tjekk == 1)
{
	echo 'Það tókst ekki að skrifa í gagnagrunn. Notandanafn nú þegar í notkun.';
	echo("<br><a href='login.php'>Til baka</a>");
}
else
{
	echo 'Það tókst ekki að skrifa í gagnagrunn.';
	echo("<br><a href='login.php'>Til baka</a>");
}
?>