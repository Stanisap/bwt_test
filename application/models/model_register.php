<?php
/**
 * 
 */



class Model_Register extends Model
{
	
	public function get_data()
	{
		return $this->db;
	}

	public function set_data($data) {
		
		$this->db->query("INSERT INTO users (first_name, last_name, email, sex, date_birth)".
			" VALUES ('" . $data['first_name'] . "', '" . $data['last_name'] . "', ".
			"'" . $data['email'] . "', '" . $data['sex'] . "', '" . $data['date'] . "')");
	}
}