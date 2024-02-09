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
$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setWidth(20);

$active_row = 1;
$objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "คำถามข้อที่ 1");
$objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, "รูปแบบที่ 1");
$objPHPExcel->getActiveSheet()->setCellValue("C" . $active_row, "รูปแบบที่ 2");
$objPHPExcel->getActiveSheet()->setCellValue("D" . $active_row, "รูปแบบที่ 3");
$objPHPExcel->getActiveSheet()->setCellValue("E" . $active_row, "รูปแบบที่ 4");

$objPHPExcel->getActiveSheet()->getStyle('A' . $active_row . ':E' . $active_row)->applyFromArray($thead_cell_style);
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
  
  $columnIndex = 'B';

    while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
        $valQ1 = $row['count_per_category'];

        // Set the value in the current column
        $objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "จำนวน");
        $objPHPExcel->getActiveSheet()->setCellValue($columnIndex . $active_row, $valQ1);

        // Apply styles to the cell
        $objPHPExcel->getActiveSheet()->getStyle("A" . $active_row . ':' . $columnIndex . $active_row)->applyFromArray($tbody_cell_style);

        // Increment the column index for the next iteration
        $columnIndex++;

        $index_count++;
    }

    $active_row+=2;
}




$objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "คำถามข้อที่ 2");
$objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, "รูปแบบที่ 1");
$objPHPExcel->getActiveSheet()->setCellValue("C" . $active_row, "รูปแบบที่ 2");

$objPHPExcel->getActiveSheet()->getStyle('A' . $active_row . ':C' . $active_row)->applyFromArray($thead_cell_style);
$active_row++;
$objPHPExcel->getActiveSheet()->setTitle('Export Report 2');
$sql = str_replace('\\', '', $_POST['sql_export2']);
print_pre($sql);
$query = wewebQueryDB($coreLanguageSQL, $sql);
$count_record = wewebNumRowsDB($coreLanguageSQL, $query);
$date_print = DateFormat(date("Y-m-d h:i:s"));
$index_count = 1;
if ($count_record >= 1) {
  $index = 1;
  $total_paid = 0;
  $finalprice_sum = 0;
  
  $columnIndex = 'B';

    while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
        $valQ1 = $row['count_per_category'];

        // Set the value in the current column
        $objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "จำนวน");
        $objPHPExcel->getActiveSheet()->setCellValue($columnIndex . $active_row, $valQ1);

        // Apply styles to the cell
        $objPHPExcel->getActiveSheet()->getStyle("A" . $active_row . ':' . $columnIndex . $active_row)->applyFromArray($tbody_cell_style);

        // Increment the column index for the next iteration
        $columnIndex++;

        $index_count++;
    }

    $active_row+=2;
}






$objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "คำถามข้อที่ 3");
$objPHPExcel->getActiveSheet()->setCellValue("B" . $active_row, "รูปแบบที่ 1");
$objPHPExcel->getActiveSheet()->setCellValue("C" . $active_row, "รูปแบบที่ 2");
$objPHPExcel->getActiveSheet()->setCellValue("D" . $active_row, "รูปแบบที่ 3");
$objPHPExcel->getActiveSheet()->setCellValue("E" . $active_row, "รูปแบบที่ 4");
$objPHPExcel->getActiveSheet()->getStyle('A' . $active_row . ':E' . $active_row)->applyFromArray($thead_cell_style);
$active_row++;
$objPHPExcel->getActiveSheet()->setTitle('Export Report 3');
$sql = str_replace('\\', '', $_POST['sql_export3']);
print_pre($sql);
$query = wewebQueryDB($coreLanguageSQL, $sql);
$count_record = wewebNumRowsDB($coreLanguageSQL, $query);
$date_print = DateFormat(date("Y-m-d h:i:s"));
$index_count = 1;
if ($count_record >= 1) {
  $index = 1;
  $total_paid = 0;
  $finalprice_sum = 0;
  
  $columnIndex = 'B';

    while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
        $valQ1 = $row['count_per_category'];

        // Set the value in the current column
        $objPHPExcel->getActiveSheet()->setCellValue("A" . $active_row, "จำนวน");
        $objPHPExcel->getActiveSheet()->setCellValue($columnIndex . $active_row, $valQ1);

        // Apply styles to the cell
        $objPHPExcel->getActiveSheet()->getStyle("A" . $active_row . ':' . $columnIndex . $active_row)->applyFromArray($tbody_cell_style);

        // Increment the column index for the next iteration
        $columnIndex++;

        $index_count++;
    }

    $active_row+=2;
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
