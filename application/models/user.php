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
        $name_and_id = array(
            'user_id' => $data['user_profile']['id'],
            'name' => $data['user_profile']['name']
        );

        $this->db->insert('user', $name_and_id);


    }

    public function get_user_profile($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        $result = $this->db->get()->row();
        return $result;
    }

    public function update_user($result)
    {
        $data = array(
            'name' => $result['name'],
            'dob' => $result['dob'],
            'blood_gp' => $result['blood_gp'],
            'address' => $result['address']
        );

        $this->db->where('user_id', $result['user_id']);
        $this->db->update('user', $data);
    }

    public function get_userFriends()
    {

    }

    public function is_user_exist($id)
    {
        $query = $this->db->get_where('user', array('user_id' => $id));
        $result = $query->result();

        if (empty($result))
            return false;
        else return true;
    }
}
