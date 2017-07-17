<?php

namespace App;

use App\Exceptions\NotFoundException;
use App\Exceptions\DBConnectException;
use App\Exceptions\DBRequestException;

class Db
{
    protected $dbh;

    public function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
        } catch (\PDOException $e) {

            throw new DBConnectException('Ошибка при подключений к БД');
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function execute($sql, $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
        } catch (\PDOException $e) {
            throw new DBRequestException('Ошибка в запросе');
        }
        return $sth->execute($params);
    }

    public function query($sql, $className = 'stdClass', $prepare = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($prepare);
        $data = $sth->fetchAll(\PDO::FETCH_CLASS, $className);
        return $data;
    }

    public function queryEach($sql,  $className = 'stdClass', $prepare = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($prepare);
        yield $sth->fetch(\PDO::FETCH_OBJ);
    }
}