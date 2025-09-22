<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

$uploadDir = __DIR__ . '/uploads/';

if (isset($_GET['delete'])) {
    $fileToDelete = $uploadDir . basename($_GET['delete']);
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        $msg = "File '" . htmlspecialchars($_GET['delete']) . "' deleted successfully!";
    } else {
        $msg = "File not found!";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = basename($_FILES['file']['name']);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $msg = "File '" . htmlspecialchars($fileName) . "' uploaded successfully!";
    } else {
        $msg = "File upload failed!";
    }
}


function displaySpreadsheet($filePath) {
    $ext = pathinfo($filePath, PATHINFO_EXTENSION);

    if ($ext === 'csv') {
        $reader = new Csv();
        $reader->setDelimiter(',');
        $reader->setEnclosure('"');
        $reader->setSheetIndex(0);
        $spreadsheet = $reader->load($filePath);
    } else { 
        $spreadsheet = IOFactory::load($filePath);
    }

    $sheet = $spreadsheet->getActiveSheet();

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    $isHeader = true; 
    foreach ($sheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        echo "<tr>";
        foreach ($cellIterator as $cell) {
            if ($isHeader) {
                echo "<th>" . htmlspecialchars($cell->getValue()) . "</th>";
            } else {
                echo "<td>" . htmlspecialchars($cell->getValue()) . "</td>";
            }
        }
        echo "</tr>";

        if ($isHeader) {
            $isHeader = false; 
        }
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload & View CSV/Excel</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin:0; padding:20px; }
        h1 { color:#333; text-align:center; }
        .upload-box { width:400px; margin:20px auto; padding:20px; background:white; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); text-align:center; }
        input[type="file"] { margin:10px 0; }
        button { padding:10px 20px; border:none; background:#4CAF50; color:white; border-radius:5px; cursor:pointer; }
        button:hover { background:#45a049; }
        .msg { margin:10px auto; padding:10px; width:400px; background:#eaf4ea; border:1px solid #b2d8b2; border-radius:5px; color:#2d662d; }
        table { margin:20px auto; border-collapse:collapse; width:95%; background:white; box-shadow:0 4px 8px rgba(0,0,0,0.1); }
        th, td { padding:8px 12px; border:1px solid #ddd; text-align:center; }
        th { background:#4CAF50; color:white; position:sticky; top:0; z-index:2; }
        .file-list { width:90%; margin:20px auto; }
        .file-list h2 { margin-bottom:10px; }
        .file-list ul { list-style:none; padding:0; }
        .file-list li { background:white; padding:10px; margin:5px 0; border-radius:6px; display:flex; justify-content:space-between; align-items:center; box-shadow:0 2px 6px rgba(0,0,0,0.1); }
        .delete-btn { color:red; text-decoration:none; font-weight:bold; }
        .delete-btn:hover { text-decoration:underline; }
    </style>
</head>
<body>
    <h1>📊 Upload & View CSV/Excel</h1>

    <?php if (!empty($msg)) echo "<div class='msg'>$msg</div>"; ?>

    <div class="upload-box">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept=".csv,.xlsx,.xls" required><br>
            <button type="submit">Upload & Show</button>
        </form>
    </div>

    <div class="file-list">
        <h2>Uploaded Files</h2>
        <ul>
            <?php
            if (is_dir($uploadDir)) {
                $files = glob($uploadDir . '*.{csv,xlsx,xls}', GLOB_BRACE);
                if ($files) {
                    foreach ($files as $file) {
                        $fileName = basename($file);
                        echo "<li>
                                <a href='?view=" . urlencode($fileName) . "'>" . htmlspecialchars($fileName) . "</a>
                                <a class='delete-btn' href='?delete=" . urlencode($fileName) . "' onclick='return confirm(\"Delete this file?\")'>🗑 Delete</a>
                              </li>";
                    }
                } else {
                    echo "<li>No files uploaded yet.</li>";
                }
            }
            ?>
        </ul>
    </div>

    <?php
    if (isset($_GET['view'])) {
        $fileToView = $uploadDir . basename($_GET['view']);
        if (file_exists($fileToView)) {
            echo "<h2 style='text-align:center;'>Viewing File: " . htmlspecialchars($_GET['view']) . "</h2>";
            try {
                displaySpreadsheet($fileToView);
            } catch (Exception $e) {
                echo "<p style='color:red; text-align:center;'>Error reading file: " . $e->getMessage() . "</p>";
            }
        }
    }
    ?>
</body>
</html>
