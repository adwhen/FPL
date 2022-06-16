<?php 
class Maccomodation extends CI_Model {

        public function save()
        {
                $data['NAMA_A'] = $this->input->post('USER');
                $data['IDX_U'] = $this->session->userdata('nipp');
                $data['JABATAN_A'] = $this->input->post('JABATAN');
                $data['NIPP_A'] = $this->input->post('NIPP');
                $data['TELEPON_A'] = $this->input->post('TELEPON');
                $data['UNIT_KERJA_A'] = $this->input->post('UNITKERJA');
                $data['ACARA_A'] = $this->input->post('ACARA');
                $data['NOMOR_SPPD'] = $this->input->post('NOMOR');
                $data['ISI_A'] = $this->input->post('ISI');
                $data['PROCESS'] = $this->input->post('ACTION');
                $data['VENDOR'] = $this->input->post('VENDOR');
                $data['DATE_TTD'] = $this->input->post('DATE_TTD');
                $data['DIVISION'] = $this->session->userdata('division');
                if(!empty($this->input->post('LINK'))){
                        $data['LINK'] = $this->input->post('LINK');
                }
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
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
                $this->db->insert('tb_akomodasi',$data);
                $id = $this->db->insert_id();

                $jenis=$this->input->post('JENIS_SPPD');
                $data_jenis['IDX_A']=$id;
                $count=0;
                foreach($jenis as $j){
                        $data_jenis['NAMA_AJ']=$jenis[$count];
                        $this->db->insert('tb_akomodasi_jenis',$data_jenis);
                        $count++;
                }

                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' =>date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "AKOMODASI",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );
                

                $this->db->insert('tb_process_hist',$hist);

                redirect('Accomodation');
        }
        public function data(){
                $status= $this->session->userdata('status');
                if($status==0){
                        $this->db->where("IDX_U='".$this->session->userdata('nipp')."'");
                }else{
                        $this->db->where("PROCESS='KIRIM' OR PROCESS='APPROVE'");
                }
                $this->db->order_by('IDX_A','DESC');
                $query=$this->db->get('tb_akomodasi');
                return $query;
        }
        public function save_e($IDX)
        {
                $data['NAMA_A'] = $this->input->post('USER');
                $data['JABATAN_A'] = $this->input->post('JABATAN');
                $data['NIPP_A'] = $this->input->post('NIPP');
                $data['TELEPON_A'] = $this->input->post('TELEPON');
                $data['UNIT_KERJA_A'] = $this->input->post('UNITKERJA');
                $data['ACARA_A'] = $this->input->post('ACARA');
                $data['NOMOR_SPPD'] = $this->input->post('NOMOR');
                $data['ISI_A'] = $this->input->post('ISI');
                $data['PROCESS'] = $this->input->post('ACTION');
                $data['VENDOR'] = $this->input->post('VENDOR');
                $data['DATE_TTD'] = $this->input->post('DATE_TTD');
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
                $this->db->update('tb_akomodasi',$data,['IDX_A'=>$IDX]);
                $id = $IDX;

                $jenis=$this->input->post('JENIS_SPPD');
                $data_jenis['IDX_A']=$id;
                $count=0;
                $this->db->delete('tb_akomodasi_jenis',['IDX_A'=>$id]);
                foreach($jenis as $j){
                        $data_jenis['NAMA_AJ']=$jenis[$count];
                        $this->db->insert('tb_akomodasi_jenis',$data_jenis);
                        $count++;
                }
                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' =>date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "AKOMODASI",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );
                $this->db->insert('tb_process_hist',$hist);

                redirect('Accomodation');
        }
        public function nomor_surat($IDX){
                //check nomor surat
                $kode="AK";
                $where=array(
                        'SURAT_KE !='      => "",
                        'DATE_NOMOR'    =>      date('Y-m-d'),
                );
                $this->db->order_by('SURAT_KE','DESC');
                $check=$this->db->get_where('tb_akomodasi',$where);
                //check division
                $data=$this->db->get_where('tb_akomodasi',['IDX_A'=>$IDX])->row();
                if($check->num_rows()==0){
                        $no=sprintf("%02d",1);
                        $nomor  = $kode.".".$no."/".date('d')."/".date('m')."/".$data->DIVISION."/"."C.BKL-".date('y');
                        $update=array(
                                'SURAT_KE'=>$no,
                                'NOMOR_A' => $nomor
                        );
                        $this->db->update('tb_akomodasi',$update,['IDX_A'=>$IDX]);
                }else{
                        // $nomor_check=$check->row();
                        // $no=sprintf("%02d",++$nomor_check->SURAT_KE);
                        // $nomor  = $kode.".".$no."/".date('d')."/".date('m')."/".$data->DIVISION."/"."C.BKL-".date('y');
                        // $update=array(
                        //         'SURAT_KE'=>$no,
                        //         'NOMOR_UMUM' => $nomor
                        // );
                        //  $this->db->update('tb_akomodasi',$update,['IDX_UMUM'=>$IDX]);
                }

        }


}