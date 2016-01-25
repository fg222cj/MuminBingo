<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-25
 * Time: 14:31
 */
// Debugging
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once('config.php');
require_once('Tileset.php');
require_once('TilesetView.php');
require_once('TilesetRepository.php');
try {
    if (isset($_POST)) {
        $tilesetRepository = new TilesetRepository();
        $tilesetView = new TilesetView();

        $username = "";
        $sessionID = 0;
        $tiles = "";
        $markedTiles = "";

        if (isset($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            echo "<p>Error, no username</p>";
        }

        if (isset($_POST['sessionID'])) {
            $sessionID = $_POST['sessionID'];
        } else {
            echo "<p>Error, no session id</p>";
        }

        if (isset($_POST['markedTiles'])) {
            $markedTiles = json_decode($_POST['markedTiles']);
        } else {
            echo "<p>error, no tiles</p>";
        }

        $tileset = new Tileset($username, $sessionID, $tiles, $markedTiles);
        $tilesetRepository->update($tileset);

        $otherTilesets = $tilesetRepository->getAllActiveTilesets();
        $html = "";
        foreach($otherTilesets as $otherTileset) {
            if($otherTileset->getSessionID() !== $sessionID) {
                $html .= $tilesetView->render($otherTileset);
            }
        }
        if($html == "") {
            echo "<p>No other players online</p>";
        }
        echo $html;
    }
}
catch(Exception $e) {
    syslog(LOG_DEBUG, $e->getMessage());
}
?>