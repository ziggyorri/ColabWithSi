<meta charset="utf-8"> <!-- fyrir íslensk stafamengi -->
<title>New Page</title>
<link rel="stylesheet" type="text/css" href="../DropDead.css">
<meta name="viewport" content="width=device-width">

<?php
require_once("connection.php");

$heiti = $_POST['heiti'];
$imgUrl = $_POST['imgUrl'];
$imgUrl = Image_Size_From_URL($imgUrl);
$lysingTemp = $_POST['lysing'];
$sublysing = explode("\r\n\r\n", $lysingTemp);
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
$litur1 = "#000000";
$litur2 = "#8B0000";
$litur3 = "#112233";
if (!empty($_POST['color1']) && !empty($_POST['color2']) && !empty($_POST['color3'])) {
    if (strpos($_POST['color2'], '#')!== false) //ekki ekki (double negative)
    {
        if (srtlen($litur2) == 7){$litur2 = $_POST['color2'];}
        if (srtlen($litur3) == 7){$litur3 = $_POST['color3'];}        
        if (srtlen($litur2) == 4){$litur2 = '#'.$litur2[1].$litur2[1].$litur2[2].$litur2[2].$litur2[3].$litur2[3];
            $litur2 = $_POST['color2'];}
        if (srtlen($litur3) == 4){$litur3 = '#'.$litur3[1].$litur3[1].$litur3[2].$litur3[2].$litur3[3].$litur3[3];
            $litur3 = $_POST['color3'];}
    }
    else{
    	$litur2 = color_name_to_hex($_POST['color2']);
        $litur3 = color_name_to_hex($_POST['color3']);
	}
}





//er hérna að athuga hvort breyturnar séu ekki tómar
if(!empty($heiti) && !empty($imgUrl) && !empty($dags))
{
	// SQL skipun/fyrirspurnin - gott að athuga fyrst hvort hún sé rétt  með að skrifa í og prófa í phpmyadmin eða workbench 
	// hér erum við að nota placeholder (er með : á undan) fyrir gildi úr $_POST fylki.
	$sql = 'INSERT INTO vidburdur(heiti, imgUrl, lysing, dags, litir1, litir2, litir3)VALUES(:heiti,:imgUrl,:lysing,:dags,:litur1,:litur2,:litur3)'; 
	
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
		echo "<br>Það tókst að skrifa eftirfarandi upplýsingar í gagnagrunn<br>";
		echo "<br> <br> <br>Title: ".$heiti."<br> <br>Image URL: ".$imgUrl."<br> <br>Lýsing: ".$lysingTemp."<br> <br>Date: ".$dagsTemp."<br> <br>Time: ".$timi."<br> <br>Location: ".$showIn."<br> <br>Price: ".$price."<br> <br>Colors: ".$litur1.", ".$litur2." & ".$litur3."<br> <br> <br>";
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

function color_name_to_hex($color_name)
{
    // standard 147 HTML color names
    $colors  =  array(
        'aliceblue'=>'F0F8FF',
        'antiquewhite'=>'FAEBD7',
        'aqua'=>'00FFFF',
        'aquamarine'=>'7FFFD4',
        'azure'=>'F0FFFF',
        'beige'=>'F5F5DC',
        'bisque'=>'FFE4C4',
        'black'=>'000000',
        'blanchedalmond '=>'FFEBCD',
        'blue'=>'0000FF',
        'blueviolet'=>'8A2BE2',
        'brown'=>'A52A2A',
        'burlywood'=>'DEB887',
        'cadetblue'=>'5F9EA0',
        'chartreuse'=>'7FFF00',
        'chocolate'=>'D2691E',
        'coral'=>'FF7F50',
        'cornflowerblue'=>'6495ED',
        'cornsilk'=>'FFF8DC',
        'crimson'=>'DC143C',
        'cyan'=>'00FFFF',
        'darkblue'=>'00008B',
        'darkcyan'=>'008B8B',
        'darkgoldenrod'=>'B8860B',
        'darkgray'=>'A9A9A9',
        'darkgreen'=>'006400',
        'darkgrey'=>'A9A9A9',
        'darkkhaki'=>'BDB76B',
        'darkmagenta'=>'8B008B',
        'darkolivegreen'=>'556B2F',
        'darkorange'=>'FF8C00',
        'darkorchid'=>'9932CC',
        'darkred'=>'8B0000',
        'darksalmon'=>'E9967A',
        'darkseagreen'=>'8FBC8F',
        'darkslateblue'=>'483D8B',
        'darkslategray'=>'2F4F4F',
        'darkslategrey'=>'2F4F4F',
        'darkturquoise'=>'00CED1',
        'darkviolet'=>'9400D3',
        'deeppink'=>'FF1493',
        'deepskyblue'=>'00BFFF',
        'dimgray'=>'696969',
        'dimgrey'=>'696969',
        'dodgerblue'=>'1E90FF',
        'firebrick'=>'B22222',
        'floralwhite'=>'FFFAF0',
        'forestgreen'=>'228B22',
        'fuchsia'=>'FF00FF',
        'gainsboro'=>'DCDCDC',
        'ghostwhite'=>'F8F8FF',
        'gold'=>'FFD700',
        'goldenrod'=>'DAA520',
        'gray'=>'808080',
        'green'=>'008000',
        'greenyellow'=>'ADFF2F',
        'grey'=>'808080',
        'honeydew'=>'F0FFF0',
        'hotpink'=>'FF69B4',
        'indianred'=>'CD5C5C',
        'indigo'=>'4B0082',
        'ivory'=>'FFFFF0',
        'khaki'=>'F0E68C',
        'lavender'=>'E6E6FA',
        'lavenderblush'=>'FFF0F5',
        'lawngreen'=>'7CFC00',
        'lemonchiffon'=>'FFFACD',
        'lightblue'=>'ADD8E6',
        'lightcoral'=>'F08080',
        'lightcyan'=>'E0FFFF',
        'lightgoldenrodyellow'=>'FAFAD2',
        'lightgray'=>'D3D3D3',
        'lightgreen'=>'90EE90',
        'lightgrey'=>'D3D3D3',
        'lightpink'=>'FFB6C1',
        'lightsalmon'=>'FFA07A',
        'lightseagreen'=>'20B2AA',
        'lightskyblue'=>'87CEFA',
        'lightslategray'=>'778899',
        'lightslategrey'=>'778899',
        'lightsteelblue'=>'B0C4DE',
        'lightyellow'=>'FFFFE0',
        'lime'=>'00FF00',
        'limegreen'=>'32CD32',
        'linen'=>'FAF0E6',
        'magenta'=>'FF00FF',
        'maroon'=>'800000',
        'mediumaquamarine'=>'66CDAA',
        'mediumblue'=>'0000CD',
        'mediumorchid'=>'BA55D3',
        'mediumpurple'=>'9370D0',
        'mediumseagreen'=>'3CB371',
        'mediumslateblue'=>'7B68EE',
        'mediumspringgreen'=>'00FA9A',
        'mediumturquoise'=>'48D1CC',
        'mediumvioletred'=>'C71585',
        'midnightblue'=>'191970',
        'mintcream'=>'F5FFFA',
        'mistyrose'=>'FFE4E1',
        'moccasin'=>'FFE4B5',
        'navajowhite'=>'FFDEAD',
        'navy'=>'000080',
        'oldlace'=>'FDF5E6',
        'olive'=>'808000',
        'olivedrab'=>'6B8E23',
        'orange'=>'FFA500',
        'orangered'=>'FF4500',
        'orchid'=>'DA70D6',
        'palegoldenrod'=>'EEE8AA',
        'palegreen'=>'98FB98',
        'paleturquoise'=>'AFEEEE',
        'palevioletred'=>'DB7093',
        'papayawhip'=>'FFEFD5',
        'peachpuff'=>'FFDAB9',
        'peru'=>'CD853F',
        'pink'=>'FFC0CB',
        'plum'=>'DDA0DD',
        'powderblue'=>'B0E0E6',
        'purple'=>'800080',
        'red'=>'FF0000',
        'rosybrown'=>'BC8F8F',
        'royalblue'=>'4169E1',
        'saddlebrown'=>'8B4513',
        'salmon'=>'FA8072',
        'sandybrown'=>'F4A460',
        'seagreen'=>'2E8B57',
        'seashell'=>'FFF5EE',
        'sienna'=>'A0522D',
        'silver'=>'C0C0C0',
        'skyblue'=>'87CEEB',
        'slateblue'=>'6A5ACD',
        'slategray'=>'708090',
        'slategrey'=>'708090',
        'snow'=>'FFFAFA',
        'springgreen'=>'00FF7F',
        'steelblue'=>'4682B4',
        'tan'=>'D2B48C',
        'teal'=>'008080',
        'thistle'=>'D8BFD8',
        'tomato'=>'FF6347',
        'turquoise'=>'40E0D0',
        'violet'=>'EE82EE',
        'wheat'=>'F5DEB3',
        'white'=>'FFFFFF',
        'whitesmoke'=>'F5F5F5',
        'yellow'=>'FFFF00',
        'yellowgreen'=>'9ACD32');

    $color_name = strtolower($color_name);
    if (isset($colors[$color_name]))
    {
        return ('#' . $colors[$color_name]);
    }
    else
    {
        return(null);
    }
}

function Image_Size_From_URL ($image_URL)
{
    try
    {
        List($width, $height) = getimagesize($image_URL);
    	if ($height/$width >= 1/1.3)
    	{
            echo('<script>alert("Please use an image with the height/width ratio 1/1.3 or less.")</script>');
    		return(null);
    	}
        else
        {
            return($image_URL);
        }
    }
    catch (Exception $e)
    {
        echo('<script>alert("Please put a valid image in a valid URL format into the form.")</script>');
    }
}
?>