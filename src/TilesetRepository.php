<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-20
 * Time: 11:29
 */
require_once("src/Repository.php");
require_once("src/Tileset.php");

class TilesetRepository extends Repository {
    public function store(Tileset $tileset) {
        $db = $this->connection();

        $sql = "INSERT IGNORE INTO " . DBTILESETTABLE . " (" . DBTILESETTABLESESSIONID . ", " . DBTILESETTABLEUSERNAME . ", " . DBTILESETTABLETILES . ",
         " . DBTILESETTABLEMARKEDTILES . ") VALUES (?, ?, ?, ?)";
        $params = array($tileset->getSessionID(), $tileset->getUsername(), serialize($tileset->getTiles()), serialize($tileset->getMarkedTiles()));

        $query = $db->prepare($sql);
        $query->execute($params);
    }

    public function update(Tileset $tileset) {
        $db = $this->connection();

        $sql = "UPDATE " . DBTILESETTABLE . " SET " . DBTILESETTABLEUSERNAME . "=?, " . DBTILESETTABLETILES . "=?,
         " . DBTILESETTABLEMARKEDTILES . "=? WHERE " . DBTILESETTABLESESSIONID . "=" . $tileset->getSessionID();
        $params = array($tileset->getUsername(), serialize($tileset->getTiles()), serialize($tileset->getMarkedTiles()));

        $query = $db->prepare($sql);
        $query->execute($params);
    }

    // Todo: only fetch active tilesets
    public function getAllActiveTilesets() {
        $db = $this->connection();

        $sql = "SELECT * FROM " . DBTILESETTABLE;

        $query = $db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll();
        $tilesets = array();

        foreach($result as $row) {
            $tileset = new Tileset($row[DBTILESETTABLEUSERNAME], $row[DBTILESETTABLESESSIONID], unserialize($row[DBTILESETTABLETILES]), unserialize($row[DBTILESETTABLEMARKEDTILES]));
            $tilesets[] = $tileset;
        }

        return $tilesets;
    }
}