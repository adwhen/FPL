<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reception extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->Mlogin->check_log();
	}

	public function index()
	{

		$data = array(
			'isi' => 'backend/pages/v_Jamuan',
			'data' => $this->Mreception->data()
		);
		$this->load->view('backend/layout/template', $data);
	}
	public function form($id = null)
	{
		if ($id == null) {
			$view = 'backend/pages/v_Jamuan_form';
		} else {
			$view = 'backend/pages/v_Jamuan_form_e';
			$data['data'] = $this->db->get_where('tb_jamuan', ['IDX_J' => $id])->row();
			$data['tamu_dinas'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $id, 'NAMA_JENIS' => 'TAMU DINAS'])->result();
			$data['lembur'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $id, 'NAMA_JENIS' => 'LEMBUR'])->result();
			$data['bantuan_konsumsi'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $id, 'NAMA_JENIS' => 'BANTUAN KONSUMSI'])->result();
			$data['hist'] = $this->db->get_where('tb_process_hist', ['ID' => $id, 'JENIS' => 'JAMUAN'])->result();
		}
		$data['isi'] = $view;
		$this->load->view('backend/layout/template', $data);
	}
	public function save()
	{
		$this->Mreception->save();
	}
	public function save_edit($IDX)
	{
		$this->Mreception->save_e($IDX);
	}
	public function REC($IDX)
	{
		$this->load->library('Pdf');

		$data['data'] = $this->db->get_where('tb_jamuan', ['IDX_J' => $IDX])->row();
		$data['tamu_dinas'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $IDX, 'NAMA_JENIS' => 'TAMU DINAS'])->result();
		$data['lembur'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $IDX, 'NAMA_JENIS' => 'LEMBUR'])->result();
		$data['bantuan_konsumsi'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $IDX, 'NAMA_JENIS' => 'BANTUAN KONSUMSI'])->result();
		$data['pemohon'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'JAMUAN', 'ID' => $IDX, 'STATUS' => 'KIRIM'])->result_array();
		$data['manager'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'JAMUAN', 'ID' => $IDX, 'STATUS' => 'PASS'])->result_array();
		$this->load->view('pdf/Jamuan', $data);
	}
	public function REC_APPROVE($IDX)
	{
		$this->load->library('Pdf');
		$data['data'] = $this->db->get_where('tb_jamuan', ['IDX_J' => $IDX])->row();
		$data['tamu_dinas'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $IDX, 'NAMA_JENIS' => 'TAMU DINAS'])->result();
		$data['lembur'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $IDX, 'NAMA_JENIS' => 'LEMBUR'])->result();
		$data['bantuan_konsumsi'] = $this->db->get_where('tb_jamuan_jenis', ['IDX_J' => $IDX, 'NAMA_JENIS' => 'BANTUAN KONSUMSI'])->result();
		$data['pemohon'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'JAMUAN', 'ID' => $IDX, 'STATUS' => 'KIRIM'])->result_array();
		$data['manager'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'JAMUAN', 'ID' => $IDX, 'STATUS' => 'PASS'])->result_array();
		$this->load->view('pdf/Jamuan', $data);
	}
	public function approval()
	{
		$IDX = $this->input->post('IDX');
		$KOMENTAR = $this->input->post('KOMENTAR');
		$STATUS = $this->input->post('STATUS');
		if ($STATUS == "PASS") {
			// $this->db->update('tb_jamuan',['PROCESS'=>'APPROVE'], ['IDX_J'=>$IDX]);
			$process = "APPROVE";
			$this->db->update('tb_jamuan', ['PROCESS' => $process, 'DATE_NOMOR' => date('Y-m-d')], ['IDX_J' => $IDX]);
			$this->Mreception->nomor_surat($IDX);
		} else {
			// $this->db->update('tb_jamuan',['PROCESS'=>'REJECTED'], ['IDX_J'=>$IDX]);
			$process = "REJECTED";
			$this->db->update('tb_jamuan', ['PROCESS' => $process, 'DATE_NOMOR' => date('Y-m-d')], ['IDX_J' => $IDX]);
		}

		//$this->db->update('tb_jamuan',['PROCESS'=>$process,], ['IDX_J'=>$IDX]);
		$data = array(
			'KOMENTAR' => $KOMENTAR,
			'DATE_TIME' => date('Y-m-d H:i:s'),
			'ID' => $IDX,
			'JENIS' => 'JAMUAN',
			'NIPP' => $this->session->userdata('nipp'),
			'STATUS' => $STATUS
		);
		$this->db->insert('tb_process_hist', $data);
		echo "OK";
	}
	public function report()
	{
		$data = array(
			'isi' => 'backend/pages/v_Jamuan_report',
			'report' => $this->Mreception->report()->result(),
			'report_uk' =>  $this->Mreception->report_uk()->result(),
		);
		$this->load->view('backend/layout/template', $data);
	}
	public function excel()
	{
		// header("Content-type: application/vnd-ms-excel");
		// header("Content-Disposition: attachment; filename=Jamuan_Dinas.xls");
		$where['DATE_J >='] = $this->input->get('START');
		$where['DATE_J <='] = $this->input->get('FINISH');
		$search['DATA'] = $this->db->join('tb_jamuan_jenis', 'tb_jamuan_jenis.IDX_JJ=tb_jamuan.IDX_J')->get_where('tb_jamuan', $where)->result();
		$this->load->view('report/jamuan_dinas', $search);
	}
}
