<?php
/**
 * 
 */
namespace application\core;


abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \application\lib\DB::getInstance();
    }
    
    abstract function getData();

    // Проверка на пустоту значений в запросе
    public function isInData($data, $keys = [])
    {
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
}