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

    public function employee_data()
    {
        if ($this->input->is_ajax_request()) {
            $data['employees'] = $this->employee_model->getAllEmployee();

            $msg = [
                'data' => $this->load->view('employee_list', $data, true)
            ];

            echo json_encode($msg);
        } else {
            exit('Data tidak dapat di proses!');
        }
    }

    public function save()
    {
        $data = $this->employee_model->save();
        echo json_encode($data);
    }
}
