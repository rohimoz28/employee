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

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            $msg = [
                'data' => $this->load->view('modal_add', '', true)
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

    public function edit()
    {
        $id = $this->input->post('id');
        $query = $this->db->get_where('employees', ['id' => $id]);
        $employee = $query->row();

        $data = [
            'id' => $employee->id,
            'nik' => $employee->nik,
            'name' => $employee->name,
            'mobile' => $employee->mobile
        ];

        $msg = ['success' => $this->load->view('modal_edit', $data, true)];
        echo json_encode($msg);
    }

    public function update()
    {
        $data = $this->employee_model->update();
        echo json_encode($data);
    }

    public function destroy()
    {
        if ($this->input->is_ajax_request()) {

            $this->employee_model->delete();

            $msg = [
                'success' => 'Data employee has been deleted!'
            ];

            echo json_encode($msg);
        }
    }
}
