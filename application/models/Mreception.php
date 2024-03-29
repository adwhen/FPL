<?php
class Mreception extends CI_Model
{

        public function save()
        {
                $data['NAMA_J'] = $this->input->post('USER');
                $data['IDX_U'] = $this->session->userdata('nipp');
                $data['DATE_IN'] = date("Y-m-d H:i:s");
                $data['JABATAN_J'] = $this->input->post('JABATAN');
                $data['NIPP_J'] = $this->input->post('NIPP');
                $data['TELEPON_J'] = $this->input->post('TELEPON');


                $data['RINCIAN_PESANAN'] = $this->input->post('RINCIAN_PESANAN');
                $data['JUMLAH_J'] = $this->input->post('JUMLAH_J');
                $data['TEMPAT_J'] = $this->input->post('TEMPAT_J');

                $data['WAKTU_M'] = $this->input->post('WAKTU_AWAL');
                $data['WAKTU_A'] = $this->input->post('WAKTU_AKHIR');

                $data['UNIT_KERJA_J'] = $this->input->post('UNITKERJA');
                $data['ACARA_J'] = $this->input->post('ACARA');
                $data['DATE_J'] = $this->input->post('TANGGAL');
                $data['ISI_J'] = $this->input->post('ISI');
                $data['PROCESS'] = $this->input->post('ACTION');
                $data['VENDOR'] = $this->input->post('VENDOR');
                $data['DATE_TTD'] = $this->input->post('DATE_TTD');
                $data['DIVISION'] = $this->session->userdata('division');
                if (!empty($this->input->post('LINK'))) {
                        $data['LINK'] = $this->input->post('LINK');
                }

                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['max_size']             = 10000;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('FILE')) {
                        echo $this->upload->display_errors();
                } else {
                        $data['FILE'] = $this->upload->data('file_name');
                }
                $this->db->insert('tb_jamuan', $data);
                $id = $this->db->insert_id();

                $jenis = $this->input->post('JENIS_JAMUAN');
                $data_jenis['IDX_J'] = $id;
                $count = 0;
                foreach ($jenis as $j) {
                        $data_jenis['NAMA_JENIS'] = $jenis[$count];
                        $this->db->insert('tb_jamuan_jenis', $data_jenis);
                        $count++;
                }

                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' => date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "JAMUAN",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );


                $this->db->insert('tb_process_hist', $hist);

                redirect('Reception');
        }
        public function data()
        {
                $status = $this->session->userdata('status');
                if ($status == 0) {
                        $this->db->where("IDX_U='" . $this->session->userdata('nipp') . "'");
                } else {
                        $this->db->where("PROCESS='KIRIM' OR PROCESS='APPROVE'");
                }
                $this->db->order_by('DATE_J', 'DESC');
                $query = $this->db->get('tb_jamuan');
                return $query;
        }
        public function save_e($IDX)
        {
                $data['NAMA_J'] = $this->input->post('USER');
                $data['JABATAN_J'] = $this->input->post('JABATAN');
                $data['NIPP_J'] = $this->input->post('NIPP');
                $data['TELEPON_J'] = $this->input->post('TELEPON');
                $data['UNIT_KERJA_J'] = $this->input->post('UNITKERJA');

                $data['RINCIAN_PESANAN'] = $this->input->post('RINCIAN_PESANAN');
                $data['JUMLAH_J'] = $this->input->post('JUMLAH_J');
                $data['TEMPAT_J'] = $this->input->post('TEMPAT_J');
                $data['WAKTU_M'] = $this->input->post('WAKTU_AWAL');
                $data['WAKTU_A'] = $this->input->post('WAKTU_AKHIR');

                $data['ACARA_J'] = $this->input->post('ACARA');
                $data['DATE_J'] = $this->input->post('TANGGAL');
                $data['ISI_J'] = $this->input->post('ISI');
                $data['PROCESS'] = $this->input->post('ACTION');
                $data['VENDOR'] = $this->input->post('VENDOR');
                $data['DATE_TTD'] = $this->input->post('DATE_TTD');
                if (!empty($this->input->post('LINK'))) {
                        $data['LINK'] = $this->input->post('LINK');
                }

                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 10000;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('FILE')) {
                        echo $this->upload->display_errors();
                } else {
                        $data['FILE'] = $this->upload->data('file_name');
                }
                $this->db->update('tb_jamuan', $data, ['IDX_J' => $IDX]);
                $id = $IDX;

                $jenis = $this->input->post('JENIS_JAMUAN');
                $data_jenis['IDX_J'] = $id;
                $count = 0;
                $this->db->delete('tb_jamuan_jenis', ['IDX_J' => $id]);
                foreach ($jenis as $j) {
                        $data_jenis['NAMA_JENIS'] = $jenis[$count];
                        $this->db->insert('tb_jamuan_jenis', $data_jenis);
                        $count++;
                }
                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' => date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "JAMUAN",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );
                $this->db->insert('tb_process_hist', $hist);

                redirect('Reception');
        }
        public function nomor_surat($IDX)
        {
                //check nomor surat
                $kode = "JD";
                $where = array(
                        'SURAT_KE !='      => "",
                        'DATE_NOMOR'    =>      date('Y-m-d'),
                );
                $this->db->order_by('SURAT_KE', 'DESC');
                $check = $this->db->get_where('tb_jamuan', $where);
                //check division
                $data = $this->db->get_where('tb_jamuan', ['IDX_J' => $IDX])->row();
                if ($check->num_rows() == 0) {
                        $no = sprintf("%02d", 1);
                        $nomor  = $kode . "." . $no . "/" . date('d') . "/" . date('m') . "/" . $data->DIVISION . "/" . "C.BKL-" . date('y');
                        $update = array(
                                'SURAT_KE' => $no,
                                'NOMOR_J' => $nomor
                        );
                        $this->db->update('tb_jamuan', $update, ['IDX_J' => $IDX]);
                } else {
                        // $nomor_check=$check->row();
                        // $no=sprintf("%02d",++$nomor_check->SURAT_KE);
                        // $nomor  = $kode.".".$no."/".date('d')."/".date('m')."/".$data->DIVISION."/"."C.BKL-".date('y');
                        // $update=array(
                        //         'SURAT_KE'=>$no,
                        //         'NOMOR_J' => $nomor
                        // );
                        //  $this->db->update('tb_jamuan',$update,['IDX_UMUM'=>$IDX]);
                }
        }
        public function report()
        {
                $query = $this->db->query('SELECT JENIS_JAMUAN, COUNT(NOMOR_J) AS JUMLAH FROM `tb_jamuan` JOIN tb_jamuan_jenis on tb_jamuan_jenis.IDX_J = tb_jamuan.IDX_J right join tb_jenis_j on tb_jamuan_jenis.NAMA_JENIS= tb_jenis_j.JENIS_JAMUAN GROUP BY JENIS_JAMUAN');
                return $query;
        }
        public function report_uk()
        {
                $query = $this->db->query('SELECT NAMA_UK, count(UNIT_KERJA_J) as JUMLAH FROM `tb_unit_kerja` left join tb_jamuan on tb_jamuan.UNIT_KERJA_J=tb_unit_kerja.NAMA_UK group by NAMA_UK');
                return $query;
        }
}
