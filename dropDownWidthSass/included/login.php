<?php session_start();

	require_once("connection.php");
	include("query.php");

	$Username=isset($_POST['Username']) ? $_POST['Username'] : '';$Password=isset($_POST['Password']) ? $_POST['Password'] : '';

	if(isset($_POST['Submit']))
	{
		foreach ($tafla as $k) {
        	if ($k[0] != $Username){}
        	elseif ($k[0] == $Username && $k[1] == $Password){$logins = [$k[0] => $k[1]];}
        }
		if(isset($logins[$Username])&&$logins[$Username]==$Password)
			{
				$_SESSION['UserData']['Username']=$logins[$Username];header("location:../index.php");exit;
			}
	} ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login/Register</title>
	<link rel="stylesheet" type="text/css" href="../DropDead.css">
</head>
<body>


	<form action="" method="post" name="Innskra">
		<table>
			<tr>
				<td><h1>Login</h1></td>
			</tr>
			<tr>
				<td><input name="Username" type="text" class="Input" placeholder="Username"></td>
			</tr>
			<tr>
				<td><input name="Password" type="password" class="Input" placeholder="Password"></td>
			</tr>
			<tr>
				<td><input name="Submit" type="submit" value="Login" class="Button3"></td>
			</tr>
		</table>
	</form>
	<form action="insert.php" method="post" Name="Register">
		<table>
			<tr>
				<td><h1>Register</h1></td>
			</tr>
			<tr>
			    <td><input type="text" name="RegisterUsername" placeholder="Username" required ></td>
		    </tr>
		    <tr>
			    <td><input type="password" name="RegisterPassword" placeholder="Password" required ></td>
		    </tr>
		    <tr>
		    	<td><input name="RegisterSubmit" type="submit" value="Register" class="Button3"></td>
		   	</tr>
	    </table>
	</form>


</body>
</html>