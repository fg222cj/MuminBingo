<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2015-09-04
 * Time: 09:49
 */

$tiles = array();
$tiles[] = "Tekniska problem";
$tiles[] = "Felstavning i slide";
$tiles[] = "\"Ooops\"";
$tiles[] = "Upprepar inte en fråga för distansarna";
$tiles[] = "\"Klas\"";
$tiles[] = "Borde gjort något som han inte gjort";
$tiles[] = "Byter slide av misstag";
$tiles[] = "Råkar säga något på svenska";
$tiles[] = "Glömmer spela in föreläsningen";
$tiles[] = "Random muspekare";
$tiles[] = "Överfull slide";
$tiles[] = "\"Kål\"";
$tiles[] = "\"Ten min brejk\"";
$tiles[] = "Bug i exempelkod";
$tiles[] = "\"Mettåd\"";
$tiles[] = "\"De tåppik får todäj\"";
//$tiles[] = "\"Pråpperti\"";
//$tiles[] = "\"Stupid\"";
//$tiles[] = "\"Åbbjekt\"";
//$tiles[] = "\"Pabblik\"";

shuffle($tiles);
?>
<html>
    <head>
        <title>MuminBingo!</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bingo.css">
        <script language="javascript" type="text/javascript" src="jquery-2.1.4.min.js"></script>
        <script language="javascript" type="text/javascript" src="bingo.js"></script>
    </head>
    <body>
    <p>Klicka i en ruta för att markera den. 4 rutor i rad = BINGO!</p>
    <table>
        <?php
        for($i = 0; $i < 16; $i++) {
            if($i%4 == 0) {
                ?>
                <tr>
                <?php
            }

            echo "<td>" . $tiles[$i] . "</td>";

            if($i%4 == 3) {
                ?>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    </body>
</html>