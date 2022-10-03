<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
    }

    public function index()
    {
        $this->load->view('employee_view');
    }
}
