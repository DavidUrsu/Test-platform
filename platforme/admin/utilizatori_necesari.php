<?php include'../functii/functii.php'; session_start(); verificare_statut("admin"); 
    
    $db = mysqli_connect("localhost", "root", "", "test");
    mysqli_query($db, "INSERT INTO `utilizatori` (`ID`, `parola`, `statut`, `clasa`) VALUES ('elev', 'elev','elev', '10D'), ('profesor', 'profesor', 'profesor', ''), ('admin', 'admin', 'admin', ''); ");

    header("location: ../admin.php");
?>