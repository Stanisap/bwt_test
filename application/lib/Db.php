<?php

/**
 * This class connections with a database and does queries
 */
class Db {
	protected $db;
	
	public function __construct() {
		$config = require 'application/config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
	}

	// против sql инъекций
	public function query($sql, $params = []) {
		$stmt;
		try {
			$stmt = $this->db->prepare($sql);

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
		// Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
		
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

	public function insertId() {
		return $this->db->lastInsertId();
	}

	// запрос на добавления записей в таблюцу
	public function query_to_add($tableName, $data) {
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

	public function query_get_row($tableName, $key) {
		$sql = "SELECT COUNT(*) FROM $tableName WHERE ";
		$sql = "$sql $key LIKE :$key";
		return $sql;

	} 

}