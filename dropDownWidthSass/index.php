<?php session_start();if(!isset($_SESSION['UserData']['Username'])){header("location:included/login.php");exit;}
require_once('./included/connection.php');
include("./included/query2.php");
$currentPage = '1';
$ID = '1';
if (isset($_GET['viID'])) {
	$ID = $_GET['viID'];
}

$vidburdsTafla = null;

foreach ($vidburdur as $k)
{
	if ($k[0] == $ID) {$vidburdsTafla = $k;}
}
$heiti = $vidburdsTafla[1];
$imgUrl = $vidburdsTafla[2];
$lysing = $vidburdsTafla[3];
$dags = $vidburdsTafla[4];
$litir1 = $vidburdsTafla[5];
$litir2 = $vidburdsTafla[6];
$litir3 = $vidburdsTafla[7];

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
	<title><?php echo $heiti; ?></title>
	<link rel="stylesheet" type="text/css" href="DropDead.css">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<style type="text/css">
		body{
			color: <?php echo $litir3 ?>;
			background-color:<?php echo $litir2 ?>;
		}
		nav ul li ul li,
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
<div id="mainbody1" class="mainbody">
<?php include("./included/navbar.php"); ?>
	<div id="titleID" class="title"><?php echo $heiti; ?></div>

	<div id="img"><?php echo '<img src="'. $imgUrl . '">'; ?></div>
	

	<div id="heading1" class="main">
	<?php 
	$lysingLoka = explode('◘', $lysing);
		for ($i = 0; $i < count($lysingLoka); $i++) { 
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
	</div>
<div id="info" class="Price">
		<?php 
		$dagsLoka = explode('◘', $dags);
		for ($i=0; $i < count($dagsLoka)-1; $i++) { 
			echo '<div class="meh"><h3>'.$dagsLoka[$i].'</h3></div>';
		}
		if (count($dagsLoka)>=1) {
			echo '<div><h3>'.$dagsLoka[count($dagsLoka)-1].'</h3></div>';
		}
		?>
	</div>
<?php include("./included/footer.php"); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js.js"></script>
</div>
</body>
</html>
<?php 
function brighten($color, $prosent){
	if (count($color)==7) {
		$R=$color[1].$color[2];
		$G=$color[3].$color[4];
		$B=$color[5].$color[6];

	}
}
function hexOc($hex){
	if (is_numeric($hex)) {
		return $hex;
	}
	else{
		switch ($hex) {
			case 'A':
			return '10';
			break;
			case 'B':
			return '11';
			break;
			case 'C':
			return '12';
			break;
			case 'D':
			return '13';
			break;
			case 'E':
			return '14';
			break;
			case 'F':
			return '15';
			break;
			default:
			return 'F';
			break;
		}
	}
}

function RGB($litir, $Ret){
$R = hexOc($litir[1])*16+hexOc($litir[2]);//breit í tvíundakerfi
$G = hexOc($litir[3])*16+hexOc($litir[4]);//breit í tvíundakerfi
$B = hexOc($litir[5])*16+hexOc($litir[6]);//breit í tvíundakerfi
$proT = '11';//% tala
if($R-5*($B+$G>10) || $G-5*($B+$R>10) || $B-5*($R+$G>10)) 				//extream colors
{				
	$proT='70';
	$R = ceil($R+(($R)*$proT/100));//uppýstur um % tölu    		heldur lit
		$G = ceil($G+(($G)*$proT/100));//uppýstur um % tölu
		$B = ceil($B+(($B)*$proT/100));//uppýstur um % tölu

		if ($R>255) {$R=255;}
		if ($G>255) {$G=255;}
		if ($B>255) {$B=255;}
}
else{																//less so
	$R = ceil($R+((255-$R)*$proT/100));//uppýstur um % tölu		feided
	$G = ceil($G+((255-$G)*$proT/100));//uppýstur um % tölu
	$B = ceil($B+((255-$B)*$proT/100));//uppýstur um % tölu
}
switch ($Ret) {
		case '1':
			return $R;
		break;
		case '2':
			return $G;
		break;
		case '3':
			return $B;
		break;
	
	default:
		# code...
		break;
}
}
?>