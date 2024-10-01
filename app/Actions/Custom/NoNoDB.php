<?php

namespace App\Actions\Custom;

use PDO;

class NoNoDB
{
    private $pdo = null;
    private $dbConn;
    private $dbHost;
    private $dbPort;
    private $dbName;
    private $dbUsername;
    private $dbPassword;
    private $charSet = 'utf8';

    function __construct()
    {
        $this->dbConn = env('DB_CONNECTION');
        $this->dbHost = env('DB_HOST');
        $this->dbPort = env('DB_PORT');
        $this->dbName = env('DB_DATABASE');
        $this->dbUsername = env('DB_USERNAME');
        $this->dbPassword = env('DB_PASSWORD');
        $this->setPDO();
    }

    public function getDSN()
    {
        return "$this->dbConn:host=$this->dbHost;port=$this->dbPort;user=$this->dbUsername;password=$this->dbPassword;dbname=$this->dbName;charset=$this->charSet;";
    }

    public function getPDO()
    {
        return $this->pdo;
    }

    public function noNoQuery(string $query)
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    private function setPDO()
    {
        $this->pdo = new PDO($this->getDSN());
    }
}

//DB_CONNECTION=mysql
//DB_HOST=127.0.0.1
//DB_PORT=3306
//DB_DATABASE=sql_injection_test
//DB_USERNAME=laravel
//DB_PASSWORD=secret
