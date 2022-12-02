<?php include'functii/functii.php'; 
    if(isset($_GET['numar_intrebari'])){
        actualizare_intrebari($_GET['numar_intrebari'], $_GET['nume_test']); 
    }
    
?>
<html>
    <head>
        <title>Platforma Profesor</title>
        <link rel="icon" type="image/x-icon" href="../poze/icon.png" />
        <link rel="stylesheet" type="text/css" href="../style_index.css">
    </head>

    <body>
        <div class="aplicatie">
            <div class="content_editare_test">
                <div class="text_afisare_teste">
                        <?php
                            echo("<h2>"."Testul: "."<b>".$_GET['nume_test']."</b>"."</h2>");
                        ?>
                </div>

                <div class='numarul_de_intrebari'>
                    <form action="editare_test.php" method="get">
                        <h4 class="text_afisare_teste"> Numărul de întreabari ale testului:&nbsp
                            <input type="number" class="input_nr_intrebari" name="numar_intrebari" id="numar_intrebari" value=
                                <?php
                                    $db = mysqli_connect('localhost', 'root', '', 'teste');
                                    
                                    $query = "SELECT DISTINCT * FROM "."`".$_GET['nume_test']."`";
                                    $result = mysqli_query($db, $query);
                                    if(mysqli_num_rows($result) >= 1){
                                        echo(mysqli_num_rows($result));
                                    } else {
                                        echo 0;
                                    }
                                    
                                ?>
                            min="0" max="99"> 
                            <input type="submit" name="submit" value="Actualizează numărul" class="text_input">
                            <input type="text" name="nume_test" value=<?php echo('"'.$_GET['nume_test'].'"');?> class="pastrare_nume_test">
                        </h4>
                    </form>
                    
                </div>

                <div class="afisare_intrebari">
                    <?php 

                    if(!isset($_GET['numar_intrebari'])){
                        if(verificare_existenta($_GET['nume_test'])){
                            editor_intrebari( numar_randuri($_GET['nume_test']), $_GET['nume_test'] );
                        } else {
                            echo("<h3> Nu există întrebări! <h3>");
                        }
                    } else {
                        if(verificare_existenta($_GET['nume_test'])){
                            editor_intrebari($_GET['numar_intrebari'], $_GET['nume_test']);
                        } else {
                            echo("<h3> Nu există întrebări! <h3>");
                        }
                    }
                    
                    ?>
                </div>

                <div class="buton_stergere_test">
                    <form action="actiuni/stergere_test.php" method="post">
                        <input type="submit" name="submit" value="Șterge testul!" class="text_input">
                        <input type="text" name="nume_test" value="<?php echo($_GET['nume_test']);?>" class="pastrare_nume_test">
                    </form>
                </div>

                <div class="buton_rezultate_test">
                    <form action="actiuni/vezi_rezultate.php" method="get">
                        <input type="submit" name="submit" value="Vezi rezultatele" class="text_input">
                        <input type="text" name="nume_test" value="<?php echo($_GET['nume_test']);?>" class="pastrare_nume_test">
                    </form>
                </div>

            </div>
        </div>
        <?php require '../footer.php'; ?>
    </body>
</html>