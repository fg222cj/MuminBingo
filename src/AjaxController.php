<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-25
 * Time: 14:31
 */
require_once('Tileset.php');
require_once('TilesetRepository.php');

$tilesetRepository = new TilesetRepository();

if(isset($_POST)) {
    $username = "";
    $sessionID = 0;
    $tiles = "";
    $markedTiles = "";

    if(isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if(isset($_POST['sessionID'])) {
        $sessionID = $_POST['sessionID'];
    }
    if(isset($_POST['tiles'])) {
        $tiles = json_decode($_POST['tiles']);
    }
    if(isset($_POST['markedTiles'])) {
        $markedTiles = json_decode($_POST['markedTiles']);
    }

    $tileset = new Tileset($username, $sessionID, $tiles, $markedTiles);
    $tilesetRepository->update($tileset);
}