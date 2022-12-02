<?php
    $db_teste = mysqli_connect('localhost', 'root', '', 'teste');
    $db_test = mysqli_connect('localhost', 'root', '', 'test');
    $db_inexistent = mysqli_connect('localhost', 'root', '', '');

    function actualizare_intrebari($numar_intrebari_noi, $nume_test){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query = "SELECT DISTINCT * FROM "."`".$nume_test."`";


        $numar_intrebari_vechi = mysqli_num_rows(mysqli_query($db, $query));

        if($numar_intrebari_noi > $numar_intrebari_vechi){
            for($intrebarea_actuala=$numar_intrebari_vechi+1; $intrebarea_actuala<=$numar_intrebari_noi; $intrebarea_actuala=$intrebarea_actuala+1){
                $query = "INSERT INTO "."`".$nume_test."`"." (`ID`, `intrebare`, `punctaj`, `varianta_1`, `varianta_2`, `varianta_3`, `varianta_4`, `varianta_corecta`) VALUES ("."'".$intrebarea_actuala."'".", '', '', '', '', '', '', '');";
                mysqli_query($db, $query);
            }
        } else if ($numar_intrebari_noi < $numar_intrebari_vechi){
            for($intrebarea_actuala=$numar_intrebari_vechi; $intrebarea_actuala>$numar_intrebari_noi; $intrebarea_actuala=$intrebarea_actuala-1){
                $query = "DELETE FROM "."`".$nume_test."`"." WHERE ID='$intrebarea_actuala'";
                mysqli_query($db, $query);
            }
        }

    }

    function editor_intrebari($numar_intrebari, $nume_test){

        echo("<form action='actiuni/adaugare_date.php' method='post'>");
        for($intrebarea_actuala=1; $intrebarea_actuala<=$numar_intrebari; $intrebarea_actuala=$intrebarea_actuala+1){
            echo("<h2> Întrebarea&nbsp".$intrebarea_actuala."</h2>");
            echo("
                <input type='text' name='intrebare_".$intrebarea_actuala."' placeholder='Care este întrebarea?' value='".preluare_date($nume_test, "intrebare", $intrebarea_actuala)."' class='intrebare_input' size='53'>
                <h4> Punctaj: <input type='number' name='punctaj_".$intrebarea_actuala."' class='intrebare_input' value='".preluare_date($nume_test, "punctaj", $intrebarea_actuala)."' min=0 max=100> </h4>
                <h4> Varianta 1: <input type='text' name='varianta1_".$intrebarea_actuala."' class='intrebare_input' value='".preluare_date($nume_test, "varianta_1", $intrebarea_actuala)."' size='40'> </h4>
                <h4> Varianta 2: <input type='text' name='varianta2_".$intrebarea_actuala."' class='intrebare_input' value='".preluare_date($nume_test, "varianta_2", $intrebarea_actuala)."' size='40'> </h4>
                <h4> Varianta 3: <input type='text' name='varianta3_".$intrebarea_actuala."' class='intrebare_input' value='".preluare_date($nume_test, "varianta_3", $intrebarea_actuala)."' size='40'> </h4>
                <h4> Varianta 4: <input type='text' name='varianta4_".$intrebarea_actuala."' class='intrebare_input' value='".preluare_date($nume_test, "varianta_4", $intrebarea_actuala)."' size='40'> </h4>
                <h4> Varianta corectă: <select type='text' name='varianta_corecta_".$intrebarea_actuala."' class='intrebare_input'>
            ");

            $varianta_corecta = preluare_date($nume_test, "varianta_corecta", $intrebarea_actuala);
            $varianta_corecta = substr($varianta_corecta, -1);

            for($i=1; $i<=4; $i++){
                if($varianta_corecta==$i){
                    echo("<option value='varianta_$i' selected >Varianta $i</option>");
                } else {
                    echo("<option value='varianta_$i'>Varianta $i</option>");
                }
            }
            echo("</select> </h4>");
        }
                
        echo("<h4> <input type='submit' name='submit' value='Actualizează'> </h4>
            <input type='text' name='numar_intrebari' value='$numar_intrebari' class='pastrare_nume_test'>
            <input type='text' name='nume_test' value='$nume_test' class='pastrare_nume_test'>
         
        </form>");
    }

    function numar_randuri($nume_test){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query = "SELECT DISTINCT * FROM "."`".$nume_test."`";

        return mysqli_num_rows(mysqli_query($db, $query));
    }

    function verificare_existenta($nume_test){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query = "SELECT DISTINCT * FROM "."`".$nume_test."`";

        if(mysqli_num_rows(mysqli_query($db, $query))>=1){
            return true;
        } else {
            return false;
        }
    }

    function preluare_date($nume_test, $coloana, $intrebarea_actuala){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query = "SELECT DISTINCT $coloana FROM `".$nume_test."` WHERE ID=$intrebarea_actuala;";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_array($result);

        return $result[$coloana];
    }

    function verificare_statut($statut_accesat){
        if($statut_accesat!=$_SESSION['statut']){
            header("location: ../index.php");
        }
    }

    function adaugare_baza_de_date_elevi($nume_test){
        $db = mysqli_connect('localhost', 'root', '', 'test');

        $query = "SELECT DISTINCT ID, statut FROM `utilizatori`";
        $result = mysqli_query($db, $query);

        $query = "CREATE TABLE `teste`.". "`" .$nume_test. "_rezultate`". " ( `ID` TEXT NOT NULL , `punctaj` INT NOT NULL ) ENGINE = InnoDB;" ;
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        mysqli_query($db, $query);

        while ($row = mysqli_fetch_array($result)) {
            $ID=$row['ID'];
            $statut=$row['statut'];
            if($statut=='elev') {
                $query = "INSERT INTO "."`".$nume_test."_rezultate`"." (`ID`, `punctaj`) VALUES ('$ID', '');";
                mysqli_query($db, $query);
            }
        }
    }

    function afisare_raspunsuri($nume_test){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query = "SELECT * FROM `$nume_test"."_rezultate`;";
        $result = mysqli_query($db, $query);
        echo("<table>
            <tr>
                <th>ID elev</th>
                <th>Punctaj obținut</th>
            </tr>"
        );

        while ($row = mysqli_fetch_array($result)) {
            $ID=$row['ID'];
            $punctaj=$row['punctaj'];

            echo("
                <tr>
                    <td>$ID</td>
                    <td>$punctaj</td>
                </tr> 
            ");
        }
        echo("</table>");
    }
    function afisare_teste_nesustinute($ID){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME NOT LIKE '%_rezultate' AND TABLE_SCHEMA='teste' AND TABLE_NAME NOT LIKE 'date_teste'";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result)==0){
            echo "Nu ai niciun test de susținut momentan!";
        } else {
            while($table = mysqli_fetch_array($result)) {
                if(verificare_sustinere_test($table[0], $ID) == false){
                    echo( '<form action="actiuni/sustinere_test.php" method="post">
                                <div>
                                    <input type="submit" name="nume_test" value="'.$table[0].'" class="text_input">
                                    <input type="text" name="ID" value='.$ID.' class="pastrare_nume_test">
                                </div>
                            </form>
                    ');
                }
            }
        }
    }

    function verificare_sustinere_test($nume_test, $ID){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query = "SELECT punctaj FROM `$nume_test"."_rezultate` WHERE ID='$ID';";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_array($result);

        if($result['punctaj']==0){
            return false;
        } else {
            return true;
        }
    }

    function sustinere_test($ID, $nume_test){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query = "SELECT * FROM `$nume_test`";
        $result = mysqli_query($db, $query);
        //echo $query;

        if(isset($_SESSION['intrebari'])){
            $_SESSION['intrebari_puse']=$_SESSION['intrebari_puse']+1;
            $intrebarea_actuala = rand(1, mysqli_num_rows($result));
            //echo $_SESSION['intrebari_puse']."<BR>";
            //echo mysqli_num_rows($result)."<BR>";

            if ($_SESSION['intrebari_puse'] > mysqli_num_rows($result)){
                unset($_SESSION['intrebari']);
                unset($_SESSION['intrebari_puse']);
                header("location: ../elev.php");
            }
            
            while($_SESSION['intrebari'][$intrebarea_actuala]==1){
                $intrebarea_actuala = rand(1, mysqli_num_rows($result));
            }
            $_SESSION['intrebari'][$intrebarea_actuala]=1;

            $query = "SELECT * FROM `$nume_test` WHERE ID=$intrebarea_actuala";
            $row = mysqli_query($db, $query);
            $row = mysqli_fetch_array($row);
            
            echo("
                <form action='sustinere_test.php' method='post'>
                    <h4>".$row['intrebare']."</h4>

                    <input type='radio' id='varianta_1' name='raspuns' value='varianta_1'>
                    <label for='varianta_1'>".$row['varianta_1']."</label><br> 

                    <input type='radio' id='varianta_2' name='raspuns' value='varianta_2'>
                    <label for='varianta_2'>".$row['varianta_2']."</label><br> 

                    <input type='radio' id='varianta_3' name='raspuns' value='varianta_3'>
                    <label for='varianta_3'>".$row['varianta_3']."</label><br> 

                    <input type='radio' id='varianta_4' name='raspuns' value='varianta_4'>
                    <label for='varianta_4'>".$row['varianta_4']."</label><br> 

                    <input type='text' name='intrebarea_actuala' value='$intrebarea_actuala' class='pastrare_nume_test'>
                    <input type='text' name='ID' value='$ID' class='pastrare_nume_test'>
                    <input type='text' name='nume_test' value='$nume_test' class='pastrare_nume_test'>
                    <input type='text' name='punctaj' value=".$row['punctaj']." class='pastrare_nume_test'>

                    <input type='submit' name='submit' value='Următoarea întrebare'>
            ");

            
            
        } else {
            $_SESSION['intrebari']=array();
            $_SESSION['intrebari_puse']=0;

            for($i=1; $i<=mysqli_num_rows($result); $i=$i+1){
                $_SESSION['intrebari'][$i]='0';
            }
            sustinere_test($ID, $nume_test);
        }


    }

    function verificare_raspuns($ID, $nume_test, $intrebarea_actuala, $raspuns, $punctaj){
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query = "SELECT * FROM `$nume_test` WHERE ID=$intrebarea_actuala";
        $row = mysqli_query($db, $query);
        $row = mysqli_fetch_array($row);
        if($row['varianta_corecta'] == $raspuns){
            $db = mysqli_connect('localhost', 'root', '', 'teste');
            $query = "SELECT punctaj FROM `$nume_test"."_rezultate` WHERE ID='$ID';";
            $result = mysqli_query($db, $query);
            $result = mysqli_fetch_array($result);

            $result['punctaj']=$result['punctaj']+$punctaj;

            $query="UPDATE "."`".$nume_test."_rezultate` SET punctaj=".$result['punctaj']." WHERE ID='$ID';";
            mysqli_query($db, $query);
        }

    }

    function afisare_teste_sustinute($ID) {
        $db = mysqli_connect('localhost', 'root', '', 'teste');
        $query="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME NOT LIKE '%_rezultate' AND TABLE_SCHEMA='teste' AND TABLE_NAME NOT LIKE 'date_teste'";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result)==0){
            echo "Nu există momentan niciun test susținut!";
        } else {
            while($table = mysqli_fetch_array($result)) {
                if(verificare_sustinere_test($table[0], $ID) == true){

                    $db = mysqli_connect('localhost', 'root', '', 'teste');
                    $query = "SELECT punctaj FROM `".$table[0]."_rezultate` WHERE ID='$ID';";
                    $result_test = mysqli_query($db, $query);
                    $result_test = mysqli_fetch_array($result_test);

                    echo( ' <h4> Punctaj obținut la testul '.$table[0].' este '.$result_test['punctaj']);
                }
            }
        }
    }
?>