<?php  
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Job Title');
$sheet->setCellValue('B1', 'Posted By');
$sheet->setCellValue('C1', 'Category');
$sheet->setCellValue('D1', 'Type');
$sheet->setCellValue('E1', 'Location');
$sheet->setCellValue('F1', 'Number of Vacancies');
$sheet->setCellValue('G1', 'Date Posted');

$index = 2;
foreach ($jobs as $job) {
    $sheet->setCellValue('A'.$index, $job["job_title"]);
    $sheet->setCellValue('B'.$index, $job["company_name"]);
    $sheet->setCellValue('C'.$index, $job["name"]);
    $sheet->setCellValue('D'.$index, $job["job_post_type"]);
    $sheet->setCellValue('E'.$index, $job["taluka_name"]);
    $sheet->setCellValue('F'.$index, $job["no_of_vacancy"]);
    $sheet->setCellValue('G'.$index, $job["date_posted"]);

    $index = $index + 1;
}

$writer = new Xlsx($spreadsheet);
$date_array = getdate();
$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="recruiter-goa-job_posts-list-'.$curr_date.'.xls"');
$writer->save('php://output');


?>