<?php include'functii/functii.php'; session_start(); verificare_statut("admin"); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Platforma Admin</title>
        <link rel="icon" type="image/x-icon" href="../../poze/icon.png" />
    </head>

    <body>
        <div class="sectiune_logout_elev">
            <form action="admin/resetare_parole.php">
                <div>
                    <input type="submit" name="submit" value="reseteaza parolele" class="text_input">
                </div>  
            </form>
        </div><br>

        <div class="sectiune_logout_elev">
            <form action="admin/sterge_utilizatorii.php">
                <div>
                    <input type="submit" name="submit" value="sterge utilizatorii" class="text_input">
                </div>  
            </form>
        </div><br>

        <div class="sectiune_logout_elev">
            <form action="admin/utilizatori_necesari.php">
                <div>
                    <input type="submit" name="submit" value="adauga utilizatori necesari" class="text_input">
                </div>  
            </form>
        </div><br>

        <div class="sectiune_logout_elev">
            <form action="admin/adaugare_utilizatori.php">
                <div>
                    <input type="submit" name="submit" value="adauga utilizatori" class="text_input">
                </div>  
            </form>
        </div><br>

        <div class="sectiune_logout_elev">
            <form action="actiuni/logout.php">
                <div>
                    <input type="submit" name="submit" value="Delogează-te" class="text_input">
                </div>  
            </form>
        </div>

        <br><br><br>
        
        <div class="sectiune_logout_elev">
            <form action="admin/sterge_baza_de_date.php">
                <div>
                    <input type="submit" name="submit" value="Sterge baza de date" class="text_input" style="color: red;">
                </div>  
            </form>
        </div><br>

        <div class="sectiune_logout_elev">
            <form action="actiuni/logout.php">
                <div>
                    <?php echo($_SERVER['SERVER_PORT']); ?>
                </div>  
            </form>
        </div>

    </body>
</html>


