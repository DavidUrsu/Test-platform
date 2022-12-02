<?php include'../functii/functii.php'; session_start(); verificare_statut("admin"); 
    
    $db = mysqli_connect('localhost', 'root', '', 'test');
    mysqli_query($db, "DELETE FROM `utilizatori`");


    header("location: ../admin.php");
?>