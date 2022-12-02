<?php session_start();
    include'functii/functii.php';
    verificare_statut("elev");
    unset($_SESSION['intrebari_puse']);
    unset($_SESSION['intrebari']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Platforma Elev</title>
        <link rel="icon" type="image/x-icon" href="poze/icon.png" />
        <link rel="stylesheet" type="text/css" href="../style_index.css">
    </head>

    <body>
        <div class="aplicatie">
            <div class="content_elev">
                <div class="text_primire_elev">
                    <h3>Bine ai venit <?php echo($_SESSION['ID']);?>!</h3>
                </div>

                <div class="teste_nesustinute">
                    <div class="text_afisare_teste">
                        <h3>Teste nesusținute</h3>
                    </div>

                    <div class="serie_teste">

                        <?php
                            afisare_teste_nesustinute($_SESSION['ID']);
                        ?>
                    </div>

                </div>

                <div class="teste_sustinute">
                    <div class="text_afisare_teste">
                        <h3>Teste susținute</h3>
                    </div>

                    <div class="serie_teste">

                        <?php
                            afisare_teste_sustinute($_SESSION['ID']);
                        ?>
                    </div>
                </div>

                <div class="sectiune_logout_elev">
                    <form action="actiuni/logout.php">
                        <div>
                            <input type="submit" name="submit" value="Delogează-te" class="text_input">
                        </div>  
                    </form>
                </div>
            </div>
        </div>
        <?php require '../footer.php'; ?>
    </body>
</html>


