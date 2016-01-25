<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2015-09-04
 * Time: 09:49
 */
require_once('src/Tileset.php');
require_once('src/TilesetRepository.php');

// Require only the active course
require_once('src/courses/softwarearchitecture.php');
//require_once('src/courses/fost.php');

session_start();
$numberOfTiles = 25; // Needs to have an integer as square root, e.g. 4, 9, 16, 25, 36, etc.
$numberOfColumns = sqrt($numberOfTiles); // Determines the width of each row so we get a nice big square

$tiles = getTileset();
$markedTiles = array_fill(0, 25, "unmarked");
$tileset = new Tileset("", session_id(), $tiles, $markedTiles);
$tilesetRepository = new TilesetRepository();
$tilesetRepository->store($tileset);

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
    <p>Klicka i en ruta för att markera den. <?php echo $numberOfColumns ?> rutor i rad = BINGO!</p>
    <form>
        Namn: <input type="text" name="username"/>
        <br />
        <br />
        <table class="mysheet">
            <?php
            for($i = 0; $i < $numberOfTiles; $i++) {
                if($i%$numberOfColumns == 0) {
                    ?>
                    <tr>
                    <?php
                }

                echo "<td name='" . $i . "'>" . $tiles[$i] . "</td>";
                echo "<input type=\"hidden\" id='hidden_tile_" . $i . "' name='" . $i . "' value=\"unmarked\" />";

                if($i%$numberOfColumns == $numberOfColumns - 1) {
                    ?>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </form>
    </body>
</html>