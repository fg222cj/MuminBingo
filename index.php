<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2015-09-04
 * Time: 09:49
 */

$numberOfTiles = 25; // Needs to have an even square root, e.g. 4, 9, 16, 25, 36, etc.
$numberOfColumns = sqrt($numberOfTiles);

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
$tiles[] = "\"Pråpperti\"";
$tiles[] = "\"Stupid\"";
$tiles[] = "\"Åbbjekt\"";
$tiles[] = "\"Pabblik\"";
$tiles[] = "\"Åverrajd\"";
$tiles[] = "Uttalar \"G\" som \"jay\"";
$tiles[] = "Bokstavssoppa på sliden";
$tiles[] = "Berättar att något inte är rocket science";
$tiles[] = "Bajsar på sig";

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
    <p>Klicka i en ruta för att markera den. 5 rutor i rad = BINGO!</p>
    <table>
        <?php
        for($i = 0; $i < $numberOfTiles; $i++) {
            if($i%$numberOfColumns == 0) {
                ?>
                <tr>
                <?php
            }

            echo "<td>" . $tiles[$i] . "</td>";

            if($i%$numberOfColumns == $numberOfColumns - 1) {
                ?>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    </body>
</html>