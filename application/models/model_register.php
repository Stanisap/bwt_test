<?php
/**
 * 
 */

class Model_Register extends Model {
	
	public function get_data() {
	
	}

	public function set_data($data) {
		if ($this->is_in_data($data, array('first_name', 'last_name', 'email'))) {
			if ($this->is_user($data)) {
				$this->db->query($this->db->query_to_add("users", $data), $data);
				setcookie('user_id', $this->db->insertId(), time()+3600, '/');
				header('Location: /');
			} else {
				echo '<h1 class="error">Пользователь с таким email уже существовует!</h1>';
			}
		} else {
			echo '<h1 class="error">Не все обязательные поля заполнены!</h1>';
		}
	}

	private function is_user($data) {
		$params = [
			'email' => $data['email'],
		];
		if ($this->db->column($this->db->query_get_row("users", "email"), $params) > 0) {
			return false;
		} else {
			return true;
		}
	}
}