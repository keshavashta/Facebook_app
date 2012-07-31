<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 8/7/12
 * Time: 6:55 PM
 * To change this template use File | Settings | File Templates.
 */
function get_loginUrl()
{
    $ci =& get_instance();
    $params = array(
        'data-scope'=>"email,publish_stream",
        'redirect_uri' => 'http://facebookapp.localhost.com/hello/oauth'
    );
    return $ci->facebook->getLoginUrl($params);
}

function get_logOutUrl()
{
    $ci =& get_instance();

    return $ci->facebook->getLogoutUrl();
}

function getUser(){
    $ci =& get_instance();

    return $ci->facebook->getUser();
//    return $ci->facebook->getUser();
}