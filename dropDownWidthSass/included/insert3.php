<?php session_start(); ?>
<meta charset="utf-8"> <!-- fyrir íslensk stafamengi -->
<title>Registration Error</title>
<link rel="stylesheet" type="text/css" href="../DropDead.css">

<?php
$profilePic = $_POST['userProfilePic'];
$Nafn = $_POST['userNafn'];
$Username  = $_SESSION['UserData']['Username'];

//er hérna að athuga hvort breyturnar séu ekki tómar
if(!empty($profilePic) && !empty($Nafn))
{
try{
							$servername = "tsuts.tskoli.is";
							$username = "2804992349";
							$password = "mypassword";
							$dbname = "2804992349_collabwithsi";

					// Create connection
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
					    die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "UPDATE tafla SET profilePic='".$profilePic."', Nafn='".$Nafn."'  WHERE Usernafn='".$Username."'";

					if (mysqli_query($conn, $sql)) {
					    echo "Record updated successfully";
					} else {
					    echo "Error updating record: " . mysqli_error($conn);
					}

					mysqli_close($conn);

		echo "Það tókst að skrifa eftirfarandi upplýsingar í gagnagrunn<br>";
		echo "Profile Picture: ".$profilePic.", Name: ".$Nafn;
		
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
?>