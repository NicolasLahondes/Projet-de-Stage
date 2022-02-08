<?php

namespace Compass;

use \PDO;

class Database
{

    private $dbName;
    private $dbAdress;
    private $dbUser;
    private $dbPassword;
    private $pdo;
    public $db;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = $this->getPDO('mariadb', 'database', 'user', 'zeus');
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

        if ($this->pdo === null) {
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
        $fields = implode(", ",$fields);
        $preparequery = "SELECT $fields FROM $table";
        $query = $this->db->prepare($preparequery);
        print_r($query);
        $query->execute();
        return $query->fetchall(PDO::FETCH_ASSOC);
    }
}
