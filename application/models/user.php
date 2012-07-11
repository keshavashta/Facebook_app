<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 9/7/12
 * Time: 7:58 PM
 * To change this template use File | Settings | File Templates.
 */
class User extends CI_Model
{
    public function save($data)
    {
    if($this->is_userExist($data['user_profile']['id']))
    {
        echo ' exist';

    }
        else{
            echo "not exist";

        }
    }

    public function update_user($result)
    {
        $data = array(
            'name' => $result['name'],
            'age' => $result['age'],
            'blood_gp' => $result['blood_gp'],
            'address'   =>$result['name']
        );

        $this->db->where('user_id', $result['id']);
        $this->db->update('user', $data);
    }

    public function get_userFriends()
    {

    }

    public function is_userExist($id)
    {
        $query = $this->db->get_where('user', array('user_id' => $id));
        $rowcount = $query->result();

        if (empty($rowcount))
            return false;
        else return true;
    }
}
