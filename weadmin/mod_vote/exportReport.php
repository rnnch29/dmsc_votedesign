<?php

include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function_for_phpexcel.php");
include("config.php");
include("incModLang.php");
include("../core/incLang.php");
require_once '../lib/PHPExcel7/PHPExcel.php';



$objPHPExcel = new PHPExcel();
$thead_cell_style = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  ),
  'fill' => array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb' => 'C7C7CC')
  ),
  'font' => [
    'bold' => true,
  ],
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
  )
);

$tbody_cell_style = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  ),

  'fill' => array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb' => 'FFFFFF')
  )
);

$topic_style = array(
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
  ),
  'font' => [
    'size' => 16,
    'bold' => true,
  ],
);

$text_center_style = array(
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
  )
);

$text_right_style = array(
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
  )
);

$text_left_style = array(
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
  )
);

$font_bold_style = array(
  'font' => [
    'bold' => true,
  ],
);

$sheet_num = 0;
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Export Report');

$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth(16.29);
$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(28);
$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setWidth(20);
// $objPHPExcel->getActiveSheet()->getColumnDimension("H")->setWidth(20.57);
// $objPHPExcel->getActiveSheet()->getColumnDimension("I")->setWidth(20.57);
// $objPHPExcel->getActiveSheet()->getColumnDimension("J")->setWidth(20.57);
// $objPHPExcel->getActiveSheet()->getColumnDimension("K")->setWidth(20.57);



$active_row = 1;
$objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "ลำดับ");
$objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, "คำถามข้อที่ 1");
$objPHPExcel->getActiveSheet()->setCellValue("C" . $active_row, "คำถามข้อที่ 2");
$objPHPExcel->getActiveSheet()->setCellValue("D" . $active_row, "คำถามข้อที่ 3");
$objPHPExcel->getActiveSheet()->setCellValue("E" . $active_row, "ข้อเสนอแนะ");
$objPHPExcel->getActiveSheet()->setCellValue("F" . $active_row, "วันที่โหวต");
$objPHPExcel->getActiveSheet()->setCellValue("G" . $active_row, "IP Address");



$objPHPExcel->getActiveSheet()->getStyle('A' . $active_row . ':G' . $active_row)->applyFromArray($thead_cell_style);
$active_row++;

$sql = str_replace('\\', '', $_POST['sql_export']);
print_pre($sql);
$query = wewebQueryDB($coreLanguageSQL, $sql);
$count_record = wewebNumRowsDB($coreLanguageSQL, $query);
$date_print = DateFormat(date("Y-m-d h:i:s"));
$index_count = 1;
if ($count_record >= 1) {
  $index = 1;
  $total_paid = 0;
  $finalprice_sum = 0;
  while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
    $valID = $row[0];
    $valQ1 = $row[1];
    $valQ2 = $row[2];
    $valQ3 = $row[3];
    $valSuggest  =$row[4];
    $valCredate = $row[5];
    $valIP  = $row[6];

    // print_r($valCreId);die();

		// if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
		// 	echo getUserThai($valCreId);
		// }else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
		// 	echo getUserEng($valCreId);
		// }
    
    for($i = 1; $i < 5 ; $i++){
      if($valQ1 == $i) {
        $valQ1 = $langMod['q1:a'.$i];
      }
    } 

    for($i = 1; $i < 3 ; $i++){
      if($valQ2 == $i) {
        $valQ2 = $langMod['q2:a'.$i];
      }
    } 

    for($i = 1; $i < 5 ; $i++){
      if($valQ3 == $i) {
        $valQ3 = $langMod['q3:a'.$i];
      }
    } 


    // if ($valPrefix == 'Mr.') {
    //   $valPrefix = $langTxt["us:mr"];
    // }elseif ($valPrefix == 'Miss'){
    //   $valPrefix = $langTxt["us:miss"];
    // }else{
    //   $valPrefix = $langTxt["us:mrs"];
    // }

    // $valCredate = DateFormat($row['credate']);

    // print_pre($valCredate);
    // die;
    $objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, $index_count, PHPExcel_Cell_DataType::TYPE_NUMERIC);

    $objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, $valQ1);

    $objPHPExcel->getActiveSheet()->setCellValue("C" . $active_row, $valQ2);

    $objPHPExcel->getActiveSheet()->setCellValue("D" . $active_row, $valQ3);

    $objPHPExcel->getActiveSheet()->setCellValue("E" . $active_row, $valSuggest);

    $objPHPExcel->getActiveSheet()->setCellValue("F" . $active_row, $valCredate);

    $objPHPExcel->getActiveSheet()->setCellValue("G" . $active_row, $valIP);

    // $objPHPExcel->getActiveSheet()->setCellValue("H" . $active_row, $valLong);

    // $objPHPExcel->getActiveSheet()->setCellValue("I" . $active_row, $valView);

    // $objPHPExcel->getActiveSheet()->setCellValue("J" . $active_row, $valCredate);
    
    // $objPHPExcel->getActiveSheet()->setCellValue("K" . $active_row, $valStatus);

    $objPHPExcel->getActiveSheet()->getStyle('A' . $active_row . ':G' . $active_row)->applyFromArray($tbody_cell_style);

    $active_row++;
    $index_count++;
  }
  $active_row++;
}

$startColumn = 'A';
$endColumn = 'B';
$mergeRange = $startColumn . $active_row . ':' . $endColumn . $active_row;
$objPHPExcel->getActiveSheet()->mergeCells($mergeRange);
$objPHPExcel->getActiveSheet()->setCellValue($startColumn . $active_row, "Print date : ".$date_print);
$objPHPExcel->getActiveSheet()->getStyle('A' . $active_row . ':B' . $active_row)->applyFromArray($tbody_cell_style);

$filename = "report_dmsc_votedesign_" . date("YmdHi") . ".xls";
// header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment;filename="' . $filename . '"');
// header('Cache-Control: max-age=0');
ob_end_clean();
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
ob_end_clean();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
//logs_access('3', 'Export');
