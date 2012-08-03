<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 9/7/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
class Home    extends  CI_Controller
{
    function  index(){


        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl();
        }

        $this->template->title('Home');
        $this->template->build('welcome/index.php',$data);
    }


}
