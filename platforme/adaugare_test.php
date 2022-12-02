<?php
    include'functii/functii.php';
    $nume_test = $_GET['nume_test'];

    $query = "CREATE TABLE `teste`.". "`" .$nume_test. "`". " ( `ID` INT NOT NULL , `intrebare` TEXT NOT NULL , `punctaj` INT NOT NULL , 
             `varianta_1` TEXT NOT NULL , `varianta_2` TEXT NOT NULL , `varianta_3` TEXT NOT NULL , `varianta_4` TEXT NOT NULL , 
             `varianta_corecta` TEXT NOT NULL ) ENGINE = InnoDB;" ;
    mysqli_query($db_teste, $query);
    adaugare_baza_de_date_elevi($nume_test);

    mysqli_query($db_teste, "INSERT INTO `date_teste` (`nume_test`, `clasa`, `oficiu`) VALUES ('$nume_test', '', '');");

    header("location: profesor.php")
?>