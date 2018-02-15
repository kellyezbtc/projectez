<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');
require_once('conn.php'); 
mysql_query("SET NAMES utf8");
 require_once('tcpdf/tcpdf.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Cheque Deposit Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

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
$dpath="/home/solpnqqpxmv3/public_html/admin/";
//$fontname = TCPDF_FONTS::addTTFfont($dpath.'tcpdf/fonts/Lohit-Gujarati.ttf', 'TrueTypeUnicode', '', 32);
// set font
//$fontname = TCPDF_FONTS::addTTFfont($dpath.'tcpdf/fonts/Lohit-Gujarati.ttf', 'TrueTypeUnicode', '', 12);

//$pdf->SetFont($fontname, '', 9);
//$pdf->SetFont('times', '', 12);
//$fontname = TCPDF_FONTS::addTTFfont($dpath.'tcpdf/fonts/Lohit-Gujarati.ttf', 'TrueTypeUnicode', '', 12);
//$pdf->SetFont($fontname, '', 12);
// add a page
//$pdf->SetFont('times', '', 12);
$fontname = TCPDF_FONTS::addTTFfont($path.'arial.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont($fontname, '', 12);
$pdf->AddPage();

// set some text to print
/*
$txt = "<table width='595' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
 <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
  <tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr><tr>
    <td>as asds da</td>
    <td>as sad sadsa gsdfds</td>
    <td>sdfdsf sdf dsfdsfsd</td>
  </tr>
</table>";
*/
// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
//$pdf->writeHTML($txt, true, 0, true, 0);

$dt=date('F d, Y',time());

$mess='<table width="650" border="0">
  <tr>
    <td width="317" height="25"><strong>Cheque Deposit Report</strong></td>
    <td width="317" height="25" align="right"><strong>'.$dt.'</strong></td>
  </tr>
   <tr>
    <td height="25" colspan="2" align="center">&nbsp;</td>
  </tr>';
  $sqn="SELECT ch_inst FROM cheque_tb group by ch_inst";
  $resn=mysql_query($sqn);
  if(!$resn)
  {
	  die('error');
  }
  while($rwn=mysql_fetch_array($resn))
  {
$sqs="select * from user_tb,cheque_tb,cheque_send_tb where user_tb.us_id=cheque_send_tb.csu_id and cheque_send_tb.c_status=0 and cheque_send_tb.chh_id=cheque_tb.ch_id and cheque_tb.ch_inst='".$rwn['ch_inst']."' order by chh_id asc";
$resc=mysql_query($sqs);
if(!$resc)
{
	die('error in data');
}
if(mysql_num_rows($resc)!=0)
{
while($rwc=mysql_fetch_array($resc))
{
  $mess.='
  <tr>
    <td height="35" colspan="2" align="left">'. $rwc[f_name].' '. $rwc[l_name].' $'. $rwc[c_amount].'  ('. $rwc[ch_tran].'-'.$rwc[ch_inst].'-'.$rwc[ch_account].')  '.$rwc[ch_bankname].'</td>
  </tr>';
}
 // }
$mess.=' <tr>
    <td height="25" colspan="2" align="left">------------------------------------------------------------------------------------</td>
  </tr>';
  } // if num
  } //while 1st
$mess.='
  <tr>
    <td height="25" colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center">&nbsp;</td>
  </tr>
</table>';
  
//$tb1.='</table>';
//$pdf->writeHTML($tbl, true, false, false, false, '');

//$tbl.='</table>';
$pdf->writeHTML($mess, true, false, false, false, '');

// ---------------------------------------------------------
$bname=str_replace(" ",'_',$rwc['ben_name']);
$dd=date('dmY',time());
//Close and output PDF document
$pdf->Output('cheque_pending_report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>