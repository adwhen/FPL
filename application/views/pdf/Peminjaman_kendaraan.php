<?php

$ttd_pemohon="";
$ttd_manager=""; 
$manager_ttd="";
$pemohon_ttd="";
//$pdf    = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// set document information

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // // Logo
        // $image_file = K_PATH_IMAGES.'logo_example.jpg';
        // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // // Set font
        // $this->SetFont('helvetica', 'B', 20);
        // // Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Image('assets/images/pelindo.png', 130, 5, 0, 15, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->Image('assets/footer_pdf.JPG', "-2", 270, 0, 22, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
        // $this->SetY(-15);
        // // Set font
        // $this->SetFont('helvetica', 'I', 8);
        // // Page number
        // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($data->NAMA_PK);
$pdf->SetTitle('Form Peminjaman Kendaraan Operasional');
$pdf->SetSubject('Form Peminjaman Kendaraan Operasional');
$pdf->SetKeywords('Form Peminjaman Kendaraan Operasional');

// remove default header/footer

$pdf->SetMargins(7, 25,7,1.5);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'B', 18);

// add a page
$pdf->AddPage();


$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set some text to print
$txt = <<<EOD
FORMULIR PEMINJAMAN KENDARAAN OPERASIONAL
CABANG PELABUHAN BENGKULU
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('times', 'B', 15);
$pdf->Write(0, 'Nomor : '.$data->NOMOR_PK, '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('times', '', 16);
$html='<table border="1">
                  <tr>
                    <td width="40%">Nama PK/User</td>
                    <td width="5%">:</td>
                    <td width="65%">'.$data->NAMA_PK.'</td>
                  </tr>
                  <tr>
                    <td >Jabatan</td>
                    <td >:</td>
                    <td >'.$data->JABATAN_PK.'</td>
                  </tr>
                  <tr>
                    <td >NIPP</td>
                    <td >:</td>
                    <td >'.$data->NIPP_PK.'</td>
                  </tr>
                  <tr>
                    <td >Telepon</td>
                    <td >:</td>
                    <td >'.$data->TELEPON_PK.'</td>
                  </tr>
                  <tr>
                    <td >Unit Kerja</td>
                    <td >:</td>
                    <td >'.$data->UNIT_KERJA_PK.'</td>
                  </tr>
                  <tr><td></td></tr>
                  <tr>
                    <td >Pinjam kendaraan operasioanl</td>
                    <td >:</td>
                    <td ></td>
                  </tr>

                  <tr>
                    <td >Tanggal Waktu Peminjaman</td>
                    <td >:</td>
                    <td >'.$data->TIME_PK_AWAL.' s/d '.$data->TIME_PK_AKHIR.'</td>
                  </tr>
                  <tr>
                    <td >Tujuan/Keperluan</td>
                    <td >:</td>
                    <td >'.$data->TUJUAN_PK.'</td>
                  </tr>
                  <tr>
                    <td >Jenis Kendaraan</td>
                    <td >:</td>
                    <td >'.$data->PINJAM_KENDARAAN.'</td>
                  </tr>
                  <tr>
                    <td >Nama Pengemudi</td>
                    <td >:</td>
                    <td >'.$data->PENGEMUDI.'</td>
                  </tr>
                  <tr>
                    <td >Speedo Meter Awal</td>
                    <td >:</td>
                    <td >'.$data->SPEEDO_AWAL.'</td>
                  </tr>
                  <tr>
                    <td >Speedo Meter Akhir</td>
                    <td >:</td>
                    <td >'.$data->SPEEDO_AKHIR.'</td>
                  </tr>';
                //   <tr>
                //   <td >Pada hari/Tanggal</td>
                //   <td >:</td>
                //   <td >'.tgl_indo($data->DATE_PK).'</td>
                // </tr>
// ---------------------------------------------------------
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->SetFont('times', '', 10);
//ttd pemohon
if(count($pemohon)>0){
  $ttd_pemohon="ttd";
  $pemohon_ttd="Telah disetujui pemohon melalui ESS pada ".tgl_indo3(substr($pemohon[0]['DATE_TIME'], 0,10));  
}

if(count($manager)>0){
  $ttd_manager="ttd";
   $manager_ttd='<tr><td align="center"width="100%" align="center">Telah disetujui pemohon melalui ESS pada '.tgl_indo3(substr($manager[0]['DATE_TIME'], 0,10)).'</td></tr>';
}
          
          $ttd='<table  style="margin-top:0px;height10 px;margin-left:0px;" width="90%"   align="center" >
            <tr>
              <td align="center"width="100%" align="center">Mengetahui</td>
            </tr>
            '.$manager_ttd.'
            <tr>
              <td align="center" align="center">Manager SDM, Umum & KBL</td>
            </tr>
            <tr>
              <td align="center"  align="center"></td>
            </tr>
            <tr>
              <td align="center"  align="center">'.$ttd_manager.'</td>
            </tr>
            <tr>
              <td align="center"  align="center"></td>
            </tr>
            <tr>
              <td align="center" align="center"><U>SATRIYO AGUNG NUGROHO</U></td>
            </tr>
            <tr>
              <td align="center" align="center">105013</td>
            </tr>    
          </table>';

$pdf->writeHTMLCell(103, 100, 5, 170, $ttd, $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);

          $ttd='<table  style="margin-top:0px;height10 px;margin-left:0px;" width="90%"   align="center" >
            <tr>
              <td align="center"width="100%" align="center">Peminjam Kendaraan</td>
            </tr>
            <tr>
              <td align="center"width="100%" align="center">'.$pemohon_ttd.'</td>
            </tr>
            <tr>
              <td align="center" align="center"></td>
            </tr>
            <tr>
              <td align="center"  align="center"></td>
            </tr>
            <tr>
              <td align="center"  align="center">'.$ttd_pemohon.'</td>
            </tr>
            <tr>
              <td align="center"  align="center"></td>
            </tr>
            <tr>
              <td align="center" align="center"><U>'.strtoupper($data->NAMA_PK).'</U></td>
            </tr>
            <tr>
              <td align="center" align="center">'.$data->NIPP_PK.'</td>
            </tr>    
          </table>';

$pdf->writeHTMLCell(103, 100, 110, 170, $ttd, $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);

//Close and output PDF document
$pdf->Output('Form Permohonan Peminjaman Kendaraan.pdf', 'I');
