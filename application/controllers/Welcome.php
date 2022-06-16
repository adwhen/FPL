<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('frontend/Vlogin');
	}
	public function check_login()
	{
		echo $response = $this->Mlogin->check();
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
