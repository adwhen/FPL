<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->Mlogin->check_log();
    }

    public function employee()
    {

        $data = array(
            'isi' => 'backend/pages/v_Employee',
            'data' => $this->MEmployee->data()->result_array(),
            'unit_kerja' => $this->db->get('tb_unit_kerja')->result()
        );
        $this->load->view('backend/layout/template', $data);
    }
    public function employee_form()
    {

        $data = array(
            'isi' => 'backend/pages/v_Employee_form',
            'data' => $this->MEmployee->data()->result_array()
        );
        $this->load->view('backend/layout/template', $data);
    }
    public function save_employee(){
        $this->MEmployee->save();
        redirect('master/employee');
    }
    public function employee_hapus($idx){
        $this->db->delete('mst_user',['IDX'=>$idx]);
        redirect('master/employee');
    }
   
}
