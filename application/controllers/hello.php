<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 9/7/12
 * Time: 1:19 AM
 * To change this template use File | Settings | File Templates.
 */
class Hello extends CI_Controller
{
    function oauth()
    {
        try {

            $data['user_profile'] = $this->facebook->api('/me');
            $user_model_instance = new User();
            if (!$user_model_instance->is_user_exist(getUser()))
                $user_model_instance->save($data);
            $this->template->title('Home');
            $data['name'] = $user_model_instance->get_user_profile(getUser())->name;
            $this->template->build('welcome/welcome', $data);
        } catch (FacebookApiException $e) {
            echo $e;
            $user = null;
        }
    }

    function  index()
    {


    }

    function edit_profile()
    {
        $user_model_instance = new User();
        $result = array();
        $result['data'] = $user_model_instance->get_user_profile(getUser());
        $this->template->title('Edit Profile');
        $this->template->build('welcome/edit_profile', $result);
    }

    function update()
    {
        $user_id = $this->input->post('id');
        $dob = $this->input->post('dob');
        $location = $this->input->post('location');
        $name = $this->input->post('name');
        $blood_gp = $this->input->post('blood_gp');
        $data = array(
            'name' => $name,
            'dob' => $dob,
            'blood_gp' => $blood_gp,
            'address' => $location,
            'user_id' => $user_id
        );
        $user_model_instance = new User();
        $user_model_instance->update_user($data);
    }

    function post_to_friend_wall()
    {
        $user_id = $_GET['user_id'];
        if(empty($user_id))
        {
            echo false;
            return;
        }
        $instance =new User();
        $profile=$instance->get_user_profile($user_id);
        $name =$profile->name;
        $blood_gp=$profile->blood_gp;
        try {
            $post_id = $this->facebook->api('/' . $user_id . '/feed', 'POST',
                array('message' => get_blood_gp_req_msg($blood_gp,$name),));
            echo true;
        } catch (FacebookApiException $e) {
            echo false;
        }
    }
     function post_to_wall(){
         echo false;
     }
    function friends()
    {
        $friendsLists = $this->facebook->api('/me/friends');
        $instance = new Friend();
        $user_instance = new User();
        $blood_gp = $user_instance->get_user_profile(getUser())->blood_gp;
        $friend_with_same_gp = array();
        $friend_with_diff_gp = array();
        $unknown_friends = array();
        foreach ($friendsLists as $friends) {
            foreach ($friends as $friend) {

                $id = $friend['id'];
                $name = $friend['name'];
                $temp = $instance->get_friend_with_blood_gps($id, $blood_gp);
                if (!empty($temp))
                    $friend_with_same_gp[] = $temp;
                $temp = $instance->get_friends_with_diff_gp($id, $blood_gp);
                if (!empty($temp))
                    $friend_with_diff_gp[] = $temp;
                if (!$instance->is_user_exist($id))
                    $unknown_friends[] = $name;
            }
        }
        $data['friend_with_diff_gp'] = $friend_with_diff_gp;
        $data['friend_with_same_gp'] = $friend_with_same_gp;
        $data['unknown_friends'] = $unknown_friends;
        $this->template->title('Friends');
        $this->template->build('welcome/friends', $data);

    }
}
