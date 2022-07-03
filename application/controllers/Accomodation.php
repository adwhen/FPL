<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accomodation extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->Mlogin->check_log();
	}

	public function index()
	{

		$data = array(
			'isi' => 'backend/pages/v_Akomodasi',
			'data' => $this->Maccomodation->data()
		);
		$this->load->view('backend/layout/template', $data);
	}
	public function form($id = null)
	{
		if ($id == null) {
			$view = 'backend/pages/v_Akomodasi_form';
		} else {
			$view = 'backend/pages/v_Akomodasi_form_e';
			$data['data'] = $this->db->get_where('tb_akomodasi', ['IDX_A' => $id])->row();
			$data['diklat'] = $this->db->get_where('tb_akomodasi_jenis', ['IDX_A' => $id, 'NAMA_AJ' => 'DIKLAT'])->result();
			$data['dinas_harian'] = $this->db->get_where('tb_akomodasi_jenis', ['IDX_A' => $id, 'NAMA_AJ' => 'DINAS HARIAN'])->result();
			$data['hist'] = $this->db->get_where('tb_process_hist', ['ID' => $id, 'JENIS' => 'AKOMODASI'])->result();
		}
		$data['isi'] = $view;
		$this->load->view('backend/layout/template', $data);
	}
	public function save()
	{
		$this->Maccomodation->save();
	}
	public function save_edit($IDX)
	{
		$this->Maccomodation->save_e($IDX);
	}
	public function REC($IDX)
	{
		$this->load->library('Pdf');

		$data['data'] = $this->db->get_where('tb_akomodasi', ['IDX_A' => $IDX])->row();
		$data['diklat'] = $this->db->get_where('tb_akomodasi_jenis', ['IDX_A' => $IDX, 'NAMA_AJ' => 'DIKLAT'])->result();
		$data['dinas_harian'] = $this->db->get_where('tb_akomodasi_jenis', ['IDX_A' => $IDX, 'NAMA_AJ' => 'DINAS HARIAN'])->result();
		$data['pemohon'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'AKOMODASI', 'ID' => $IDX, 'STATUS' => 'KIRIM'])->result_array();
		$data['manager'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'AKOMODASI', 'ID' => $IDX, 'STATUS' => 'PASS'])->result_array();
		$this->load->view('pdf/Akomodasi', $data);
	}
	public function REC_APPROVE($IDX)
	{
		$this->load->library('Pdf');
		$data['data'] = $this->db->get_where('tb_akomodasi', ['IDX_A' => $IDX])->row();
		$data['diklat'] = $this->db->get_where('tb_akomodasi_jenis', ['IDX_A' => $IDX, 'NAMA_AJ' => 'DIKLAT'])->result();
		$data['dinas_harian'] = $this->db->get_where('tb_akomodasi_jenis', ['IDX_A' => $IDX, 'NAMA_AJ' => 'DINAS HARIAN'])->result();
		$data['pemohon'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'AKOMODASI', 'ID' => $IDX, 'STATUS' => 'KIRIM'])->result_array();
		$data['manager'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'AKOMODASI', 'ID' => $IDX, 'STATUS' => 'PASS'])->result_array();
		$this->load->view('pdf/Akomodasi', $data);
	}
	public function approval()
	{
		$IDX = $this->input->post('IDX');
		$KOMENTAR = $this->input->post('KOMENTAR');
		$STATUS = $this->input->post('STATUS');
		if ($STATUS == "PASS") {
			$process = "APPROVE";
			$this->db->update('tb_akomodasi', ['PROCESS' => $process, 'DATE_NOMOR' => date('Y-m-d')], ['IDX_A' => $IDX]);
			$this->Maccomodation->nomor_surat($IDX);
		} else {
			$process = "REJECTED";
			$this->db->update('tb_akomodasi', ['PROCESS' => $process, 'DATE_NOMOR' => date('Y-m-d')], ['IDX_A' => $IDX]);
		}
		$data = array(
			'KOMENTAR' => $KOMENTAR,
			'DATE_TIME' => date('Y-m-d H:i:s'),
			'ID' => $IDX,
			'JENIS' => 'AKOMODASI',
			'NIPP' => $this->session->userdata('nipp'),
			'STATUS' => $STATUS
		);
		$this->db->insert('tb_process_hist', $data);
		echo "OK";
	}
	public function report()
	{
		$data = array(
			'isi' => 'backend/pages/v_Akomodasi_report',
			'report_uk' => $this->Maccomodation->report_uk()->result(),
		);
		$this->load->view('backend/layout/template', $data);
	}
	public function excel()
	{
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Akomodasi_SPPD.xls");
		$where['DATE_TTD >='] = $this->input->get('START');
		$where['DATE_TTD <='] = $this->input->get('FINISH');
		$search['DATA'] = $this->db->join('tb_akomodasi_jenis', 'tb_akomodasi_jenis.IDX_A=tb_akomodasi.IDX_A')->get_where('tb_akomodasi', $where)->result();
		$this->load->view('report/akomodasi_sppd', $search);
	}
}
