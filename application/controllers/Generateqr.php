<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generateqr extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function generate($kode,$nip){
		$url = base_url('generateqr/authenticationQr/'.$kode.'/'.$nip);
		QRCode::png(
            $url,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 5,
            $margin = 2
        );
	}
}
