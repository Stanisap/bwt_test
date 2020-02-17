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

	public function is_data($data, $keys = []) {
		foreach ($data as $key => $val) {
			if (!empty($keys)) {
				foreach ($keys as $key1 =>) {
					// todo
				}
			}
		}
	}
}