<?php 
$ttd_pemohon="";
$ttd_manager="";
$manager_ttd="";
$pemohon_ttd="";
$d="";
$dh="";
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
$pdf->SetAuthor($data->NAMA_A);
$pdf->SetTitle('Form Permohonan Akomodasi SPPD');
$pdf->SetSubject('Form Permohonan Akomodasi SPPD');
$pdf->SetKeywords('Form Permohonan Akomodasi SPPD');

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
$pdf->SetFont('times', 'B', 14);

// add a page
$pdf->AddPage();


$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set some text to print
$txt = <<<EOD
PT. PELABUHAN INDONESIA (PERSERO)
FORMULIR PERMOHONAN AKOMODASI SPPD REGIONAL 2 BENGKULU
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, "", '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('times', '', 11);
$html='<table border="1">
                  <tr>
                    <td width="40%">NAMA</td>
                    <td width="5%">:</td>
                    <td width="65%">'.$data->NAMA_A.'</td>
                  </tr>
                  <tr>
                    <td >JABATAN</td>
                    <td >:</td>
                    <td >'.$data->JABATAN_A.'</td>
                  </tr>
                  <tr>
                    <td >UNIT KERJA</td>
                    <td >:</td>
                    <td >'.$data->UNIT_KERJA_A.'</td>
                  </tr>
                  <tr>
                    <td >ACARA</td>
                    <td >:</td>
                    <td >'.$data->ACARA_A.'</td>
                  </tr>
                  <tr>
                    <td >NOMOR SPPD</td>
                    <td >:</td>
                    <td >'.$data->NOMOR_SPPD.'</td>
                  </tr>
                  <tr>
                    <td >NO. TELPON/HP</td>
                    <td >:</td>
                    <td >'.$data->TELEPON_A.'</td>
                  </tr>
                  <tr>
                    <td >JENIS SPPD</td>
                    <td >:</td>
                    <td ></td>
                  </tr>';
// ---------------------------------------------------------
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->SetFont('zapfdingbats', '', 21);
$pdf->writeHTMLCell(10, 10, 60, 77, TCPDF_FONTS::unichr(51), $border=1, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);
$pdf->SetFont('zapfdingbats', '', 11);
$td="";$l="";$bk="";
if(count($diklat)>0){$d=TCPDF_FONTS::unichr(51);}
if(count($dinas_harian)>0){$dh=TCPDF_FONTS::unichr(51);}
$pdf->writeHTMLCell(5, 5, 96, 77,$d , $border=1, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);
$pdf->writeHTMLCell(5, 5, 96, 85, $dh, $border=1, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);
$pdf->SetFont('times', '', 11);
$pdf->writeHTMLCell(40, 5, 105, 77, 'DINAS HARIAN', $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);
$pdf->writeHTMLCell(28, 5, 105, 85, 'DIKLAT', $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);

$html=str_replace('scope="col"','align="center"',$data->ISI_A);
$pdf->writeHTMLCell(180, 100, 15, 95, $html, $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);

$pdf->SetFont('times', '', 10);
if(count($pemohon)>0){
  $ttd_pemohon = "ttd";
  $pemohon_ttd = "Telah disetujui pemohon melalui ESS pada ".tgl_indo3(substr($pemohon[0]['DATE_TIME'], 0,10));  
}

if(count($manager)>0){
   $ttd_manager = "ttd";
   $manager_ttd = '<tr><td align="center" align="center">Telah disetujui pemohon melalui ESS pada '.tgl_indo3(substr($manager[0]['DATE_TIME'], 0,10)).'</td></tr>';
}
          $ttd='<table  style="margin-top:0px;height10 px;margin-left:0px;" width="90%"   align="center" >
            <tr>
              <td align="center"width="100%" align="center">Telah diterima permohonan vendor</td>
            </tr>
            <tr>
              <td align="center" align="center">'.$data->VENDOR.'</td>
            </tr>
            <tr>
              <td align="center"  align="center"></td>
            </tr>
            <tr>
              <td align="center"  align="center"></td>
            </tr>
            <tr>
              <td align="center"  align="center"></td>
            </tr>
            <tr>
              <td align="center" align="center">...............................................</td>
            </tr>
            <tr>
              <td align="center" align="center"></td>
            </tr>    
          </table>';

$pdf->writeHTMLCell(70, 100, 5, 190, $ttd, $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);

          $ttd='<table  style="margin-top:0px;height10 px;margin-left:0px;" width="90%"   align="center" >
            <tr>
              <td align="center"width="100%" align="center">Bengkulu, '.tgl_indo2($data->DATE_TTD).'</td>
            </tr>
            <tr>
              <td align="center" align="center">Pemohon</td>
            </tr>
            <tr>
              <td align="center" align="center">'.$pemohon_ttd.'</td>
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
              <td align="center" align="center"><U>'.strtoupper($data->NAMA_A).'</U></td>
            </tr>
            <tr>
              <td align="center" align="center">'.$data->NIPP_A.'</td>
            </tr>    
          </table>';

$pdf->writeHTMLCell(103, 50, 115, 190, $ttd, $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);



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

$pdf->writeHTMLCell(103, 30, 55, 220, $ttd, $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);
$pdf->writeHTMLCell(200, 5, 5, 265, "*Untuk pemohon jamuan tamu dinas agar melampirkan bukti persetujuan dari General Manager", $border=0, $ln=0, $fill=0, $reseth=true, $align='center', $autopadding=true);

//Close and output PDF document
$pdf->Output('Form Permohonan Pelayana Umum.pdf', 'I');

?>