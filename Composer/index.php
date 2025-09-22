<?php
require 'vendor/autoload.php';

use League\Csv\Writer;
use League\Csv\Reader;

$students = [
    ['id' => 101, 'name' => 'Alice', 'mark' => 85, 'status' => 'Pass'],
    ['id' => 102, 'name' => 'Bob', 'mark' => 72, 'status' => 'Pass'],
    ['id' => 103, 'name' => 'Charlie', 'mark' => 60, 'status' => 'Pass'],
    ['id' => 104, 'name' => 'David', 'mark' => 30, 'status' => 'Fail'],
    ['id' => 105, 'name' => 'sathis', 'mark' => 90, 'status' => 'pass'],
];


$csvWriter = Writer::createFromPath('students.csv', 'w');
$csvWriter->insertOne(['id', 'name', 'mark', 'status']); 
$csvWriter->insertAll($students);

echo "<h3>CSV file 'students.csv' created successfully!</h3>";


$csvReader = Reader::createFromPath('students.csv', 'r');
$csvReader->setHeaderOffset(0); 
$records = $csvReader->getRecords();


echo "<h3>Students from CSV:</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Mark</th>
        <th>Status</th>
      </tr>";

foreach ($records as $row) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['mark']}</td>
            <td>{$row['status']}</td>
          </tr>";
}

echo "</table>";
?>
