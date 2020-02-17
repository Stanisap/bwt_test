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
		// Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
		$stmt = $this->db->prepare($sql);

		if (!empty($params)) {
			foreach ($params as $key => $val) {
				// Связывает параметр с заданным значением
				$stmt->bindValue(':' . $key, $val);
			}
		}
		// Запускает подготовленный запрос на выполнение
		$stmt->execute();
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

}