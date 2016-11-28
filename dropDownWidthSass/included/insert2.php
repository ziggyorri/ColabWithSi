<meta charset="utf-8"> <!-- fyrir íslensk stafamengi -->
<title>New Page</title>
<link rel="stylesheet" type="text/css" href="../DropDead.css">
<meta name="viewport" content="width=device-width">

<?php
// sækja skrá sem geymir tengingu við gagnagrunn
require_once("connection.php");

$heiti = $_POST['heiti'];
$imgUrl = $_POST['imgUrl'];
$lysingTemp = $_POST['lysing'];
$sublysing = explode("\n\n", $lysingTemp);
$lysing = null;
for ($i=0; $i < (count($sublysing)-1); $i++) { 
	$lysing = $lysing.$sublysing[$i]. "◘";
}
$lysing = $lysing.$sublysing[count($sublysing)-1];
$dagsTemp = $_POST['dags'];
$timi = $_POST['timi'];
$showIn = $_POST['shownIn'];
$price = $_POST['price'];
$dags = $dagsTemp."◘".$timi."◘".$showIn."◘".$price;
$litur1 = "black";
$litur2 = "darkred";
$litur3 = "#123";
if (!empty($_POST['color1']) && !empty($_POST['color2']) && !empty($_POST['color3'])) {
	$litur1 = $_POST['color1'];
	$litur2 = $_POST['color2'];
	$litur3 = $_POST['color3'];
}


	


//er hérna að athuga hvort breyturnar séu ekki tómar
if(!empty($heiti) && !empty($imgUrl) && !empty($dags))
{
	// SQL skipun/fyrirspurnin - gott að athuga fyrst hvort hún sé rétt  með að skrifa í og prófa í phpmyadmin eða workbench 
	// hér erum við að nota placeholder (er með : á undan) fyrir gildi úr $_POST fylki.
	$sql = 'INSERT INTO tafla(heiti, imgUrl, lysing, dags, litir1, litir2, litir3)VALUES(:heiti,:imgUrl,:lysing,:dags,:litur1,:litur2,:litur3)'; 
	
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
		$q->bindValue(':heiti',$heiti);
		$q->bindValue(':imgUrl',$imgUrl);
		$q->bindValue(':lysing',$lysing);
		$q->bindValue(':dags',$dags);
		$q->bindValue(':litur1',$litur1);
		$q->bindValue(':litur2',$litur2);
		$q->bindValue(':litur3',$litur3);


		// execute segir MySQL að framkvæma SQL kóða á gagnagrunn með gildunum.
		$q->execute();  
		echo "Það tókst að skrifa eftirfarandi upplýsingar í gagnagrunn<br>";
		echo "Title: ".$heiti."\n\n\nImage URL: ".$imgUrl."\n\n\nLýsing: ".$lysingTemp."\n\n\nDate: ".$dagsTemp."\n\n\nTime: ".$timi."\n\n\nLocation: ".$showIn."\n\n\nPrice: ".$price."\n\n\nColors: ".$litur1.", ".$litur2." & ".$litur3;
		echo("<br><a href='../index.php'>Til baka</a>");
	}
	//
	catch (PDOException $ex){
		echo 'Það tókst ekki að skrifa í gagnagrunn: '.$ex->getMessage();
		echo("<br><a href='../index.php'>Til baka</a>");
	}

}
else
{
	echo 'Það tókst ekki að skrifa í gagnagrunn.';
	echo("<br><a href='../index.php'>Til baka</a>");
}
?>