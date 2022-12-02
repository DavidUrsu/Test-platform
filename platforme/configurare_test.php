<?php session_start();
    include'functii/functii.php';
    verificare_statut("profesor");
    $nume_test=$_GET['nume_test'];
    $result=mysqli_query($db_teste, "SELECT * FROM `date_teste` WHERE nume_test='$nume_test';");
    $result=mysqli_fetch_array($result);
    if(!empty($result['clasa'])){
        header("Location: editare_test.php?nume_test=$nume_test");
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
            <div class="content">
                <div class="text_afisare_teste">
                        <?php
                            echo("<h2>"."Introduce datele pentru testul: "."<b>".$_GET['nume_test']."</b>"."</h2>");
                        ?>
                </div>

                <div>
                    <form action="actiuni/configurare_date_test.php" method="post">
                        <h4> Clasa: &nbsp <select name="clasa" class='intrebare_input'>
                            <option value="9A">9 A</option>
                            <option value="9B">9 B</option>
                            <option value="9C">9 C</option>
                            <option value="9D">9 D</option>
                            <option value="9E">9 E</option>
                            <option value="9F">9 F</option>

                            <option value="10A">10 A</option>
                            <option value="10B">10 B</option>
                            <option value="10C">10 C</option>
                            <option value="10D">10 D</option>
                            <option value="10E">10 E</option>
                            <option value="10F">10 F</option>

                            <option value="11A">11 A</option>
                            <option value="11B">11 B</option>
                            <option value="11C">11 C</option>
                            <option value="11D">11 D</option>
                            <option value="11E">11 E</option>

                            <option value="12A">12 A</option>
                            <option value="12B">12 B</option>
                            <option value="12C">12 C</option>
                            <option value="12D">12 D</option>
                            <option value="12E">12 E</option>
                        </select> </h4>
                        <h4> Punctaj din oficiu: <input type='number' name='oficiu' class='intrebare_input' min=0 max=100 value="0"> </h4>
                        <div class="buton_sectiune">
                            <input type="submit" name="submit" value="Incepe introducerea intrebărilor" class="text_input">
                        </div>
                        <?php
                            echo("<input type='text' name='nume_test' value='$nume_test' class='pastrare_nume_test'>");
                        ?>
                        
                    </form>
                </div>

            </div>

            
        </div>
        <?php require '../footer.php'; ?>
    </body>
</html>