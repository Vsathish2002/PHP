<?php
$students = [
    ["id" => 101, "name" => "Alice",   "mark1" => 85, "mark2" => 90, "mark3" => 78, "status" => "Pass"],
    ["id" => 102, "name" => "Bob",     "mark1" => 72, "mark2" => 68, "mark3" => 75, "status" => "Pass"],
    ["id" => 103, "name" => "Charlie", "mark1" => 60, "mark2" => 55, "mark3" => 62, "status" => "Pass"],
    ["id" => 104, "name" => "David",   "mark1" => 90, "mark2" => 88, "mark3" => 92, "status" => "Pass"],
    ["id" => 105, "name" => "Eva",     "mark1" => 68, "mark2" => 70, "mark3" => 65, "status" => "Pass"],
    ["id" => 106, "name" => "Frank",   "mark1" => 65, "mark2" => 80, "mark3" => 20, "status" => "Fail"],
    ["id" => 107, "name" => "Grace",   "mark1" => 38, "mark2" => 42, "mark3" => 35, "status" => "Fail"],
    ["id" => 108, "name" => "Helen",   "mark1" => 82, "mark2" => 85, "mark3" => 80, "status" => "Pass"],
    ["id" => 109, "name" => "Ian",     "mark1" => 67, "mark2" => 87, "mark3" => 25, "status" => "Fail"],
    ["id" => 110, "name" => "Jane",    "mark1" => 72, "mark2" => 90, "mark3" => 17, "status" => "Fail"]
];

echo "Students Mark Details";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Mark1</th>
        <th>Mark2</th>
        <th>Mark3</th>
        <th>Status</th>
      </tr>";

for ($i = 0; $i < count($students); $i++) {
    echo "<tr>
            <td>{$students[$i]['id']}</td>
            <td>{$students[$i]['name']}</td>
            <td>{$students[$i]['mark1']}</td>
            <td>{$students[$i]['mark2']}</td>
            <td>{$students[$i]['mark3']}</td>
            <td>{$students[$i]['status']}</td>
          </tr>";
}

echo "</table>";
echo "<br>";


echo "Students Who Pass (Using while Loop)";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Mark1</th>
        <th>Mark2</th>
        <th>Mark3</th>
        <th>Status</th>
      </tr>";

$i = 0;
while ($i < count($students)) {
    $m1 = $students[$i]['mark1'];
    $m2 = $students[$i]['mark2'];
    $m3 = $students[$i]['mark3'];

    if ($m1 >= 35 && $m2 >= 35 && $m3 >= 35) {
        $status = "Pass";

        echo "<tr>
                <td>{$students[$i]['id']}</td>
                <td>{$students[$i]['name']}</td>
                <td>{$m1}</td>
                <td>{$m2}</td>
                <td>{$m3}</td>
                <td>{$status}</td>
              </tr>";
    }

    $i++;
}
echo "</table>";


echo "<br>Students Who Fail (Using for Loop)";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Mark1</th>
        <th>Mark2</th>
        <th>Mark3</th>
        <th>Status</th>
      </tr>";

for ($i = 0; $i < count($students); $i++) {
    $m1 = $students[$i]['mark1'];
    $m2 = $students[$i]['mark2'];
    $m3 = $students[$i]['mark3'];

    if ($m1 < 35 || $m2 < 35 || $m3 < 35) {
        $status = "Fail";

        echo "<tr>
                <td>{$students[$i]['id']}</td>
                <td>{$students[$i]['name']}</td>
                <td>{$m1}</td>
                <td>{$m2}</td>
                <td>{$m3}</td>
                <td>{$status}</td>
              </tr>";
    }
}
echo "</table>";
echo "<br>";

echo "<h3>Student Results with Grades</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Mark1</th>
        <th>Mark2</th>
        <th>Mark3</th>
        <th>Total</th>
        <th>Status</th>
        <th>Grade</th>
      </tr>";

foreach ($students as $stu) {
    $m1 = $stu['mark1'];
    $m2 = $stu['mark2'];
    $m3 = $stu['mark3'];
    $total = $m1 + $m2 + $m3;

    if ($m1 < 35 || $m2 < 35 || $m3 < 35) {
        $status = "Fail";
        $grade = "No Grade";  
    } else {
        $status = "Pass";

        switch (true) {
            case ($total >= 250):
                $grade = "A";
                break;
            case ($total >= 200):
                $grade = "B";
                break;
            case ($total >= 150):
                $grade = "C";
                break;
            default:
                $grade = "D";
                break;
        }
    }

    echo "<tr>
            <td>{$stu['id']}</td>
            <td>{$stu['name']}</td>
            <td>{$m1}</td>
            <td>{$m2}</td>
            <td>{$m3}</td>
            <td>{$total}</td>
            <td>{$status}</td>
            <td>{$grade}</td>
          </tr>";
}
