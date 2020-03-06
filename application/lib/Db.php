<?php

/**
 * This class connections with a database and does queries
 */
class DB
{
    private static $_instance = null;
    
    private function __construct()
    {
        $config = require 'application/config/db.php';
        self::$_instance = new PDO(
            'mysql:host='.$config['host'].';dbname='.$config['name'].'',
            $config['user'],
            $config['password'],
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );
    }

    private function __clone() {}

    private function __wakeup() {}

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }
        return new self;
    }

    // против sql инъекций
    public function query($sql, $params = [])
    {
        $stmt;
        try {
            $stmt = self::$_instance->prepare($sql);

            if (!empty($params)) {

                foreach ($params as $key => $val) {
                    if ($val != "")
                // Связывает параметр с заданным значением
                        $stmt->bindValue(':' . $key, $val);
                }
            }
            // Запускает подготовленный запрос на выполнение
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        return $stmt;
    }

    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    // получение id добавленой записи
    public function insertId()
    {
        return self::$_instance->lastInsertId();
    }

    // запрос на добавления записей в таблюцу
    public function queryToAdd($tableName, $data)
    {
        $keys1 = [];
        $keys2 = array_keys($data);
        for ($i = 0; $i < count($keys2); $i++) {
            if ($data["$keys2[$i]"] != "") {
                array_push($keys1, $keys2[$i]);
                $keys2[$i] = ':' . $keys2[$i];
            } else {
                unset($keys2[$i]);
            }
        }
        $sql = "INSERT INTO $tableName (";
        $columnName = implode(', ', $keys1);
        $valueName = implode(', ', $keys2);
        $sql = "$sql $columnName) VALUES ( $valueName )";
        return $sql;

    }

    // Запрос для получения колличества по ключю
    public function queryGetRow($tableName, $key)
    {
        $sql = "SELECT COUNT(*) FROM $tableName WHERE ";
        $sql = "$sql $key LIKE :$key";
        return $sql;

    } 

    // запрос для получения всех данный из таблицы
    public function queryGetAll($tableName)
    {
        return "SELECT * FROM $tableName";
    }
    // запрос на получения данных по id
    public function queryById($tableName)
    {
        return "SELECT * FROM $tableName WHERE id = :id";
    }

}