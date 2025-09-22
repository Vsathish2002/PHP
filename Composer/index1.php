<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$students = [
    ["id" => 101, "name" => "Alice",   "mark1" => 85, "mark2" => 90, "mark3" => 78],
    ["id" => 102, "name" => "Bob",     "mark1" => 72, "mark2" => 68, "mark3" => 75],
    ["id" => 103, "name" => "Charlie", "mark1" => 60, "mark2" => 55, "mark3" => 62],
    ["id" => 104, "name" => "David",   "mark1" => 90, "mark2" => 88, "mark3" => 92]
];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Mark1');
$sheet->setCellValue('D1', 'Mark2');
$sheet->setCellValue('E1', 'Mark3');

$row = 2;
foreach ($students as $stu) {
    $sheet->setCellValue("A$row", $stu['id']);
    $sheet->setCellValue("B$row", $stu['name']);
    $sheet->setCellValue("C$row", $stu['mark1']);
    $sheet->setCellValue("D$row", $stu['mark2']);
    $sheet->setCellValue("E$row", $stu['mark3']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'students1.xlsx';
$writer->save($filename);
echo "Excel file '$filename' created successfully!<br>";

$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load($filename);
$sheet = $spreadsheet->getActiveSheet();

echo "<h2>Reading Excel Data</h2>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>ID</th><th>Name</th><th>Mark1</th><th>Mark2</th><th>Mark3</th></tr>";

foreach ($sheet->getRowIterator(2) as $row) { 
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);

    echo "<tr>";
    foreach ($cellIterator as $cell) {
        echo "<td>" . $cell->getValue() . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
