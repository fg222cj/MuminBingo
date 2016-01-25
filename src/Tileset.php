<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-20
 * Time: 11:29
 */

class Tileset {
    private $username;
    private $sessionID;
    private $tiles;
    private $markedTiles;

    function __construct($username = "", $sessionID, $tiles, $markedTiles) {
        $this->username = $username;
        $this->sessionID = $sessionID;
        $this->tiles = $tiles;
        $this->markedTiles = $markedTiles;
    }

    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function getSessionID() {
        return $this->sessionID;
    }

    function setSessionID($sessionID) {
        $this->sessionID = $sessionID;
    }

    function getTiles() {
        return $this->tiles;
    }

    function getMarkedTiles() {
        return $this->markedTiles;
    }

    function setMarkedTiles($markedTiles) {
        $this->markedTiles = $markedTiles;
    }
}