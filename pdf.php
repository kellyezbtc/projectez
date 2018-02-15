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
 $sqc="select * from wires_tb where bank_id='".$_REQUEST['id']."'";
$resc=mysql_query($sqc);
if(!$resc)
{
	die('error in data');
}
$rwc=mysql_fetch_array($resc);
$bname=str_replace(" ",'_',$rwc['ben_name']);
$dd=date('dmY',time());
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle($bname.'_'.$_REQUEST['amount'].'_'.$dd);
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
$pdf->SetFont('times', '', 12);
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

$dt=date('l, F d, Y',time());
if($_REQUEST['account']!='')
{
$acc=$_REQUEST['account'];
}
else
{
	$acc='123173';
}
$mess='<table width="650" border="0">
  <tr>
    <td width="317" height="25"><strong>Wire Transfer Instructions for</strong></td>
    <td width="317" height="25" align="right"><strong>'.$dt.'</strong></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center"><strong>Account : '.$acc.'</strong></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td height="25">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="right">Beneficiary Bank :&nbsp;</td>
    <td height="25">  '.$rwc[bank_name].'</td>
  </tr>
  <tr>
    <td height="25" align="right">&nbsp;</td>
    <td height="25">  '.$rwc[bank_address].'</td>
  </tr>
  <tr>
    <td height="25" align="right">Beneficiary Name :&nbsp;</td>
    <td height="25">  '.$rwc[ben_name].'</td>
  </tr>
  <tr>
    <td height="25" align="right">Address :&nbsp;</td>
    <td height="25">  '.$rwc[ben_address].'</td>
  </tr>
  <tr>
    <td height="25" align="right">Institution :&nbsp;</td>
    <td height="25">  '.$rwc[bank_inst].'</td>
  </tr>
  <tr>
    <td height="25" align="right">Transit :&nbsp;</td>
    <td height="25">  '.$rwc[bank_tran].'</td>
  </tr>
  <tr>
    <td height="25" align="right">Account :&nbsp;</td>
    <td height="25">  '.$rwc[bank_account].'</td>
  </tr>
  <tr>
    <td height="25" align="right">Swift :&nbsp;</td>
    <td height="25">  '.$rwc[bank_scode].'</td>
  </tr>
  <tr>
    <td height="25" align="right">Currency :&nbsp;</td>
    <td height="25">  CAD</td>
  </tr>
  <tr>
    <td height="25" align="right">Phone #:&nbsp;</td>
    <td height="25">  '.$rwc[ben_phone].'</td>
  </tr>
  <tr>
    <td height="25" align="right">&nbsp;</td>
    <td height="25">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center"><strong>Amount : $'. number_format($_REQUEST[amount],2,'.',',').'</strong></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left">Authorized</td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left"><strong><img src="http://ezfaq.xyz/images/sign-1.jpg" /></strong></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left">David Smillie</td>
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
$pdf->Output($bname.'_'.$_REQUEST['amount'].'_'.$dd.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>