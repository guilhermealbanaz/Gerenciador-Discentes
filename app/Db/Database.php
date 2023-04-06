<?php

namespace App\Db;

use \PDO;
use PDOStatement;

class Database
{

    const HOST = 'localhost';
    const NAME = 'medio_obs';
    const USER = 'root';
    const PASS = '';

    private string $table;
    private PDO $connection;

    public function __construct(string $table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    public function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }

    public function execute(string $query, array $params = []): PDOStatement
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (\PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }


    public function insert(array $values): int
    {

        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES(' . implode(',', $binds) . ');';
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }




    public function select(string $where = null, string $order = null, string $limit = null, string $fields = '*'): PDOStatement
    {
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }
    public function selectLike(string $search)
    {
        $query = 'SELECT * FROM '.$this->table.' WHERE nome LIKE '." $search".';';
        return $this->execute($query);
    }


    public function update(string $where, array $values):bool
    {
        $fields = array_keys($values);
        $query = 'UPDATE ' .$this->table.' SET '. implode('=?,',$fields).'=? WHERE '.$where;
        $this->execute($query, array_values($values));
        return true;
    }

    public function delete(string $where): bool
    {
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
        return true;
    }
}
