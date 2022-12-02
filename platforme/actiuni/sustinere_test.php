<?php session_start();
    include'../functii/functii.php';
    verificare_statut("elev");    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sustinere test</title>
        <link rel="icon" type="image/x-icon" href="../poze/icon.png" />
        <link rel="stylesheet" type="text/css" href="../../style_index.css">
    </head>

    <body>
        <div class="aplicatie">
            <div class="content_pagina_test">
                <div class="content_test">
                    <?php
                    if(isset($_POST['intrebarea_actuala'])){
                        verificare_raspuns($_POST['ID'], $_POST['nume_test'], $_POST['intrebarea_actuala'], $_POST['raspuns'], $_POST['punctaj']);
                    }
                    sustinere_test($_POST['ID'], $_POST['nume_test']); 
                    ?>
                </div>
            </div>
        </div>
        <?php require '../../footer.php'; ?>
    </body>
</html>


