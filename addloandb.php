<?php
include "dbconn.php";

function sanitize($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user input and sanitize
    $ln = sanitize($_POST['loanname']);
    $tp = sanitize($_POST['tenureperiod']);
    $des = sanitize($_POST['quote']);

    $con1=sanitize($_POST['condition1']);
    $con2=sanitize($_POST['condition2']);
    $con3=sanitize($_POST['condition3']);
    $fea1=sanitize($_POST['feature1']);
    $fea2=sanitize($_POST['feature2']);
    $fea3=sanitize($_POST['feature3']);
    $eli1=sanitize($_POST['eligibility1']);
    $eli2=sanitize($_POST['eligibility2']);
    $eli3=sanitize($_POST['eligibility3']);

    $ir = sanitize($_POST['interestrate']);
    $mla = sanitize($_POST['maxloanamount']);

    $photo = $_FILES['loanphoto']['name'];
    $tempName=$_FILES['loanphoto']['tmp_name'];
    $checkbox = isset($_POST['doc']) ? $_POST['doc'] : [];

    // Move uploaded file to a designated location
    $targetDir = "img/"; // Specify the directory to save the file
    $targetFile = $targetDir . basename($photo);
    move_uploaded_file($tempName, $targetFile);

    $collateral1=sanitize($_POST['collateral1']);
    $collateral2=sanitize($_POST['collateral2']);
    $collateral3=sanitize($_POST['collateral3']);

    // Prepare and execute the SQL query
    $sql = "INSERT INTO `addloan1` (`loan_name`, `tenure_period`, `quote`,condition1,condition2,condition3,feature1,feature2,feature3,eligibility1,eligibility2,eligibility3, `interest_rate`, `max_loan_amount`, `loan_photo`, `collateral1`,collateral2,collateral3) VALUES (?,?,?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $ln, $tp, $des,$con1,$con2,$con3,$fea1,$fea2,$fea3,$eli1,$eli2,$eli3, $ir, $mla, $photo, $collateral1,$collateral2,$collateral3);
    $result = mysqli_stmt_execute($stmt);

    // if ($result) {
    //     echo "Loan added successfully.";
    
    //     include "homepageadminn.php";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }

    if ($result) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>
        <script>
            alert("Loan added successfully.");
            window.location.href = "viewloanforadmin.php";
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
}
?>
