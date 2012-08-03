<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    function about_us(){
        $this->template->title('About Us');
        $this->template->build('about_us');
    }


    function  index(){


       $user=$this->facebook->getUser();



        if ($user) {
            redirect(base_url("/hello")) ;
        } else {

        }
        $this->template->title('Home');
        $this->template->build('welcome/index.php');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */