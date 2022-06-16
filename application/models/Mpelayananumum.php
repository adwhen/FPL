<?php 
class Mpelayananumum extends CI_Model {

        public function save()
        {
                $data['NOMOR_UMUM'] = $this->input->post('NOMOR');
                $data['IDX_U'] = $this->session->userdata('nipp');
                $data['NAMA_PEMOHON'] = $this->input->post('USER');
                $data['JABATAN'] = $this->input->post('JABATAN');
                $data['NIPP'] = $this->input->post('NIPP');
                $data['TELEPON_UMUM'] = $this->input->post('TELEPON');
                $data['UNIT_KERJA'] = $this->input->post('UNITKERJA');
                $data['PERMOHONAN_UMUM'] = $this->input->post('PERMOHONAN');
                $data['DATE_UMUM'] = $this->input->post('TANGGAL');
                $data['TIME_UMUM'] = $this->input->post('WAKTU');
                $data['BENTUK_UMUM'] = $this->input->post('BENTUKPERMOHONAN');
                $data['TUJUAN_UMUM'] = $this->input->post('TUJUAN');
                $data['PROCESS'] = $this->input->post('ACTION');
                $data['VENDOR'] = $this->input->post('VENDOR');
                $data['DIVISION'] = $this->session->userdata('division');
                if(!empty($this->input->post('LINK'))){
                        $data['LINK'] = $this->input->post('LINK');
                }
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 10000;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('FILE'))
                {
                        echo $this->upload->display_errors();
                }
                else
                {
                        $data['FILE']=$this->upload->data('file_name');        
                }
                $this->db->insert('tb_pelayanan_umum',$data);
                $id = $this->db->insert_id();
                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' =>date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "PELAYANAN UMUM",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );
                $this->db->insert('tb_process_hist',$hist);

                redirect('Pelayanan_umum');
        }
        public function data(){
                $status= $this->session->userdata('status');
                if($status==0){
                        $this->db->where("IDX_U='".$this->session->userdata('nipp')."'");
                }else{
                        $this->db->where("PROCESS='KIRIM' OR PROCESS='APPROVE'");
                }
                $this->db->order_by('DATE_UMUM','DESC');
                $this->db->order_by('TIME_UMUM','DESC');
                $query=$this->db->get('tb_pelayanan_umum');
                return $query;
        }
        public function save_e($IDX)
        {
                $data['NOMOR_UMUM'] = $this->input->post('NOMOR');
                $data['NAMA_PEMOHON'] = $this->input->post('USER');
                $data['JABATAN'] = $this->input->post('JABATAN');
                $data['NIPP'] = $this->input->post('NIPP');
                $data['TELEPON_UMUM'] = $this->input->post('TELEPON');
                $data['UNIT_KERJA'] = $this->input->post('UNITKERJA');
                $data['PERMOHONAN_UMUM'] = $this->input->post('PERMOHONAN');
                $data['DATE_UMUM'] = $this->input->post('TANGGAL');
                $data['TIME_UMUM'] = $this->input->post('WAKTU');
                $data['BENTUK_UMUM'] = $this->input->post('BENTUKPERMOHONAN');
                $data['TUJUAN_UMUM'] = $this->input->post('TUJUAN');
                $data['PROCESS'] = $this->input->post('ACTION');
                $data['VENDOR'] = $this->input->post('VENDOR');

                if(!empty($this->input->post('LINK'))){
                        $data['LINK'] = $this->input->post('LINK');
                }
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 10000;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('FILE'))
                {
                        echo $this->upload->display_errors();
                }
                else
                {
                        $data['FILE']=$this->upload->data('file_name');        
                }
                $this->db->update('tb_pelayanan_umum',$data,['IDX_UMUM'=>$IDX]);
                $id = $IDX;
                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' =>date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "PELAYANAN UMUM",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );
                $this->db->insert('tb_process_hist',$hist);

                redirect('Pelayanan_umum');
        }
        public function nomor_surat($IDX){
                //check nomor surat
                $kode="PU";
                $where=array(
                        'SURAT_KE !='      => "",
                        'DATE_NOMOR'    =>      date('Y-m-d'),
                );
                $this->db->order_by('SURAT_KE','DESC');
                $check=$this->db->get_where('tb_pelayanan_umum',$where);
                //check division
                $data=$this->db->get_where('tb_pelayanan_umum',['IDX_UMUM'=>$IDX])->row();
                if($check->num_rows()==0){
                        $no=sprintf("%02d",1);
                        $nomor  = $kode.".".$no."/".date('d')."/".date('m')."/".$data->DIVISION."/"."C.BKL-".date('y');
                        $update=array(
                                'SURAT_KE'=>$no,
                                'NOMOR_UMUM' => $nomor
                        );
                        $this->db->update('tb_pelayanan_umum',$update,['IDX_UMUM'=>$IDX]);
                }else{
                        $nomor_check=$check->row();
                        $no=sprintf("%02d",++$nomor_check->SURAT_KE);
                        $nomor  = $kode.".".$no."/".date('d')."/".date('m')."/".$data->DIVISION."/"."C.BKL-".date('y');
                        $update=array(
                                'SURAT_KE'=>$no,
                                'NOMOR_UMUM' => $nomor
                        );
                         $this->db->update('tb_pelayanan_umum',$update,['IDX_UMUM'=>$IDX]);
                }

        }


}