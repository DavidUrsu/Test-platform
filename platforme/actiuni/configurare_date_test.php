<?php
    include'../functii/functii.php';
    //verificare_statut("profesor");
    $clasa = $_POST['clasa'];
    $oficiu = $_POST['oficiu'];
    $nume_test = $_POST['nume_test'];

    mysqli_query($db_teste, "UPDATE `date_teste` SET `clasa`='$clasa',`oficiu`=$oficiu WHERE `nume_test`='$nume_test'");

    header("location: ../editare_test.php?nume_test=$nume_test")
?>
