<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {
    

    public function __construct(){
        parent::__construct();
        $this->Mlogin->check_log();
    }

	public function index()
	{

		$data=array(
			'isi'=>'backend/pages/v_Peminjaman_kendaraan',
			'data' => $this->Mloan->data()
		);
		$this->load->view('backend/layout/template',$data);
	}
	public function form($id=null){
		if($id==null){
			$view='backend/pages/v_Peminjaman_kendaraan_form';

		}else{
			$view='backend/pages/v_Peminjaman_kendaraan_form_e';
			$data['data'] = $this->db->get_where('tb_peminjaman_kendaraan',['IDX_PK'=>$id])->row();
            $data['hist'] = $this->db->get_where('tb_process_hist',['ID'=>$id,'JENIS'=>'PEMINJAMAN KENDARAAN'])->result();
		}
		$data['isi']=$view;
		$data['jenis_kendaraan']=$this->db->get('tb_jenis_kendaraan')->result();
		$this->load->view('backend/layout/template',$data);
	}
	public function save()
	{
		$this->Mloan->save();
	}
	public function save_edit($IDX){
		$this->Mloan->save_e($IDX);
	}
	public function REC($IDX){
	   $this->load->library('Pdf');
       $data['data']=$this->db->get_where('tb_peminjaman_kendaraan',['IDX_PK'=>$IDX])->row();
       $data['pemohon'] = $this->db->order_by('IDX','DESC')->get_where('tb_process_hist',['JENIS'=>'PEMINJAMAN KENDARAAN','ID'=>$IDX,'STATUS'=>'KIRIM'])->result_array();
       $data['manager'] = $this->db->order_by('IDX','DESC')->get_where('tb_process_hist',['JENIS'=>'PEMINJAMAN KENDARAAN','ID'=>$IDX,'STATUS'=>'PASS'])->result_array();
	   $this->load->view('pdf/Peminjaman_kendaraan',$data);
	}
    public function REC_APPROVE($IDX){
       $this->load->library('Pdf');
       $data['data']=$this->db->get_where('tb_peminjaman_kendaraan',['IDX_PK'=>$IDX])->row();
       $data['pemohon'] = $this->db->order_by('IDX','DESC')->get_where('tb_process_hist',['JENIS'=>'PEMINJAMAN KENDARAAN','ID'=>$IDX,'STATUS'=>'KIRIM'])->result_array();
       $data['manager'] = $this->db->order_by('IDX','DESC')->get_where('tb_process_hist',['JENIS'=>'PEMINJAMAN KENDARAAN','ID'=>$IDX,'STATUS'=>'PASS'])->result_array();
       $this->load->view('pdf/Peminjaman_kendaraan',$data);
    }
    public function approval(){
        $IDX = $this->input->post('IDX');
        $KOMENTAR = $this->input->post('KOMENTAR');
        $STATUS = $this->input->post('STATUS');
        if($STATUS=="PASS"){
            $this->db->update('tb_peminjaman_kendaraan',['PROCESS'=>'APPROVE','DATE_NOMOR'=>date('Y-m-d')], ['IDX_PK'=>$IDX]);
            $this->Mloan->nomor_surat($IDX);
        }else{
            $this->db->update('tb_peminjaman_kendaraan',['PROCESS'=>'REJECTED'], ['IDX_PK'=>$IDX]);
        }
        $data=array(
            'KOMENTAR'=>$KOMENTAR,
            'DATE_TIME'=>date('Y-m-d H:i:s'),
            'ID'=> $IDX,
            'JENIS' => 'PEMINJAMAN KENDARAAN',
            'NIPP' => $this->session->userdata('nipp'),
            'STATUS' => $STATUS
        );
        $this->db->insert('tb_process_hist',$data);
        echo "OK";
    }
    public function return_car($IDX){
    		$view='backend/pages/v_Peminjaman_kendaraan_form_r';
			$data['data'] = $this->db->get_where('tb_peminjaman_kendaraan',['IDX_PK'=>$IDX])->row();
            $data['hist'] = $this->db->get_where('tb_process_hist',['ID'=>$IDX,'JENIS'=>'PEMINJAMAN KENDARAAN'])->result();
		$data['isi']=$view;
		$data['jenis_kendaraan']=$this->db->get('tb_jenis_kendaraan')->result();
    	$this->load->view('backend/layout/template',$data);

    }
    public function kembalian($IDX){
    	$this->Mloan->kembalian($IDX);
    }
    
}
