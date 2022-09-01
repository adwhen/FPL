<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->Mlogin->check_log();
    }

    public function index()
    {

        $data = array(
            'isi' => 'backend/pages/v_Peminjaman_kendaraan',
            'data' => $this->Mloan->data()
        );
        $this->load->view('backend/layout/template', $data);
    }
    public function form($id = null)
    {
        if ($id == null) {
            $view = 'backend/pages/v_Peminjaman_kendaraan_form';
        } else {
            $view = 'backend/pages/v_Peminjaman_kendaraan_form_e';
            $data['data'] = $this->db->get_where('tb_peminjaman_kendaraan', ['IDX_PK' => $id])->row();
            $data['hist'] = $this->db->get_where('tb_process_hist', ['ID' => $id, 'JENIS' => 'PEMINJAMAN KENDARAAN'])->result();
        }
        $data['isi'] = $view;
        $data['jenis_kendaraan'] = $this->db->get('tb_jenis_kendaraan')->result();
        $this->load->view('backend/layout/template', $data);
    }
    public function save()
    {
        $this->Mloan->save();
    }
    public function save_edit($IDX)
    {
        $this->Mloan->save_e($IDX);
    }
    public function REC($IDX)
    {
        $this->load->library('Pdf');
        $data['data'] = $this->db->get_where('tb_peminjaman_kendaraan', ['IDX_PK' => $IDX])->row();
        $data['pemohon'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'PEMINJAMAN KENDARAAN', 'ID' => $IDX, 'STATUS' => 'KIRIM'])->result_array();
        $data['manager'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'PEMINJAMAN KENDARAAN', 'ID' => $IDX, 'STATUS' => 'PASS'])->result_array();
        $this->load->view('pdf/Peminjaman_kendaraan', $data);
    }
    public function REC_APPROVE($IDX)
    {
        $this->load->library('Pdf');
        $data['data'] = $this->db->get_where('tb_peminjaman_kendaraan', ['IDX_PK' => $IDX])->row();
        $data['pemohon'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'PEMINJAMAN KENDARAAN', 'ID' => $IDX, 'STATUS' => 'KIRIM'])->result_array();
        $data['manager'] = $this->db->order_by('IDX', 'DESC')->get_where('tb_process_hist', ['JENIS' => 'PEMINJAMAN KENDARAAN', 'ID' => $IDX, 'STATUS' => 'PASS'])->result_array();
        $this->load->view('pdf/Peminjaman_kendaraan', $data);
    }
    public function approval()
    {
        $IDX = $this->input->post('IDX');
        $KOMENTAR = $this->input->post('KOMENTAR');
        $STATUS = $this->input->post('STATUS');
        if ($STATUS == "PASS") {
            $this->db->update('tb_peminjaman_kendaraan', ['PROCESS' => 'APPROVE', 'DATE_NOMOR' => date('Y-m-d')], ['IDX_PK' => $IDX]);
            $this->Mloan->nomor_surat($IDX);
        } else {
            $this->db->update('tb_peminjaman_kendaraan', ['PROCESS' => 'REJECTED'], ['IDX_PK' => $IDX]);
        }
        $data = array(
            'KOMENTAR' => $KOMENTAR,
            'DATE_TIME' => date('Y-m-d H:i:s'),
            'ID' => $IDX,
            'JENIS' => 'PEMINJAMAN KENDARAAN',
            'NIPP' => $this->session->userdata('nipp'),
            'STATUS' => $STATUS
        );
        $this->db->insert('tb_process_hist', $data);
        echo "OK";
    }
    public function return_car($IDX)
    {
        $view = 'backend/pages/v_Peminjaman_kendaraan_form_r';
        $data['data'] = $this->db->get_where('tb_peminjaman_kendaraan', ['IDX_PK' => $IDX])->row();
        $data['hist'] = $this->db->get_where('tb_process_hist', ['ID' => $IDX, 'JENIS' => 'PEMINJAMAN KENDARAAN'])->result();
        $data['isi'] = $view;
        $data['jenis_kendaraan'] = $this->db->get('tb_jenis_kendaraan')->result();
        $this->load->view('backend/layout/template', $data);
    }
    public function kembalian($IDX)
    {
        $this->Mloan->kembalian($IDX);
    }
    public function report()
    {
        $data = array(
            'isi' => 'backend/pages/v_Peminjaman_kendaraan_report',
            'report' => $this->Mloan->report()->result(),
            'report_uk' => $this->Mloan->report_uk()->result()
        );
        $this->load->view('backend/layout/template', $data);
    }
    public function excel()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=report_peminjaman_kendaraan.xls");
        $where['DATE_PK >='] = $this->input->get('START');
        $where['DATE_PK <='] = $this->input->get('FINISH');
        $search['DATA'] = $this->db->get_where('tb_peminjaman_kendaraan', $where)->result();
        $this->load->view('report/peminjaman_kendaraan', $search);
    }
    public function report_uk()
    {
        $query = $this->db->query('SELECT NAMA_UK, count(UNIT_KERJA_PK) as JUMLAH FROM `tb_unit_kerja` left join tb_peminjaman_kendaraan on tb_peminjaman_kendaraan.UNIT_KERJA_PK=tb_unit_kerja.NAMA_UK group by NAMA_UK');
        return $query;
    }
    public function validasi_tanggal(){
        $waktu  = $this->input->post('WAKTU');
        $waktu2 = $this->input->post('WAKTU2');
        $mobil = $this->input->post('MOBIL');
        $id = $this->input->post('ID');
        // $tengah  = '2022-09-01T14:01';
        // $tengah2 = '2022-09-06T14:01';

        // $tgl1 = strtotime($waktu); 
        // $tgl2 = strtotime($waktu2);
        
        // $hasil = ($tgl1+$tgl2)/2;

        // $hasil = date('Y-m-d',$hasil);
        
         $query = 'SELECT * FROM tb_peminjaman_kendaraan WHERE ((TIME_PK_AWAL <="'.$waktu.'" AND TIME_PK_AKHIR >="'.$waktu.'") OR (TIME_PK_AWAL <="'.$waktu2.'" AND TIME_PK_AKHIR >="'.$waktu2.'")) AND PINJAM_KENDARAAN="'.$mobil.'"  AND PROCESS ="APPROVE" AND IDX_PK !="'.$id.'" ';
        
        $data = $this->db->query($query)->result_array();
        if(count($data)>0){
            echo "FALSE";
        }else{
            ECHO "SUCCESS";
        }
    }
}
