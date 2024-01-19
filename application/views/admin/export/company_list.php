<?php  
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

//$sheet->setCellValue('A1', 'Hello World !');

$sheet->setCellValue('A1', 'Comapany Name');
$sheet->setCellValue('B1', 'Email');
$sheet->setCellValue('C1', 'Phone');
$sheet->setCellValue('D1', 'Website');
$sheet->setCellValue('E1', 'Location');
$sheet->setCellValue('F1', 'Jobs Posted');

$index = 2;
foreach ($companies as $company) {
    $sheet->setCellValue('A'.$index, $company["company_name"]);
    $sheet->setCellValue('B'.$index, $company["company_email"]);
    $sheet->setCellValue('C'.$index, $company["company_phone"]);
    $sheet->setCellValue('D'.$index, $company["company_website"]);
    $sheet->setCellValue('E'.$index, $company["taluka_name"]);
    $sheet->setCellValue('F'.$index, $company["jobs_posted"]);

    $index = $index + 1;
}

$writer = new Xlsx($spreadsheet);
$date_array = getdate();
$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="recruiter-goa-company-list-'.$curr_date.'.xls"');
$writer->save('php://output');


?>