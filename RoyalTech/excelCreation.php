<?php
require 'vendor/autoload.php';
require 'Database.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$arrayArticles = Database::Articles();

$spreadsheet = new Spreadsheet;
$activeWorksheet = $spreadsheet->getActiveSheet();

$activeWorksheet->setCellValue('A1', 'Id_article');
$activeWorksheet->setCellValue('B1', 'Désignation');
$activeWorksheet->setCellValue('C1', 'Prix (en €)');
$activeWorksheet->setCellValue('D1', 'Catégorie');

for ($i = 0; $i < count($arrayArticles); $i++) {
  $activeWorksheet->setCellValue('A' . $i + 2, $arrayArticles[$i][0]);
  $activeWorksheet->setCellValue('B' . $i + 2, $arrayArticles[$i][1]);
  $activeWorksheet->setCellValue('C' . $i + 2, $arrayArticles[$i][2]);
  $activeWorksheet->setCellValue('D' . $i + 2, $arrayArticles[$i][3]);
}

$writer = new Xlsx($spreadsheet);
$writer->save('articles.xlsx');
