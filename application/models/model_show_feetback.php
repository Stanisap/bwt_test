<?php 

/**
 * 
 */
class Model_Show_Feetback extends Model {
	

	function get_data() {
		$data = $this->db->row($this->db->query_get_all('feetback'));
		for ($i = 0; $i < count($data); $i++) {
			$params = [
				'id' => $data[$i]['user_id'],
			];
			$user = $this->db->row($this->db->query_by_id('users'), $params);
			$data[$i]['user'] = [
				'first_name' => $user[0]['first_name'],
				'last_name' => $user[0]['last_name'],
			];
			
		}
		
		return $data;
	}
}