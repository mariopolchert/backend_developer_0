<?php

namespace Core;

use PDO;
use PDOStatement;

class Database {

    private PDO $pdo;
    private PDOStatement $statement;

    public function __construct()
    {
        $config = require base_path('config/database.php');
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['password'], $config['options']);
        } catch (\PDOException $exception) {
            die('Connection to the database has filed! ' . $exception->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $this->statement = $this->pdo->prepare($sql);

        try {
            $this->statement->execute($params);
        } catch (\PDOException $e) {
            die('Something went wrong, please try again ' . $e->getMessage());
        }
       
        return $this;
    }

    public function find()
    {
       return $this->statement->fetch();
    }

    public function all()
    {
       return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $data = $this->find();

        if (empty($data)) {
            abort();
        }

        return $data;
    }
}