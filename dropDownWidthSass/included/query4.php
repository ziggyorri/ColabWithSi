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
 ?>