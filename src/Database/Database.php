<?php

namespace Aurora\Database;

class Database {

    protected $pto;

    public function __construct() {
        $this->makePDO();
    }

    protected function makePDO() {
        $host = $_ENV['HOST'];
        $db   =  $_ENV['DB'];
        $user =  $_ENV['USER'];
        $pass =  $_ENV['PASSWORD'];
        $charset =  $_ENV['CHARSET'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_EMULATE_PREPARES   => false
        ];

        try {
            $this->pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    protected function getWhereSQL(array &$where, $withBinding = true, $colName) : string {
        if(empty($where))
            return '';

        $sql = ' WHERE ';


        foreach ($where as $key => $value) {

            $prefix = '';
            $key2 = $key;

            if($withBinding) {
                if(!preg_match('/\./', $key)) 
                    $prefix = $colName.'.';

                if(!preg_match('/\./', $key))
                    $sql .= $prefix.$key.' = '.':'.$key.'';

                if ($key !== array_key_last($where)) {
                    $sql .= ' AND ';
                }
            } else {
                if(!preg_match('/\./', $key)) 
                    $prefix = $colName.'.';

                    $sql .= $prefix.$key.' = '.'"'.$value.'"';

                if ($key !== array_key_last($where)) {
                    $sql .= ' AND ';
                }
            }
            
        }

        return $sql;
    }

    protected function getSelectSQL(array $cols, $colName) {
        $sql = '';

        foreach ($cols as $key => $value) {

            $prefix = '';

            if(!preg_match('/\./', $value))
                $prefix = $colName.'.';

            $sql .= $prefix.$value.', ';
        }

        $sql = substr($sql, 0, strlen($sql)-2);

        return $sql;
    }

    protected function getInsertSQL(array $values) {
        $columns = '(';
        $vals = '(';

        foreach ($values as $key => $value) {
            $columns .= $key.', ';
            $vals .= ':'.$key.', ';
        }

        $columns = substr($columns, 0, strlen($columns)-2);
        $vals = substr($vals, 0, strlen($vals)-2);

        $columns .= ')';
        $vals .= ')';


        return $columns.' VALUES '.$vals;
    }

    protected function getUpdateSQL(array $change, $colName) {
        $sql = '';

        foreach ($change as $key => $value) {
            $sql .= $colName.'.'.$key.' = "'.$value.'", ';
        }

        $sql = substr($sql, 0, strlen($sql)-2);

        return $sql;
    }

    public function getElementById($colName, int $id) {
        $object = $this->pdo->prepare('SELECT * FROM '.$colName.' WHERE id = :id');
        $object->execute(['id' => $id]);
        return $object->fetch();
    }

    public function exist($colName, int $id): bool {
        $object = $this->pdo->prepare('SELECT * FROM '.$colName.' WHERE id = :id');
        $object->execute(['id' => $id]);
        $object = $object->fetch();

        return \is_object($object);
    }

    public function getElements($colName, array $where = [], array $cols = ['*']) {
        $object = $this->pdo->query('SELECT '.$this->getSelectSQL($cols, $colName).' FROM ' . $colName .$this->getWhereSQL($where, false, $colName));
        return $object->fetchAll();
    }

    public function getElement($colName, array $where = [], array $cols = ['*']) {
        $object = $this->pdo->query('SELECT '.$this->getSelectSQL($cols, $colName).' FROM ' . $colName .$this->getWhereSQL($where, false, $colName));
        return $object->fetch();
    }

    public function truncate($colName) {
        $object = $this->pdo->prepare('TRUNCATE TABLE ' . $colName);
        $object->execute();
    }

    public function sql($sql, array $variables = []) {
        $object = $this->pdo->prepare($sql);

        $object->execute($variables);

        return $object->fetchAll();
    }

    public function drop($colName) {
        $object = $this->pdo->prepare('DROP TABLE ' . $colName);
        $object->execute();
    }

    public function update($colName, array $where, array $change) {

        $object = $this->pdo->prepare('UPDATE '.$colName.' SET '.$this->getUpdateSQL($change, $colName).$this->getWhereSQL($where, true, $colName));
        $object->execute($where);
    }

    public function delete($colName, array $where) { 
        $object = $this->pdo->prepare('DELETE FROM '.$colName.$this->getWhereSQL($where, true, $colName));
        $object->execute($where);
        return $object->fetch();
    }

    public function insert($colName, array $values) {
        $object = $this->pdo->prepare('INSERT INTO '.$colName.' '.$this->getInsertSQL($values));
        $object->execute($values);
    }

}