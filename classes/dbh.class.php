<?php


class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "2412933bacho";
    private $dbName = "manuchari";

    protected function connect() 
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $PDO = new PDO($dsn, $this->user, $this->pwd);

        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $PDO;
    }
}