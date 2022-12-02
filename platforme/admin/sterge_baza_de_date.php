<?php include'../functii/functii.php'; session_start(); verificare_statut("admin"); 
    
    mysqli_query($db_test, "DROP DATABASE `test`;");
    mysqli_query($db_teste, "DROP DATABASE `teste`;");

    header("location: ../admin.php");
?>