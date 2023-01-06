<?php 
class MEmployee extends CI_Model
{
    public function data()
    {
       return $query = $this->db->get('mst_user');
    }
    public function save(){
        $idx=$this->input->post('IDX');

        $data=array(
            'NAMA_USER' => $this->input->post('NAMA'),
            'JABATAN_USER' => $this->input->post('JABATAN'),
            'NIPP_USER' => $this->input->post('NIPP'),
            'TELPON_USER'=> $this->input->post('TELEPON'),
            'UNIT_KERJA' => $this->input->post('UNIT_KERJA'),
            'STATUS' =>'0'
        );

        if(!empty($idx)){
            $query = $this->db->update('mst_user',$data,['IDX'=>$idx]);
            echo "UPDATE";
        }else{
            $query = $this->db->insert('mst_user',$data);
            ECHO "INSERT";
        }
       
        if($query){
            return "SUCCESS";
        }else{
            return 'FAILED';
        }

    }
 
}
