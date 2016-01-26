<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2015-09-04
 * Time: 09:49
 */
// Debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('src/config.php');
require_once('src/Tileset.php');
require_once('src/TilesetView.php');
require_once('src/TilesetRepository.php');

// Require only the active course
require_once('src/courses/softwarearchitecture.php');
//require_once('src/courses/fost.php');
// Todo: If tileset already exists for this sessionid - fetch that instead.
$tilesetRepository = new TilesetRepository();
$tilesetView = new TilesetView();

session_start();
$tileset = $tilesetRepository->getBySessionID(session_id());
if(!isset($tileset)) {
    $tiles = getTileset();
    $markedTiles = array_fill(0, 25, "unmarked");
    $tileset = new Tileset("", session_id(), $tiles, $markedTiles);
    $tilesetRepository->store($tileset);
}

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
    <form>
        Namn: <input type="text" name="username"/>
        <input type="hidden" name="sessionID" value="<?php echo session_id() ?>" />
        <input type="hidden" name="tiles" value="<?php echo serialize($tileset->getTiles()) ?>" />
        <br />
        <br />
        <?php
        echo $tilesetView->render($tileset);
        ?>
    </form>
    <div id="others">
    </div>
    </body>
</html>