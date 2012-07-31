<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 21/7/12
 * Time: 6:37 PM
 * To change this template use File | Settings | File Templates.
 */
class Logout extends CI_Controller {
    public function index() {
        echo 'Logout';
//
//        $this->session->sess_destroy();  // Assuming you have session helper loaded
//        $this->load->view('logout');
    }
}