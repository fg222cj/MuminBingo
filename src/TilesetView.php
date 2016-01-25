<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-25
 * Time: 21:42
 */
require_once("Tileset.php");

class TilesetView {
    function render(Tileset $tileset) {
        $numberOfTiles = 25; // Needs to have an integer as square root, e.g. 4, 9, 16, 25, 36, etc.
        $numberOfColumns = sqrt($numberOfTiles); // Determines the width of each row so we get a nice big square
        $tiles = $tileset->getTiles();
        $markedTiles = $tileset->getMarkedTiles();

        $class = "othersheet";
        if($tileset->getSessionID() === session_id()) {
            $class = "mysheet";
        }



        $html = "<table class=\"" . $class . "\">";
        if($tileset->getSessionID() !== session_id()) {
            $html .= "<caption><h3>" . $tileset->getUsername() . "</h3></caption>";
        }
        for($i = 0; $i < $numberOfTiles; $i++) {
            if($i%$numberOfColumns == 0) {
                $html .= "<tr>";
            }

            $marked = "";
            if($markedTiles[$i] === "marked") {
                $marked = " class='marked'";
            }

            $html .= "<td name='" . $i . "'$marked>" . $tiles[$i] . "</td>";
            if($tileset->getSessionID() === session_id()) {
                $html .= "<input type=\"hidden\" id='hidden_tile_" . $i . "' name='hidden_tile' value=\"unmarked\" />";
            }

            if($i%$numberOfColumns == $numberOfColumns - 1) {
                $html .="</tr>";
            }
        }
        $html .= "</table>";
        return $html;
    }
}