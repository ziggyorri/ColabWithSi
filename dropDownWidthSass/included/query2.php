<?php 
	try {
		$sql = "select ID, heiti, imgUrl, lysing, dags, litir1, litir2, litir3 FROM vidburdur";
		// PDO->query(); er notað fyrir SELECT statements ONLY, skilar object af PDOStatement class
		$result = $pdo ->query($sql);
		
	} catch (Exception $e) {
		echo "Ekki tókst að ná í gögnin". "<br>" . $e->getMessage();
	}
	// fetch() sækir eina röð í einu frá database.
	while($row = $result -> fetch()){
		$vidburdur[] = array($row['ID'], $row['heiti'], $row['imgUrl'], $row['lysing'], $row['dags'], $row['litir1'], $row['litir2'], $row['litir3']);
	}
 ?>