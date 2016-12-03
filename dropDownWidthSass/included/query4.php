<?php 
	try {
		$sql = "select Usernafn, Password, profilePic, Nafn FROM tafla";
		// PDO->query(); er notað fyrir SELECT statements ONLY, skilar object af PDOStatement class
		$result = $pdo ->query($sql);
		
	} catch (Exception $e) {
		echo "Ekki tókst að ná í gögnin". "<br>" . $e->getMessage();
	}
	// fetch() sækir eina röð í einu frá database.
	while($row = $result -> fetch()){
		$User[] = array($row['Usernafn'], $row['Password'], $row['profilePic'], $row['Nafn']);
	}

	$Username=isset($_SESSION['UserData']['Username']) ? $_SESSION['UserData']['Username'] : '';
	$Password=isset($_SESSION['UserData']['Password']) ? $_SESSION['UserData']['Password'] : '';
	$dataUser = null;

	foreach ($User as $k)
	{
    	if ($k[0] == $Username && $k[1] == $Password){$dataUser = [$k[0], $k[1], $k[2], $k[3]];break;}
    }
 ?>