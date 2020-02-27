<?php
/**
 * 
 */



class Model_Form_Feetback extends Model {
	
	public function get_data() {
		
	}

	public function set_data($data) {
		if (empty($data['g-recaptcha-response'])) 
			exit('<p class="error">Заполните капчу</p><a href="/form_feetback">вернуться</a>');
		if ($this->check_captcha($data['g-recaptcha-response'])) {
			$params = [
				'user_id' => $data['user_id'],
				'text' => strip_tags($data['text']),
			];
			$this->db->query($this->db->query_to_add('feetback', $params), $params);
			header('Location: /show_feetback');
		}


		
	}

	private function check_captcha($response) {
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$key = '6Ld1WtwUAAAAAHSScEmxrUmyZ1FbCIcUx3Rm84te';
		
		$query = $url . "?secret=$key&response=" . $response . "&remoteip=" . $_SERVER['REMOTE_ADDR'];
		$requst = json_decode(file_get_contents($query));
		return $requst->success == true;
	}
}