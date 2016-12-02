<?php session_start();if(!isset($_SESSION['UserData']['Username'])){header("location:../included/login.php");exit;} 
require_once('./included/connection.php');

$vidburdsTafla = null;

foreach ($vidburdur as $k)
{
$vidburdsTafla = $k;

$id = $vidburdsTafla[0];
$heiti = $vidburdsTafla[1];
$imgUrl = $vidburdsTafla[2];
$litir1 = $vidburdsTafla[3];
$litir2 = $vidburdsTafla[4];
$litir3 = $vidburdsTafla[5];
echo '<div class="thumbnail"><img class="thumbnailImg" src="'.$imgUrl.'"></div>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="mainbody1" class="mainbody">
<?php include '../included/navbar.php'; ?>
<div class="thumbnail"><img class="thumbnailImg" src=""></div>

</div>
<a href=""></a>
</body>
</html>