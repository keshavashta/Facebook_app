<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 9/10/12
 * Time: 7:00 PM
 * To change this template use File | Settings | File Templates.
 */
class About_Us   extends CI_Controller
{
     function index(){
         $this->template->title('About Us');
         $this->template->build('about_us');
     }
}
