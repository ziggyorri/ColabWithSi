<?php 
function hexOc($hex){
	if (is_numeric($hex)) {
		return $hex;
	}
	else{
		switch (strtoupper($hex)) {
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
$proT='70';
	$R = ceil($R+(($R)*$proT/100));//uppýstur um % tölu    		heldur lit
	$G = ceil($G+(($G)*$proT/100));//uppýstur um % tölu
	$B = ceil($B+(($B)*$proT/100));//uppýstur um % tölu

		if ($R>255) {$R=255;}
		if ($G>255) {$G=255;}
		if ($B>255) {$B=255;}

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