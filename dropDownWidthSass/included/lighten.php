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