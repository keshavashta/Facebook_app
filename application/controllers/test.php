<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 21/7/12
 * Time: 11:51 AM
 * To change this template use File | Settings | File Templates.
 */
class Test extends CI_Controller
{
    function myfunction()
    {
        echo 'my';
    }

    function post_to_friendWall()
    {
        $post_id = $this->facebook->api('/' . "100001311513120" . '/feed', 'POST',
            array('message' => 'This post has been made on a friend\'s wall',));

    }

    function  reset_user()
    {
        $this->facebook->resetUser();
    }

    function test_age()
    {
        echo age_from_dob("16-12-1986");
    }

    function curl_test()
    {
        $ch1 = curl_init();
        $ch2 = curl_init();

// set URL and other appropriate options
        curl_setopt($ch1, CURLOPT_URL, "http://facebookapp.localhost.com/test/time");
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_URL, "http://facebookapp.localhost.com/test/time");
        curl_setopt($ch2, CURLOPT_HEADER, 0);

//create the multiple cURL handle
        $mh = curl_multi_init();

//add the two handles
        curl_multi_add_handle($mh, $ch1);
        curl_multi_add_handle($mh, $ch2);

        $active = null;
//execute the handles
        do {
            $mrc = curl_multi_exec($mh, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);

        while ($active && $mrc == CURLM_OK) {
            if (curl_multi_select($mh) != -1) {
                do {
                    $mrc = curl_multi_exec($mh, $active);
                } while ($mrc == CURLM_CALL_MULTI_PERFORM);
            }
        }

//close the handles
        curl_multi_remove_handle($mh, $ch1);
        curl_multi_remove_handle($mh, $ch2);
        curl_multi_close($mh);
    }

    function time()
    {
        sleep(60);
    }

    function index()
    {
        $this->user = 0;
        $this->facebook->destroySession();
        $this->facebook->destroySession();
        echo getUser();
    }

    function user_id()
    {
        var_dump($this->facebook->getUser());
    }

    function get_user_id()
    {
        try {
            var_dump($this->facebook->get);
            $user_profile = $this->facebook->api('/me');
            var_dump($user_profile);
        } catch (FacebookApiException $e) {
            echo '<pre>' . htmlspecialchars(print_r($e, true)) . '</pre>';
        }
    }

    function friends()
    {
        $friendsLists = $this->facebook->api('/me/friends');
//<!--        $instance = new Friend();-->
//<!--        $existing_friend = array();-->
        foreach ($friendsLists as $friends) {
            foreach ($friends as $friend) {
                // do something with the friend, but you only have id and name
                $id = $friend['id'];
                $name = $friend['name'];
                echo $name;
                echo $id;
                echo "<br/>";
//                $temp = $instance->get_active_friends($id);
                if (!empty($temp))
                    $existing_friend[] = $temp;
            }
        }

    }
}
