<?php
	include'../functii/functii.php'; session_start(); verificare_statut("admin");
	
	$db = mysqli_connect('localhost', 'root', '', 'test');
	$query = "SELECT DISTINCT * FROM utilizatori";
	$result = mysqli_query($db, $query);
    $scriere=fopen('parole.txt', "w");
    
	for($i=1; $i<=mysqli_num_rows($result); $i=$i+1){
        $row=mysqli_fetch_array($result);
		$dictionar = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ0123456789";
        $parola = "";
	
		for($x = 0; $x <= 4;$x++)
		{
			$random = mt_rand(0,strlen($dictionar)-1);
			$caracter = substr($dictionar,$random,1);
			$parola[$x] = $caracter;
		}
		$query = "  UPDATE utilizatori
                    SET parola = '$parola' 
                    WHERE ID='".$row[0]."';";

        mysqli_query($db,$query);
		echo $query."<br>";
		fwrite($scriere, $row[0]." $parola \n");
	}

	header("location: ../admin.php");
?>