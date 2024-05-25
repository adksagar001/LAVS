<?php
include "dbconn.php";
function sanitize($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])){
    // Retrieve the user input and sanitize
    $username=sanitize($_POST['username']);
    $ln = sanitize($_POST['loanname']);
    $tp = sanitize($_POST['tenureperiod']);
    $ir = sanitize($_POST['interestrate']);
    $la = sanitize($_POST['loanamount']);
    $fn = sanitize($_POST['firstname']);
    $mn = sanitize($_POST['middlename']);
    $lname = sanitize($_POST['lastname']); // Corrected input name to 'lastname'
    $dob = sanitize($_POST['dob']);
    $phone = sanitize($_POST['phonenumber']);
    $email = sanitize($_POST['email']);
    $ms = sanitize($_POST['monthlysalary']);
    $otheremis = sanitize($_POST['otheremis']);
    $applicationDate = date("Y-m-d"); // Current date in "Y-m-d" format (e.g., 2023-09-04)
  
  
    $allowedFileSize = 10 * 1024 * 1024; // 10MB in bytes

    if ($_FILES['collateral1']['size'] > $allowedFileSize ||
        $_FILES['collateral2']['size'] > $allowedFileSize ||
        $_FILES['collateral3']['size'] > $allowedFileSize) {
        echo '<script> alert("File size exceeds the maximum allowed size (10MB).");</script>';
    } else {
    $collateral1 = basename($_FILES['collateral1']['name']); // Get only the file name
    $collateral2 = basename($_FILES['collateral2']['name']); // Get only the file name
    $collateral3 = basename($_FILES['collateral3']['name']); // Get only the file name

    $r = $ir / 12 / 100;
    $emi = ($la * $r * pow(1 + $r, $tp)) / (pow(1 + $r, $tp) - 1);
    
    // Check if the 'collateral/' directory exists, and create it if not
    $targetDir = "collateral/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Move uploaded files to the designated location
    $targetFile1 = $targetDir . $collateral1;
    move_uploaded_file($_FILES['collateral1']['tmp_name'], $targetFile1);

    $targetFile2 = $targetDir . $collateral2;
    move_uploaded_file($_FILES['collateral2']['tmp_name'], $targetFile2);

    $targetFile3 = $targetDir . $collateral3;
    move_uploaded_file($_FILES['collateral3']['tmp_name'], $targetFile3);

    // Prepare and execute the SQL query
    $sql = "INSERT INTO `application1` (`username`,`loan_name`, `loan_amount`, `interest_rate`, `tenure_period`,`emi`, `monthly_salary`, `phone_number`, `other_emis`, `collateral1`, `collateral2`, `collateral3`,`email`,`application_date`) VALUES (?,?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $username,$ln, $la, $ir, $tp,$emi, $ms, $phone, $otheremis, $collateral1, $collateral2, $collateral3,$email,$applicationDate);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>
        <script>
            alert("Loan applied successfully.");
            window.location.href = "homepageuser.php";
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}}
}
?>
