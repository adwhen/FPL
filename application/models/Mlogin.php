<?php 
class Mlogin extends CI_Model {

        public function check()
        {
                $where['USERNAME']      =       $this->input->post("USERNAME");
                $where['PASSWORD']       =       md5($this->input->post('PASSWORD'));
                
                $query = $this->db->get_where('mst_user',$where)->result_array();
                if(count($query)==0){
                        $result = "FAILED";
                }else{
                        $result = "OK";
                        $data = array(
                                'akun' =>$query[0]['USERNAME'],
                                'username' => $query[0]['NAMA_USER'],
                                'jabatan'  => $query[0]['JABATAN_USER'],
                                'nipp' => $query[0]['NIPP_USER'],
                                'telpon_user' => $query[0]['TELPON_USER'],
                                'unit_kerja' => $query[0]['UNIT_KERJA'],
                                'status' => $query[0]['STATUS'],
                                'login' =>1,
                                'division' => $query[0]['DIVISION'],
                        );
                        $this->session->set_userdata($data);
                }
                return $result;
        }
        public function check_log(){
                if(empty($this->session->userdata('login'))){
                        redirect();
                }
        }


}