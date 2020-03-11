<?php
/**
 * 
 */
namespace application\models;

use application\core\Model;

class FeetbackModel extends Model
{
    
    public function getData()
    {
         $data = $this->db->row($this->db->queryGetAll('feetback'));
        for ($i = 0; $i < count($data); $i++) {
            $params = [
                'id' => $data[$i]['user_id'],
            ];
            $user = $this->db->row($this->db->queryById('users'), $params);
            $data[$i]['user'] = [
                'first_name' => $user[0]['first_name'],
                'last_name' => $user[0]['last_name'],
            ];
            
        }
        
        return $data;
    }

    public function setData($data)
    {
        if (empty($data['g-recaptcha-response'])) 
            exit('<p class="error">Заполните капчу</p><a href="/form_feetback">вернуться</a>');
        if ($this->checkCaptcha($data['g-recaptcha-response'])) {
            $params = [
                'user_id' => $data['user_id'],
                'text' => strip_tags($data['text']),
            ];
            $this->db->query($this->db->queryToAdd('feetback', $params), $params);
            header('Location: /feetback/show');
        }


        
    }

    private function checkCaptcha($response)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $key = '6Ld1WtwUAAAAAHSScEmxrUmyZ1FbCIcUx3Rm84te';
        
        $query = $url . "?secret=$key&response=" . $response . "&remoteip=" . $_SERVER['REMOTE_ADDR'];
        $requst = json_decode(file_get_contents($query));

        return $requst->success == true;
    }
}