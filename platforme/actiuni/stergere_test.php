<?php
    include '../functii/functii.php';
    print_r($_POST);
    $nume_test = $_POST["nume_test"];
    $query = "DROP TABLE `$nume_test`;";
    mysqli_query($db_teste, $query);

    $query = "DROP TABLE `$nume_test"."_rezultate` ;";
    echo($query);
    mysqli_query($db_teste, $query);

    mysqli_query($db_teste, "DELETE FROM `date_teste` WHERE nume_test='$nume_test';");

    header("location: ../profesor.php")

?>