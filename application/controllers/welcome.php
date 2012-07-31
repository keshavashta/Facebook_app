<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function about_us(){
        $this->template->title('About Us');
        $this->template->build('about_us');
    }

      function oauth(){
          echo 'hello';
      }
    function  index(){


       $user=$this->facebook->getUser();



        if ($user) {
            redirect(base_url("/hello")) ;
        } else {
            $params = array(
                'scope' => 'read_stream, friends_likes',
                'redirect_uri' => 'http://facebookapp.localhost.com/hello/oauth'
            );
            $data['login'] = $this->facebook->getLoginUrl($params);
        }
        $this->template->title('Home');
        $this->template->build('welcome/index.php',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */