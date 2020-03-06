<?php 

/**
 * 
 */
class Model_Show_Feetback extends Model
{
    

    function get_data()
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
}