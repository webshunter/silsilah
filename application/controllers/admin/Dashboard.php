<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('templateadmin/footer');
    }
}