<?php
$name = $email = $phone = $age = $gender = $blood = $website = $dob = $profile = "";
$nameErr = $emailErr = $phoneErr = $ageErr = $genderErr = $hobbyErr = $websiteErr = $bloodErr = $dobErr = $profileErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    if (empty($name)) {
        $nameErr = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and spaces allowed";
    } else {
        $name = ucwords(strtolower(htmlspecialchars($name)));
    }

   
    if (!empty($_POST['dob'])) {
        $dob = $_POST['dob'];
        $age = date_diff(date_create($dob), date_create('today'))->y;
        if ($age < 18 || $age > 100) {
            $ageErr = "Age must be between 18 and 100";
        }
    } else {
        $dobErr = "Date of Birth is required";
    }


    $email = trim($_POST['email']);
    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    
    $phone = trim($_POST['phone']);
    if (empty($phone)) {
        $phoneErr = "Phone number is required";
    } elseif (!ctype_digit($phone) || strlen($phone) != 10) {
        $phoneErr = "Phone must be exactly 10 digits";
    }

        
    $website = trim($_POST['website']);
    if (!empty($website)) {
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL format";
        } else {
            $website = htmlspecialchars($website);
        }
    }

    
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = htmlspecialchars($_POST["gender"]);
    }

    
    if (empty($_POST['blood'])) {
        $bloodErr = "Select your blood group";
    } else {
        $blood = htmlspecialchars($_POST['blood']);
    }

   
    $hobbies = [];
    if (empty($_POST["hobbies"])) {
        $hobbyErr = "Select at least one hobby";
    } else {
        $hobbies = array_map('htmlspecialchars', $_POST["hobbies"]);
    }

    if (isset($_FILES['profile']) && $_FILES['profile']['error'] != 4) { 
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['profile']['type'], $allowedTypes)) {
            $fileName = basename($_FILES['profile']['name']);
            $targetDir = "uploads/"; 
            $targetFile = $targetDir . $fileName;
            if (move_uploaded_file($_FILES['profile']['tmp_name'], $targetFile)) {
                $profile = $targetFile;
            } else {
                $profileErr = "Error uploading file";
            }
        } else {
            $profileErr = "Only JPG, PNG, GIF files allowed";
        }
    } else {
        $profileErr = "Please select a file";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Example</title>
    <style>
        .error { color: red; font-size: 14px; }
        .hint { color: gray; font-size: 12px; }
    </style>
</head>
<body>

<h2>User Registration Form</h2>
<h3>Today Date : <?php echo date('Y-m-d');?></h3>

<form method="post" action="" enctype="multipart/form-data">
    Profile Picture: <input type="file" name="profile"><br>
    <span class="error"><?= $profileErr ?></span><br><br>

    Name: <input type="text" name="name" value="<?= $name ?>"><br>
    <span class="error"><?= $nameErr ?></span><br><br>

    Date of Birth:
    <input type="date" name="dob" value="<?= $dob ?>"><br>
    <span class="error"><?= $dobErr ?></span><br>
    <span class="error"><?= $ageErr ?></span><br><br>

    Email: <input type="text" name="email" value="<?= $email ?>"><br>
    <span class="error"><?= $emailErr ?></span><br><br>

    Phone: <input type="text" name="phone" value="<?= $phone ?>"><br>
    <span class="error"><?= $phoneErr ?></span><br><br>

    Gender:
    <input type="radio" name="gender" value="Male" <?= ($gender=="Male")?"checked":"" ?>> Male
    <input type="radio" name="gender" value="Female" <?= ($gender=="Female")?"checked":"" ?>> Female<br>
    <span class="error"><?= $genderErr ?></span><br><br>

    Hobbies:
    <label><input type="checkbox" name="hobbies[]" value="Reading" <?= in_array("Reading",$hobbies??[])?"checked":"" ?>> Reading</label>
    <label><input type="checkbox" name="hobbies[]" value="Gaming" <?= in_array("Gaming",$hobbies??[])?"checked":"" ?>> Gaming</label>
    <label><input type="checkbox" name="hobbies[]" value="Traveling" <?= in_array("Traveling",$hobbies??[])?"checked":"" ?>> Traveling</label><br>
    <span class="error"><?= $hobbyErr ?></span><br><br>

    Blood Group:
    <select name="blood">
        <option value="">--Select--</option>
        <?php
        $bloodGroups = ["A+","A-","B+","B-","O+","O-","AB+","AB-"];
        foreach($bloodGroups as $bg){
            $selected = ($blood==$bg)?"selected":""; 
            echo "<option value='$bg' $selected>$bg</option>";
        }
        ?>
    </select>
    <span class="error"><?= $bloodErr ?></span><br><br>

    Website: <input type="text" name="website" value="<?= $website ?>"><br>
    <span class="error"><?= $websiteErr ?></span><br><br>

    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($dobErr) && empty($websiteErr) && empty($emailErr) && empty($phoneErr) && empty($ageErr) && empty($genderErr) && empty($hobbyErr) && empty($bloodErr) && empty($profileErr)) {
    echo "<h3>User Details</h3>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Profile</th><th>Name</th><th>DOB</th><th>Age</th><th>Email</th><th>Phone</th><th>Gender</th><th>Hobbies</th><th>Blood Group</th><th>Website</th></tr>";
    echo "<tr>
        <td>";
    if (!empty($profile)) {
        echo "<img src='$profile' alt='Profile' width='100'>";
    } else {
        echo "No file uploaded";
    }
    echo "</td>
        <td>$name</td>
        <td>$dob</td>
        <td>$age</td>
        <td>$email</td>
        <td>$phone</td>
        <td>$gender</td>
        <td>" . (!empty($hobbies) ? implode(", ", $hobbies) : "No hobbies selected") . "</td>
        <td>$blood</td>
        <td>" . (!empty($website) ? $website : "N/A") . "</td>
    </tr>";
    echo "</table>";
}
?>
</body>
</html>
