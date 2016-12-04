<?php session_start(); ?>
<meta charset="utf-8"> <!-- fyrir íslensk stafamengi -->
<title>Registration Error</title>
<link rel="stylesheet" type="text/css" href="../DropDead.css">

<?php
// sækja skrá sem geymir tengingu við gagnagrunn
require_once("connection.php");
include("query4.php");

// erum hér að ná í playerinn úr forminu
$Usernafn = $_POST['userUsername'];
$Passord = $_POST['userPassword'];
$profilePic = $_POST['userProfilePic'];
$Nafn = $_POST['userNafn'];
$Teljari = 0;
$Tjekk = 0;

foreach ($User as $k)
{
	if ($k[0] != $Usernafn){$Teljari++;}
	elseif ($k[0] == $Usernafn){$Teljari = 0;}
	if ($Teljari == 0){$Tjekk = 1;}
}

$Username=isset($_SESSION['UserData']['Username']) ? $_SESSION['UserData']['Username'] : '';
$Password=isset($_SESSION['UserData']['Password']) ? $_SESSION['UserData']['Password'] : '';
$dataUser = null;

foreach ($User as $k)
{
	if ($k[0] == $Username && $k[1] == $Password){$dataUser = [$k[0], $k[1], $k[2], $k[3], $k[4]];break;}
}
$oldUsernafn = $dataUser[0];
$userID = $dataUser[4];
	
if ($Usernafn == $oldUsernafn) {$Tjekk = 0;}

//er hérna að athuga hvort breyturnar séu ekki tómar
if(!empty($Usernafn) && !empty($Passord) && !empty($profilePic) && !empty($Nafn) && $Tjekk != 1)
{
	// SQL skipun/fyrirspurnin - gott að athuga fyrst hvort hún sé rétt  með að skrifa í og prófa í phpmyadmin eða workbench 
	// hér erum við að nota placeholder (er með : á undan) fyrir gildi úr $_POST fylki.
	$sql = "UPDATE tafla SET Usernafn=':Usernafn', Password=':Passord', profilePic=':profilePic', Nafn=':Nafn' WHERE ID=':userID';"; 
	
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
		$q->bindValue(':Usernafn',$Usernafn);
		$q->bindValue(':Passord',$Passord);
		$q->bindValue(':profilePic',$profilePic);
		$q->bindValue(':Nafn',$Nafn);
		$q->bindValue(':userID',$userID);

		// execute segir MySQL að framkvæma SQL kóða á gagnagrunn með gildunum.
		$q->execute();  
		echo "Það tókst að skrifa eftirfarandi upplýsingar í gagnagrunn<br>";
		echo "Username: ".$Usernafn.", Password: ".$Passord.", Profile Picture: ".$profilePic.", Name: ".$Nafn;
		echo("<br><a href='../index.php'>Til baka</a>");
	}
	//
	catch (PDOException $ex){
		echo 'Það tókst ekki að skrifa í gagnagrunn: '.$ex->getMessage();
	}

}
elseif ($Tjekk == 1)
{
	echo 'Það tókst ekki að skrifa í gagnagrunn. Notandanafn nú þegar í notkun.';
	echo("<br><a href='../index.php'>Til baka</a>");
}
else
{
	echo 'Það tókst ekki að skrifa í gagnagrunn.';
	echo("<br><a href='../index.php'>Til baka</a>");
}
?>