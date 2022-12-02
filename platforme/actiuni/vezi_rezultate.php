<?php include'../functii/functii.php'; ?>
<html>
    <head>
        <title>Platforma Profesor</title>
        <link rel="icon" type="image/x-icon" href="../../poze/icon.png" />
        <link rel="stylesheet" type="text/css" href="../../style_index.css">
    </head>

    <body>
        <div class="aplicatie">
            <div class="content">
                <div class="text_afisare_teste">
                        <?php
                            echo("<h2>"."Rezultatele testului: "."<b>".$_GET['nume_test']."</b>"."</h2>");
                        ?>
                </div>

                <div class="afisare_raspunsuri">
                    <?php afisare_raspunsuri($_GET['nume_test']) ?>
                </div>
            </div>
        </div>
        <?php require '../../footer.php'; ?>
    </body>
</html>