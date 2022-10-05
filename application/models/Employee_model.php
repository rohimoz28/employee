<?php
class Employee_model extends CI_Model
{

    function getAllEmployee()
    {
        $hasil = $this->db->get('employees');
        return $hasil->result();
    }

    function save()
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile')
        ];

        $result = $this->db->insert('employees', $data);
        return $result;
    }

    function delete()
    {
        $id = $this->input->post('id');

        return $this->db->delete('employees', ['id' => $id]);
    }
}
