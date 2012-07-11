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
    return $this->facebook->getLoginUrl();
}

function get_logOutUrl()
{
    $ci =& get_instance();
    return $ci->facebook->getLogoutUrl();
}

