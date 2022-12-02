<?php
    $query = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'config';";
    
    $db_inexistent = mysqli_connect('localhost', 'root', '', '');
    
    $result = mysqli_query($db_inexistent, $query);
    if(mysqli_num_rows($result)==0){
        mysqli_query($db_inexistent, "CREATE DATABASE test;");
        $db_test = mysqli_connect('localhost', 'root', '', 'test');
        mysqli_query($db_test, "CREATE TABLE `test`.`config` ( `nume_optiune`TEXT NOT NULL , `valoare_optiune` INT NOT NULL ) ENGINE = InnoDB;");
        mysqli_query($db_test, "CREATE TABLE `test`.`utilizatori` ( `ID` TEXT NOT NULL , `parola` TEXT NOT NULL , `statut` TEXT NOT NULL, `clasa` TEXT NOT NULL ) ENGINE = InnoDB;");
        mysqli_query($db_test, "INSERT INTO `config` (`nume_optiune`, `valoare_optiune`) VALUES ('initializare', 1);");
        mysqli_query($db_test, "INSERT INTO `utilizatori` (`ID`, `parola`, `statut`, `clasa`) VALUES ('admin', 'admin', 'admin', '');");
        mysqli_query($db_inexistent, "CREATE DATABASE teste;");
        $db_teste = mysqli_connect('localhost', 'root', '', 'teste');
        mysqli_query($db_teste, "CREATE TABLE `teste`.`date_teste` ( `nume_test` TEXT NOT NULL , `clasa` TEXT NOT NULL , `oficiu` INT NOT NULL) ENGINE = InnoDB;");
    }
    header("Location: ../");
?>