<?php

namespace Compass;

use \PDO;

class Database
{

    private $pdo;
    public $db;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = $this->getPDO('mariadb', $_ENV['MYSQL_DATABASE'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
        return $this->db;
    }

    /**
     * getPDO
     *
     * @param  mixed $dbAdress
     * @param  mixed $dbName
     * @param  mixed $dbUser
     * @param  mixed $dbPassword
     * @return PDO
     */
    public function getPDO($dbAdress, $dbName, $dbUser, $dbPassword): PDO
    {

        if ($this->pdo === null)
        {
            $this->pdo = new PDO("mysql:dbname=$dbName;host=$dbAdress", $dbUser, $dbPassword);
        }

        return $this->pdo;
    }

    /**
     * get
     *
     * @param  mixed $table
     * @param  mixed $fields
     * @param  mixed $where
     * @return void
     */
    public function get(string $table, array $fields, array $where = null)
    {
        $fields = implode(", ", $fields);
        $preparequery = "SELECT $fields FROM $table";

        if ($where)
        {
            $preparequery .= " WHERE " . implode(" AND", $where);
        }

        $query = $this->db->prepare($preparequery);
        $query->execute();
        return $query->fetchall(PDO::FETCH_OBJ);
    }


    public function delete(string $table, array $fields, $id)
    {
        $fields = implode(', ', $fields);
        $preparequery = "DELETE " . $fields ." FROM " . $table . "WHERE id_spotify =" . $id;

        $query = $this->db->prepare($preparequery);

        try
        {
            $query->execute();
            return true;
        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage());
            return false;
        }
    }


    public function getUserArtist()
    {
        // $query = "SELECT DISTINCT `artist`.`name`, `artist_images`.`url` FROM `user`
        // INNER JOIN `user_artist` ON `user`.`id` = `user_artist`.`id_user`
        // INNER JOIN `artist` ON `user_artist`.`id_artist` = `artist`.`spotify_id`
        // LEFT JOIN `artist_images` ON `artist_images`.`id` = `artist`.`id_image`
        // WHERE `user`.`id` = 3";

        $query = "SELECT * FROM `artist` 
        INNER JOIN `artist_images` ON `artist_images`.`id` = `artist`.`id_image`
        INNER JOIN `user_artist` ON `user_artist`.`id_artist` = `artist`.`spotify_id`";

        $prepared = $this->db->prepare($query);
        $prepared->execute();
        return $prepared->fetchAll(PDO::FETCH_OBJ);
    }


}
