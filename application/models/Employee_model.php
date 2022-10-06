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

    public function update()
    {
        $id = $this->input->post('id');
        $data = [
            'nik' => $this->input->post('nik'),
            'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile')
        ];

        $result = $this->db->update('employees', $data, ['id' => $id]);
        return $result;
    }

    function delete()
    {
        $id = $this->input->post('id');

        return $this->db->delete('employees', ['id' => $id]);
    }
}
