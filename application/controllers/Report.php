<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->Mlogin->check_log();
    }

    public function index()
    {

        $data = array(
            'isi' => 'backend/pages/v_Report',
            'data' => $this->Mreception->data()
        );
        $this->load->view('backend/layout/template', $data);
    }
}
