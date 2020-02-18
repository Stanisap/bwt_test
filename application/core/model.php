<?php
/**
 * 
 */
include 'application/lib/Db.php';

abstract class Model
{
	protected $db;

	public function __construct() {
		$this->db = new Db();
	}
	
	abstract function get_data();

	// Проверка на пустоту значений в запросе
	public function is_in_data($data, $keys = []) {
		// Счетыик для подсчета проверяемых данных
		$count = 0;
		// Проверка проверяемый ключей на существование и пустоту
		if (!empty($keys)) {
			foreach ($keys as $key) {
				if (isset($data["$key"]) && $data["$key"] == "") {
					$count++;
				}
			}
		} else { // если ключи не переданны, то проверяем все ключи в данных на пустоту
			foreach ($data as $key => $val) {
				if ($val == "") {
					$count++;
				}
			}
		}
		// Если счетчик не равен 0, то в данных есть пустые значения
		if ($count != 0) {
			return false;
		} else {
			return true;
		}
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