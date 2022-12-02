<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'test');
    $ID = "";

    if(isset($_SESSION['ID'])){
        $result = $_SESSION['statut'];
        if($result == "admin"){
            header("Location: platforme/admin.php");
        } else if ($result == "elev"){
            header("Location: platforme/elev.php");
        } else if ($result == "profesor"){
            header("Location: platforme/profesor.php");
        }
    }

    if(isset($_POST['submit'])){
        
        $ID = mysqli_real_escape_string($db, $_POST['ID']);
        $parola = mysqli_real_escape_string($db, $_POST['parola']);

        $query = "SELECT DISTINCT * FROM utilizatori WHERE ID='$ID' AND parola='$parola'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1){
            $_SESSION['ID'] = $ID;

            $query = "SELECT DISTINCT statut FROM utilizatori WHERE ID='$ID'";
            $result = mysqli_query($db, $query);
            $result = mysqli_fetch_array($result);
            $result = $result['statut'];
            if($result == "admin"){
                header("Location: platforme/admin.php");
            } else if ($result == "elev"){
                header("Location: platforme/elev.php");
            } else if ($result == "profesor"){
                header("Location: platforme/profesor.php");
            }
            $_SESSION['statut'] = $result;
            echo $result;

        } else {
            header("Location: index.php");
        }
    }
?>
