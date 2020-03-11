<?php
/**
 * 
 */
namespace application\models;

use application\core\Model;

class AccountModel extends Model
{
    
    public function getData() {}

    public function setData($data)
    {
        if ($this->isInData($data, array('first_name', 'last_name', 'email'))) {
            if ($this->isUser($data)) {
                $this->db->query($this->db->queryToAdd("users", $data), $data);
                setcookie('user_id', $this->db->insertId(), time()+3600, '/');
                header('Location: /');
            } else {
                echo '<h1 class="error">Пользователь с таким email уже существовует!</h1>';
            }
        } else {
            echo '<h1 class="error">Не все обязательные поля заполнены!</h1>';
        }
    }

    private function isUser($data)
    {
        $params = [
            'email' => $data['email'],
        ];
        if ($this->db->column($this->db->queryGetRow("users", "email"), $params) > 0) {
            return false;
        } else {
            return true;
        }
    }
}