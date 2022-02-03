<?php

namespace Compass;

use \PDO;

class Database {

    private $dbName;
    private $dbAdress;    
    private $dbUser;
    private $dbPassword;
    private $pdo;

    public function __construct($dbAdress, $dbName, $dbUser, $dbPassword) {
        $this->dbAdress = $dbAdress;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
    }

    public function getPDO(): PDO {
    
        if ($this->pdo === null) {
            $this->pdo = new PDO("mysql:dbname=$this->dbName;host=$this->dbAdress", $this->dbUser, $this->dbPassword);
        }

        return $this->pdo;
    }
}
