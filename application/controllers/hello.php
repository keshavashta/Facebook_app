<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 9/7/12
 * Time: 1:19 AM
 * To change this template use File | Settings | File Templates.
 */
class Hello  extends CI_Controller
{
    function  index(){

            try {

                $data['user_profile'] = $this->facebook->api('/me');
                $user_model_instance=  new User();
                $user_model_instance->save($data);
                $this->template->title('Home');
                $this->template->build('welcome/welcome',$data);
            } catch (FacebookApiException $e) {
               echo $e;
                $user = null;
            }
        }

    function update(){
        $fb_id = $this->input->post('id');
        $age = $this->input->post('age');
        $location = $this->input->post('location');
        $name = $this->input->post('name');
        $blood_gp=$this->input->post('blood_gp');
        $data=array(
            'name' => $name,
            'age' => $age,
            'blood_gp' => $blood_gp,
            'address'   =>$location,
            'id'=>$fb_id
        );
        $user_model_instance=  new User();

        $user_model_instance->update_user($data);
    }
}
