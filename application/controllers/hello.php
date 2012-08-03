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

    function friends()
    {
        $friendsLists = $this->facebook->api('/me/friends');
         $instance = new Friend();
        $user_instance=new User();
        $blood_gp=$user_instance->get_user_profile(getUser())->blood_gp;
        $friend_with_same_gp = array();
        foreach ($friendsLists as $friends) {
            foreach ($friends as $friend) {

                $id = $friend['id'];
                $name = $friend['name'];
//                echo $id;
                   $temp = $instance->get_friend_with_blood_gps($id,$blood_gp);
                if (!empty($temp))
                    $friend_with_same_gp[] = $temp;
            }
        }

        $data['friend_with_same_gp']=$friend_with_same_gp;
        $this->template->title('Friends');
        $this->template->build('welcome/friends', $data);

    }
}
