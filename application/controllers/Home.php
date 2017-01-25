<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index()
    {
        $this->session->set_userdata("selected_menu","Home");
        $this->load->view('header');
        $this->load->view('upload');
        $this->load->view('footer');
    }
}
