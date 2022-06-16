<?php 
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
	$daftar_hari = array(
	 'Sunday' => 'Minggu',
	 'Monday' => 'Senin',
	 'Tuesday' => 'Selasa',
	 'Wednesday' => 'Rabu',
	 'Thursday' => 'Kamis',
	 'Friday' => 'Jumat',
	 'Saturday' => 'Sabtu'
	);

 	$namahari = date('l', strtotime($tanggal));
 	

	return $daftar_hari[$namahari].' / '. $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function tgl_indo2($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 	

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function  tgl_indo3($tanggal){
	$bulan = array (
		1 =>   'Jan',
		'Feb',
		'Mar',
		'Apr',
		'Mei',
		'Jun',
		'Jul',
		'Agu',
		'Sep',
		'Okt',
		'Nov',
		'Des'
	);
	$pecahkan = explode('-', $tanggal);	
	return $pecahkan[2] . '-' . $bulan[ (int)$pecahkan[1] ] . '-' . $pecahkan[0];
}
?>