<?php session_start();if(!isset($_SESSION['UserData']['Username'])){header("location:../included/login.php");exit;} 
require_once('./included/connection.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="mainbody1" class="mainbody">
<?php include '../included/navbar.php'; ?>

</div>
<a href=""></a>
</body>
</html>