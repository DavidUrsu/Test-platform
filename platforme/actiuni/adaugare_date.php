<?php

    $db = mysqli_connect('localhost', 'root', '', 'teste');
    print_r($_POST);
    for($intrebarea_actuala=1; $intrebarea_actuala<=$_POST['numar_intrebari']; $intrebarea_actuala=$intrebarea_actuala+1){
        $nume_test = $_POST["nume_test"];
        $intrebare = $_POST["intrebare_".$intrebarea_actuala];
        $punctaj = $_POST["punctaj_".$intrebarea_actuala];
        $varianta1 = $_POST["varianta1_".$intrebarea_actuala];
        $varianta2 = $_POST["varianta2_".$intrebarea_actuala];
        $varianta3 = $_POST["varianta3_".$intrebarea_actuala];
        $varianta4 = $_POST["varianta4_".$intrebarea_actuala];
        $varianta_corecta = $_POST["varianta_corecta_".$intrebarea_actuala];

        $query = "UPDATE `$nume_test`
                    SET intrebare = '$intrebare', punctaj = '$punctaj', varianta_1 = '$varianta1', varianta_2 = '$varianta2', 
                        varianta_3 = '$varianta3', varianta_4 = '$varianta4', varianta_corecta = '$varianta_corecta'
                    WHERE ID=$intrebarea_actuala;" ;
        mysqli_query($db, $query);
    echo $query;
}

    header("location: ../profesor.php");

    //$_POST["varianta_corecta_".$intrebarea_actuala];
    //name='varianta_corecta_".$intrebarea_actuala.
?>
