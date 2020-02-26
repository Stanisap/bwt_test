<?php
/**
 * 
 */



class Model_Form_Feetback extends Model {
	
	public function get_data() {
		
	}

	public function set_data($data) {
		if (empty($data['g-recaptcha-response'])) 
			exit('<p class="error">Заполните капчу</p>');
		if ($this->check_captcha($data['g-recaptcha-response'])) {
			// to add the data into db
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