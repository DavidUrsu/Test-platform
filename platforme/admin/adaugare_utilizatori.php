<?php include'../functii/functii.php'; session_start(); verificare_statut("admin"); 
    
    $citire=file('utilizatori.txt');
    $db = mysqli_connect('localhost', 'root', '', 'test');
    foreach($citire as $line){

        $words = preg_split('/[\s]+/', $line, -1, PREG_SPLIT_NO_EMPTY);
        $query = "INSERT INTO `utilizatori` (`ID`, `parola`, `statut`, `clasa`) 
                    VALUES ('".$words[0]."', '', '".$words[1]."' , '".$words[2]."');";
        echo($query);
        mysqli_query($db, $query);
    }

    header("location: ../admin.php");
?>