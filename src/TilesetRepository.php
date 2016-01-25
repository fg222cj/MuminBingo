<?php
/**
 * Created by PhpStorm.
 * User: Foss
 * Date: 2016-01-20
 * Time: 11:29
 */
require_once("Repository.php");
require_once("Tileset.php");

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
        try {
            $db = $this->connection();

            $sql = "UPDATE " . DBTILESETTABLE . " SET " . DBTILESETTABLEUSERNAME . "=?, " . DBTILESETTABLEMARKEDTILES . "=?
        WHERE " . DBTILESETTABLESESSIONID . "=?";
            $params = array($tileset->getUsername(), serialize($tileset->getMarkedTiles()), $tileset->getSessionID());

            $query = $db->prepare($sql);
            $query->execute($params);
        }
        catch(Exception $e) {
            syslog(LOG_DEBUG, $e->getMessage());
        }
    }

    // Todo: only fetch active tilesets
    public function getAllActiveTilesets() {
        $db = $this->connection();

        $sql = "SELECT * FROM " . DBTILESETTABLE . " WHERE " . DBTILESETTABLESESSIONID . "!=?";
        $params = array(session_id());

        $query = $db->prepare($sql);
        $query->execute($params);

        $result = $query->fetchAll();
        $tilesets = array();

        foreach($result as $row) {
            $tileset = new Tileset($row[DBTILESETTABLEUSERNAME], $row[DBTILESETTABLESESSIONID], unserialize($row[DBTILESETTABLETILES]), unserialize($row[DBTILESETTABLEMARKEDTILES]));
            $tilesets[] = $tileset;
        }

        return $tilesets;
    }
}