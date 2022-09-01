<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	public function search_karyawan(){
        $nama = $this->input->post('NAMA');
        $query = $this->db->select('NAMA_USER, JABATAN_USER, NIPP_USER, TELPON_USER, UNIT_KERJA')->get_where('mst_user',['NAMA_USER'=>$nama])->row();
        echo json_encode($query);die;
    }
}
