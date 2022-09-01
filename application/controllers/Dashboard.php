<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->Mlogin->check_log();
    }

	public function index()
	{
		$data=array(
			'isi'=>'backend/pages/v_Dashboard',
			'kendaraan' => $this->db->get('tb_jenis_kendaraan')->result_array(),
			'peminjam' => $this->db->order_by('TIME_PK_AWAL','ASC')->get_where('tb_peminjaman_kendaraan',['PROCESS'=>'APPROVE'])->result_array()
		);
		$this->load->view('backend/layout/template',$data);
	}
}
