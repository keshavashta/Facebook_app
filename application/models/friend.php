<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 24/7/12
 * Time: 7:02 AM
 * To change this template use File | Settings | File Templates.
 */
class Friend extends CI_Model
{
    function get_active_friends($friend_id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $friend_id);
        $result = $this->db->get()->row();
        return $result;
    }

    function is_user_exist($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        $result = $this->db->get()->row();
        if (empty($result))
            return false;
        else
            return true;
    }

    function get_friends_blood_gp($friend_id)
    {
        $this->db->select('name,age,blood_gp');
        $this->db->from('user');
        $this->db->where('fb_id', $friend_id);
        $this->db->where('blood_gp !=', null);
        $result = $this->db->get()->row();
        return $result;
    }

    function get_friends_with_diff_gp($friend_id, $blood_gp)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $friend_id);
        $this->db->where('blood_gp !=', $blood_gp);
        $this->db->where('blood_gp  IS NOT NULL');
        $result = $this->db->get()->row();
        return $result;
    }

    function get_friend_with_blood_gps($friend_id, $blood_gp)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $friend_id);
        $this->db->where('blood_gp', $blood_gp);
        $result = $this->db->get()->row();
        return $result;
    }


}
