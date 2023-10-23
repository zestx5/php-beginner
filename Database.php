<?php

class Database
{
    private $connection;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4';

        $this->connection = new PDO($dsn, 'zest', '123456');
    }
    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}