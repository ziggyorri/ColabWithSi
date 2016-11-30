<?php session_start();if(!isset($_SESSION['UserData']['Username'])){header("location:included/login.php");exit;}
require_once('./included/connection.php');
$ID = '1';
if (isset($_POST['vidburdurID'])) {
	$ID = $_POST['vidburdurID'];
}
//sækja gögn úr gaggnagrunni
	if ($litur2[0]=='#') {
		if (strlen(litur2)==4) {
			$R = $litur2[1];
			$G = $litur2[2];
			$B = $litur2[3];
		}
		else if (strlen(litur2)==7) {
			$R = $litur2[1].$litur2[2];
			$G = $litur2[3].$litur2[4];
			$B = $litur2[5].$litur2[6];
		}
		/*FA8000 = 244.128.0
F58D1A = 245.141.26		+1.+13.+26
F69933 = 246.153.51		+1.+12.+25
F7A64D = 247.166.77		+1.+13.+26
F8B366 = 248.179.102	+1.+13.+25
						+1.+13.+26
						+2.+13.+25
						+1.+12.+26*/
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>drop down</title>
	<link rel="stylesheet" type="text/css" href="DropDead.css">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<style type="text/css">
		body{
			color: <?php $litir3 ?>
		}
		a{
			color: <?php $litir3 ?>
		}
	</style>
</head>
<body>
<div id="mainbody1" class="mainbody">
<div class="navcontainer">
<input type="checkbox" id="toggle">
	<label for="toggle">&#9776menu</label>
<nav>
      <ul>
		<li>
			<input type="checkbox" id="tog1">
			<label class="undirtoggle" for="tog1">Current page</label>
			<ul>
				<li><a id="link1" href="#">Discription</a></li>
				<li><a id="link2" href="#">Map</a></li>
				<li><a id="link3" href="#">Other info</a></li>
				<li><a id="link4" href="#">Contacts</a></li>
			</ul>
		</li>
		<li>
			<input type="checkbox" id="tog2">
			<label class="undirtoggle" for="tog2">Top tengill</label>
			<ul>
				<li><a onclick="" href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
			</ul>
		</li>
		<li>
			<input type="checkbox" id="tog3">
			<label class="undirtoggle" for="tog3">Top tengill</label>
			<ul>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
				<li><a href="#">tengill</a></li>
			</ul>
		</li>
		<li><a href="included/logout.php">Logout</a>
			
		</li>
	</ul>
</nav>
</div>
	<div id="titleID" class="title"><?php echo $heiti; ?>
	<!--ICELANDIC SAGAS: Sýning til stuðnings Amnesty International--></div>

	<div id="img"><?php echo '<img src="'. $imgUrl . '">'; ?>
	<!--<img src="https://www.harpa.is/wp-content/uploads/2016/11/1600x500.jpg">--></div>
	

	<div id="heading1" class="main">
	<?php 
	$lysingLoka= explode('◘', $lysing)
		for ($i=0; $i < count($lysingLoka); $i++) { 
			if ($i==0) {
				echo "<div>";
				echo $lysingLoka[$i];
				echo "</div>";
			}
			else{
				echo "<p>";
				echo $lysingLoka[$i];
				echo "</p>";
			}
		}
	 ?>
		<!--<div>Hinn 12. nóvember verður sýningin Icelandic Sagas: The Greatest Hits in 75 minutes haldin í Hörpu til stuðnings Amnesty International. Allir listamennirnir gefa vinnu sína og rennur ágóðinn til Amnesty International. Aðstandendur sýningar ákváðu að halda sýninguna til stuðnings þeirra vegna flóttamannakrísunnar sem nú ríkir í heiminum og baráttu Amnesty International fyrir málefnum flóttafólks.</div>

		<p>Tveir af frambærilegustu leikurum þjóðarinnar kynna Íslendingasögurnar – Brot af því besta á 75 mínútum – Stórskemmtilega leikhús rússíbanareið í gegnum þjóðararf íslensku fornbókmenntanna.</p>

		<p>Íslendingasögurnar eru 40 sannar sögur af fyrstu kynslóðum íslenskra landnema – Það er að segja Íslendingar segja að þær séu sannar. Flestir aðrir segja: Nei Heyrðu nú Hemmi minn!</p>

		<p>Allir geta hinsvegar verið sammála því að þær eru stórbrotnar sögur af dugandi mönnum og djörfum konum. Rúmlega þúsund ára gamlar frásagnir af strandhöggi erlendis og blóðhefndum heima fyrir. Sögur sem gengið hafa mann fram af manni og varðveist á skinnhandritum.</p>

		<p>Íslendingasögurnar eru skínandi krúnudjásn íslenskrar þjóðmenningar, raunsannar lýsingar af ofurvenjulegum víkingum sem kljást við við ofurvenjuleg víkingavandamál – Eins og hvernig maður fær konuna sína til að hætta drepa þræla nágrananna, hvernig eigi að bregðast við þegar manni er sagt að stanga rassgarnarenda merarinnar úr tönnunum og hvernig eigi að hefja málaferli við mág sinn fyrir að standa ekki undir… væntingum eiginkonu sinnar.</p>

		<p>Velkomin í heim Hallgerðar Langbrókar, Gunnlaugs Orms-Tungu, Víga-Glúms, Haraldar Hárfagra, Mjallar sem-stærst-var-allra-kvenna-sem-ekki-voru-risar og Leifs Heppna sem fann Ameríku… og týndi henni aftur.</p>

		<p>Þú hittir þau öll í Íslendingasögurnar – Brot af því besta á 75 mínútum. Leyfið sögunum að hrífa ykkur, uppfræða og skemmta – og komist að því hvað það merkir að kasta bláum brókum upp í opið geðið á fólki. Í alvöru.</p>
-->
	</div>
<div id="info" class="Price">
		<?php 
		$dagsLoka = explode('◘', $dags);
		for ($i=0; $i < count($dagsLoka)-1; $i++) { 
			echo '<div class="meh"><h3>'.$dagsLoka[$i].'</h3></div>';
		}
		if (count($dagsLoka)>=1) {
			echo '<div><h3>'.$dagsLoka[count($dagsLoka-1)].'</h3></div>';
		}
		?>
		<!--<div class="meh"><h2>Date</h2><h3>12.november 2016</h3><h3>4:00pm</h3></div>

		<div class="meh">Shown in<h3>Norðurljóst</h3></div>

		<div>Price <h3>4.900</h3></div>-->
	</div>

	<div class="opnun">
	<h2>Opnunartímar</h2>
		<div class="meh">Virka Daga: <h3>9:00 - 18:00</h3></div>

		<div>Helgar: <h3>10:00 - 18:00</h3></div>
	</div>
		<div id="mapi">
			<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13918.706224510119!2d-21.934276045776542!3d64.14662947364903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48d674d3023a19c7%3A0xdbbf050da40f5d28!2sHarpan%2C+101+Reykjav%C3%ADk!5e0!3m2!1sis!2sis!4v1478866535521" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js.js"></script>
</div>
</body>
</html>