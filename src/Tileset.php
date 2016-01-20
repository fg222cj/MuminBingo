<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-20
 * Time: 11:29
 */

class Tileset {
    private $username;
    private $tiles;

    function __construct($username = "", $tiles) {
        $this->username = $username;
        $this->tiles = $tiles;
    }

    function getUsername() {
        return $this->username;
    }

    function getTiles() {
        return $this->tiles;
    }
}