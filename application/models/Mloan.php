<?php
class Mloan extends CI_Model
{

        public function save()
        {
                $data['NAMA_PK'] = $this->input->post('USER');
                $data['IDX_U'] = $this->session->userdata('nipp');
                $data['DATE_IN'] = date("Y-m-d H:i:s");
                $data['JABATAN_PK'] = $this->input->post('JABATAN');
                $data['NIPP_PK'] = $this->input->post('NIPP');
                $data['TELEPON_PK'] = $this->input->post('TELEPON');
                $data['UNIT_KERJA_PK'] = $this->input->post('UNITKERJA');
                $data['PINJAM_KENDARAAN'] = $this->input->post('PINJAM_KENDARAAN');
                $data['DATE_PK'] = $this->input->post('TANGGAL');
                $data['TIME_PK_AWAL'] = $this->input->post('WAKTU');
                $data['TIME_PK_AKHIR'] = $this->input->post('WAKTU2');
                $data['TUJUAN_PK'] = $this->input->post('TUJUAN');
                $data['KEPERLUAN'] = $this->input->post('KEPERLUAN');
                $data['JENIS_KENDARAAN'] = $this->input->post('JENIS_KENDARAAN');
                $data['PENGEMUDI'] = $this->input->post('PENGEMUDI');
                $data['SPEEDO_AWAL'] = $this->input->post('SPEEDO_AWAL');
                $data['SPEEDO_AKHIR'] = $this->input->post('SPEEDO_AKHIR');
                $data['PROCESS'] = $this->input->post('ACTION');
                $data['DIVISION'] = $this->session->userdata('division');
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
                $this->db->insert('tb_peminjaman_kendaraan', $data);
                $id = $this->db->insert_id();
                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' => date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "PEMINJAMAN KENDARAAN",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );
                $this->db->insert('tb_process_hist', $hist);
                $peminjam = $this->input->post('UNITKERJA');
                $this->db->update('tb_jenis_kendaraan', ['PEMINJAM' => $peminjam, 'STATUS' => '0'], ['NAMA_JK' => $this->input->post('PINJAM_KENDARAAN')]);
                redirect('Loan');
        }
        public function data()
        {
                $status = $this->session->userdata('status');
                if ($status == 0) {
                        $this->db->where("IDX_U='". $this->session->userdata('nipp') ."'");
                } else {
                        $this->db->where("PROCESS='KIRIM' OR PROCESS='APPROVE'");
                }
                $this->db->order_by('DATE_PK', 'DESC');
                $query = $this->db->get('tb_peminjaman_kendaraan');
                return $query;
        }
        public function save_e($IDX)
        {
                $data['NAMA_PK'] = $this->input->post('USER');
                $data['JABATAN_PK'] = $this->input->post('JABATAN');
                $data['NIPP_PK'] = $this->input->post('NIPP');
                $data['TELEPON_PK'] = $this->input->post('TELEPON');
                $data['UNIT_KERJA_PK'] = $this->input->post('UNITKERJA');
                $data['PINJAM_KENDARAAN'] = $this->input->post('PINJAM_KENDARAAN');
                $data['DATE_PK'] = $this->input->post('TANGGAL');
                $data['TIME_PK_AWAL'] = $this->input->post('WAKTU');
                $data['TIME_PK_AKHIR'] = $this->input->post('WAKTU2');
                $data['TUJUAN_PK'] = $this->input->post('TUJUAN');
                $data['JENIS_KENDARAAN'] = $this->input->post('JENIS_KENDARAAN');
                $data['PENGEMUDI'] = $this->input->post('PENGEMUDI');
                $data['SPEEDO_AWAL'] = $this->input->post('SPEEDO_AWAL');
                $data['SPEEDO_AKHIR'] = $this->input->post('SPEEDO_AKHIR');
                $data['PROCESS'] = $this->input->post('ACTION');
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
                $this->db->update('tb_peminjaman_kendaraan', $data, ['IDX_PK' => $IDX]);
                $id = $IDX;
                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' => date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "PEMINJAMAN KENDARAAN",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );
                $this->db->insert('tb_process_hist', $hist);

                redirect('Loan');
        }
        public function nomor_surat($IDX)
        {
                //check nomor surat
                $kode = "PM";
                $where = array(
                        'SURAT_KE !='      => "",
                        'DATE_NOMOR'       => date('Y-m-d'),
                );
                $this->db->order_by('SURAT_KE', 'DESC');
                $check = $this->db->get_where('tb_peminjaman_kendaraan', $where);
                //check division
                $data = $this->db->get_where('tb_peminjaman_kendaraan', ['IDX_PK' => $IDX])->row();
                if ($check->num_rows() == 0) {
                        $no = sprintf("%02d", 1);
                        $nomor  = $kode . "." . $no . "/" . date('d') . "/" . date('m') . "/" . $data->DIVISION . "/" . "C.BKL-" . date('y');
                        $update = array(
                                'SURAT_KE' => $no,
                                'NOMOR_PK' => $nomor
                        );
                        $this->db->update('tb_peminjaman_kendaraan', $update, ['IDX_PK' => $IDX]);
                } else {
                        $nomor_check = $check->row();
                        $no = sprintf("%02d", ++$nomor_check->SURAT_KE);
                        $nomor  = $kode . "." . $no . "/" . date('d') . "/" . date('m') . "/" . $data->DIVISION . "/" . "C.BKL-" . date('y');
                        $update = array(
                                'SURAT_KE' => $no,
                                'NOMOR_PK' => $nomor
                        );
                        $this->db->update('tb_peminjaman_kendaraan', $update, ['IDX_PK' => $IDX]);
                }
        }
        public function kembalian($IDX)
        {
                $data['NAMA_PK'] = $this->input->post('USER');
                $data['JABATAN_PK'] = $this->input->post('JABATAN');
                $data['NIPP_PK'] = $this->input->post('NIPP');
                $data['TELEPON_PK'] = $this->input->post('TELEPON');
                $data['UNIT_KERJA_PK'] = $this->input->post('UNITKERJA');
                $data['PINJAM_KENDARAAN'] = $this->input->post('PINJAM_KENDARAAN');
                $data['DATE_PK'] = $this->input->post('TANGGAL');
                $data['TIME_PK_AWAL'] = $this->input->post('WAKTU');
                $data['TIME_PK_AKHIR'] = $this->input->post('WAKTU2');
                $data['TUJUAN_PK'] = $this->input->post('TUJUAN');
                $data['JENIS_KENDARAAN'] = $this->input->post('JENIS_KENDARAAN');
                $data['PENGEMUDI'] = $this->input->post('PENGEMUDI');
                $data['SPEEDO_AWAL'] = $this->input->post('SPEEDO_AWAL');
                $data['SPEEDO_AKHIR'] = $this->input->post('SPEEDO_AKHIR');
                $data['PROCESS'] = $this->input->post('ACTION');
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
                $this->db->update('tb_peminjaman_kendaraan', $data, ['IDX_PK' => $IDX]);
                $id = $IDX;
                $hist = array(
                        'KOMENTAR' => $this->input->post('KOMENTAR'),
                        'DATE_TIME' => date('Y-m-d H:i:s'),
                        'ID'        => $id,
                        'JENIS' => "PEMINJAMAN KENDARAAN",
                        'NIPP' => $this->session->userdata('nipp'),
                        'STATUS' => $this->input->post('ACTION')
                );
                $this->db->insert('tb_process_hist', $hist);
                $this->db->update('tb_jenis_kendaraan', ['PEMINJAM' => '', 'STATUS' => '1'], ['NAMA_JK' => $this->input->post('PINJAM_KENDARAAN')]);
                redirect('Loan');
        }
        public function report()
        {
                $query = $this->db->query('SELECT NAMA_JK, COUNT(PINJAM_KENDARAAN) AS JUMLAH FROM `tb_peminjaman_kendaraan` RIGHT join tb_jenis_kendaraan on PINJAM_KENDARAAN=NAMA_JK GROUP BY NAMA_JK');
                return $query;
        }
        public function report_uk()
        {
                $query = $this->db->query('SELECT NAMA_UK, count(UNIT_KERJA_PK) as JUMLAH FROM `tb_unit_kerja` left join tb_peminjaman_kendaraan on tb_peminjaman_kendaraan.UNIT_KERJA_PK=tb_unit_kerja.NAMA_UK group by NAMA_UK');
                return $query;
        }
}
