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
<form action="" method="post" name="Innskra">
	<table>
		<tr>
			<td><h1>Login</h1></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input name="Username" type="text" class="Input" style="color:#888;" value="admin" onfocus="inputFocus(this)" onblur="inputBlur(this)"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input name="Password" type="password" class="Input" value="12345" onfocus="inputFocus(this)" onblur="inputBlur(this)"></td>
		</tr>
		<tr>
			<td><input name="Submit" type="submit" value="Login" class="Button3"></td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function inputFocus(i){
	    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
	}
	function inputBlur(i){
	    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
	}
</script>