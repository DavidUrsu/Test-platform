<?php include 'proces_login.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Platforma test</title>
        <link rel="icon" type="image/x-icon" href="poze/icon.png" />
        <link rel="stylesheet" type="text/css" href="style_index.css">
    </head>

    <body>
        <div class="sectiune_login">
            <form action="index.php" method="post">
                <div class="text_afisare">
                    <h3>Folosește datele de login!</h3>
                </div>

                <div class="sectiune">
                    <input type="text" placeholder="ID-ul tău" name="ID" class="text_input" autocomplete="off">
                </div>

                <div class="sectiune">
                    <input type="password" placeholder="Parola" name="parola" class="text_input">
                </div>

                <div class="buton_login">
                    <input type="submit" name="submit" value="Logează-te" class="text_input">
                </div>
            </form>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>