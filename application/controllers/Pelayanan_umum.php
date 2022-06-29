<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan_umum extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->Mlogin->check_log();
    }

    public function index()
    {

        $data = array(
            'isi' => 'backend/pages/v_Pelayanan_umum',
            'data' => $this->Mpelayananumum->data()
        );
        $this->load->view('backend/layout/template', $data);
    }
    public function form($id = null)
    {
        if ($id == null) {
            $view = 'backend/pages/v_Pelayanan_umum_form';
        } else {
            $view = 'backend/pages/v_Pelayanan_umum_form_e';
            $data['data'] = $this->db->get_where('tb_pelayanan_umum', ['IDX_UMUM' => $id])->row();
            $data['hist'] = $this->db->get_where('tb_process_hist', ['ID' => $id, 'JENIS' => 'PELAYANAN UMUM'])->result();
        }
        $data['isi'] = $view;
        $this->load->view('backend/layout/template', $data);
    }
    public function save()
    {
        $this->Mpelayananumum->save();
    }
    public function save_edit($IDX)
    {
        $this->Mpelayananumum->save_e($IDX);
    }
    public function REC($IDX)
    {
        $this->load->library('Pdf');
        $data['data'] = $this->db->get_where('tb_pelayanan_umum', ['IDX_UMUM' => $IDX])->row();
        $data['pemohon'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'PELAYANAN UMUM', 'ID' => $IDX, 'STATUS' => 'KIRIM'])->result_array();
        $data['manager'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'PELAYANAN UMUM', 'ID' => $IDX, 'STATUS' => 'PASS'])->result_array();
        $this->load->view('pdf/pelayanan_umum', $data);
    }
    public function REC_APPROVE($IDX)
    {
        $this->load->library('Pdf');
        $data['data'] = $this->db->get_where('tb_pelayanan_umum', ['IDX_UMUM' => $IDX])->row();
        $data['pemohon'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'PELAYANAN UMUM', 'ID' => $IDX, 'STATUS' => 'KIRIM'])->result_array();
        $data['manager'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'PELAYANAN UMUM', 'ID' => $IDX, 'STATUS' => 'PASS'])->result_array();
        $this->load->view('pdf/pelayanan_umum', $data);
    }
    public function approval()
    {
        $IDX = $this->input->post('IDX');
        $KOMENTAR = $this->input->post('KOMENTAR');
        $STATUS = $this->input->post('STATUS');
        if ($STATUS == "PASS") {
            $this->db->update('tb_pelayanan_umum', ['PROCESS' => 'APPROVE', 'DATE_NOMOR' => date('Y-m-d')], ['IDX_UMUM' => $IDX]);
            $this->Mpelayananumum->nomor_surat($IDX);
        } else {
            $this->db->update('tb_pelayanan_umum', ['PROCESS' => 'REJECTED'], ['IDX_UMUM' => $IDX]);
        }
        $data = array(
            'KOMENTAR' => $KOMENTAR,
            'DATE_TIME' => date('Y-m-d H:i:s'),
            'ID' => $IDX,
            'JENIS' => 'PELAYANAN UMUM',
            'NIPP' => $this->session->userdata('nipp'),
            'STATUS' => $STATUS
        );
        $this->db->insert('tb_process_hist', $data);
        echo "OK";
    }
    public function report()
    {
        $data = array(
            'isi' => 'backend/pages/v_report_pu',
            'diagram' => $this->Mpelayananumum->diagram_report()->result(),
            'report_unit_kerja' => $this->Mpelayananumum->diagram_report_uk()->result(),
        );
        $this->load->view('backend/layout/template', $data);
    }
    public function excel()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Pelayanan_Umum.xls");
        $where['DATE_UMUM >='] = $this->input->get('START');
        $where['DATE_UMUM <='] = $this->input->get('FINISH');
        $search['DATA'] = $this->db->get_where('tb_pelayanan_umum', $where)->result();
        $this->load->view('report/pelayanan_umum', $search);
    }
}
