<?php session_start();
    include'functii/functii.php';
      verificare_statut("profesor");    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Platforma Profesor</title>
        <link rel="icon" type="image/x-icon" href="poze/icon.png" />
        <link rel="stylesheet" type="text/css" href="../style_index.css">
    </head>

    <body>
        <div class="aplicatie">
            <div class="content">

                <div class="vizualizare_teste">
                        <div class="text_afisare_teste">
                            <h3>Teste existente</h3>
                        </div>

                    <div class="serie teste">

                        <?php
                            $db = mysqli_connect('localhost', 'root', '', 'teste');
                            $query="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME NOT LIKE '%_rezultate' AND TABLE_SCHEMA='teste' AND TABLE_NAME NOT LIKE 'date_teste'";
                            $result = mysqli_query($db, $query);

                            if(mysqli_num_rows($result)==0){
                                echo "Nu există niciun test!";
                            } else {
                                while($table = mysqli_fetch_array($result)) {
                                    echo( '<form action="configurare_test.php" method="get">
                                                <div>
                                                    <input type="submit" name="nume_test" value="'.$table[0].'" class="text_input">
                                                </div>
                                            </form>
                                    ');
                                }
                            }
                        ?>


                        

                    </div>

                </div>

                <div class="adaugare_test">
                    <form action="adaugare_test.php" method="get">
                        <div class="text_adaugare_test">
                            <h3>Creează un test</h3>
                        </div>

                        <div class="sectiune">
                            <input type="text" placeholder="Numele testului" name="nume_test" class="text_adaugare_test" autocomplete="off">
                        </div>

                        <div class="buton_sectiune">
                            <input type="submit" name="submit" value="Creează" class="text_input">
                        </div>
                    </form>
                </div>

                <div class="sectiune_logout">
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


